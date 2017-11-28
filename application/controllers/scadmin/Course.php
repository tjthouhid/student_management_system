<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends CI_Controller {

	/**
	 * 
	 * This Controller Is For Admin Dashboard
	 * here all Dashboard Task Happen.
	 *
	 */
	private $root_folder="admin";

	public function __construct()
	   {
	       parent::__construct();
	       $this->load->helper('user');
	      $this->load->model('admin/mod_course');
	   }

	/**
	*
	*Description : This is Students Controller
	*for add Student and Students list
	*@param 
	*@return 
	*@author Tj Thouhid
	*@version 1.0 2017-11-26 
	*/
	public function index()
	{
		check_admin_login();
		$postedData =$this->input->post(NULL);
		// for datatable
		if(array_key_exists("start", $postedData)){
			$this->_get_course_tbl();
			return false;
		}
		else{
			$data['page_name']=lang('course');
			$data['root_folder']=$this->root_folder;
			$data['dir']="course";
			$data['page']="index";

			$this->load->view($this->root_folder."/main",$data);
		}
	}
	/**
	* This Function is for Getting Data Table For Students 
	*
	* @param Post Table Param 
	* @return Success Result Table Json
	* @author Tj Thouhid
	* @version 2017-11-26
	*/

	private function _get_course_tbl(){
		$postedData =$this->input->post(NULL, true);

		$params =array(
			'offset' =>$postedData['start'],
			'length' =>$postedData['length'],
			'search' =>$postedData['search']['value'],
			'sortings' =>isset($postedData['order'])? $postedData['order'] : array(),
			'sortings_columns' =>array("1" =>"cs.course_id"),
			'advance_searches' =>isset($postedData['advance_searches'])? $postedData['advance_searches'] : array(),
		);
		$resultForDatatable = $this->mod_course->get_course_list_datatable($params);
		$data = array();
		$serial_no = $postedData['start'];
		foreach ($resultForDatatable['data'] as $sdata) {
		
		    $row = array();
		    $row['0'] = ++$serial_no;
		    $row['1'] = $sdata->course_name;
		    $row['2'] = $sdata->course_price;
		    
		 
		    
		    $row['3'] =generate_action_button("scadmin/course",$sdata->course_id,false);
		   
		
		    $data[] = $row;
		}
		
		$output = array(
		                "draw" => $postedData['draw'],
		                "recordsFiltered" => $resultForDatatable['recordsFiltered'],
		                "recordsTotal" => $resultForDatatable['recordsTotal'],
		                "data" => $data,
		        );
		//output to json format
		echo json_encode($output); 

	}
	/**
	* This Function is for adding Students 
	*
	* @param 
	* @return Success Result redirect to Students table
	* @author Tj Thouhid
	* @version 2017-11-26
	*/
	function add(){
		$data['page_name']=lang('add')." ".lang('course');
		$data['root_folder']=$this->root_folder;
		$data['dir']="course";
		$data['page']="add";

		$this->load->view($this->root_folder."/main",$data);
	}
	
	/**
	* This Function is for inserting student Data  For Students 
	*
	* @param Post Table Param 
	* @return Success Result Table Json
	* @author Tj Thouhid
	* @version 2017-11-26
	*/

	public function insert_course(){
		$postedData =$this->input->post(NULL);

		$res_data['course_name']=isset($postedData['course_name']) ? $postedData['course_name'] : "";
		$res_data['course_price']=isset($postedData['course_price']) ? $postedData['course_price'] : "";

		$this->db->trans_begin(); 
 		try{
 			

 			$this->mod_course->save_course_info($res_data);
 			if ($this->db->trans_status() === FALSE){
				throw new Exception("transaction error");
			}
			$this->db->trans_commit();
			$this->session->set_flashdata('notification_msg', 'Course Save Successfully');
			$this->session->set_flashdata('notification_type', 'success');
			redirect(site_url('scadmin/course'));
		}catch(Exception $E){
		     $this->db->trans_rollback();
		     $this->session->set_flashdata('notification_msg', $E->getMessage());
			 $this->session->set_flashdata('notification_type', 'danger');
			 redirect(site_url('scadmin/course/add'));
		}
				
	}

   

	/**
	* This Function is for editing Class 
	*
	* @param int class id
	* @return view edit page
	* @author Tj Thouhid
	* @version 2017-11-24
	*/
	function edit(){
		$data['id']=$id=$this->uri->segment(4);
		$data['page_name']=lang('edit')." ".lang('course');
		$data['root_folder']=$this->root_folder;
		$data['dir']="course";
		$data['page']="add";
		$data['datas']=$this->mod_course->get_data($id);

		$this->load->view($this->root_folder."/main",$data);
	}

	/**
	* This Function is for updating Student 
	*
	* @param Post update id
	* @return Add page view
	* @author Tj Thouhid
	* @version 2017-11-27
	*/
	public function update_course(){
		$postedData =$this->input->post(NULL, true);
		$res_data['course_name']=isset($postedData['course_name']) ? $postedData['course_name'] : "";
		$res_data['course_price']=isset($postedData['course_price']) ? $postedData['course_price'] : "";
		$primary_key=$this->uri->segment(4);
		// Db Query Start
		$this->db->trans_begin();	
		
		try{
 			
 			$this->mod_course->update_data($res_data,$primary_key);
 			if ($this->db->trans_status() === FALSE){
				throw new Exception("transaction error");
			}
			$this->db->trans_commit();
			$this->session->set_flashdata('notification_msg', 'Course Save Successfully');
			$this->session->set_flashdata('notification_type', 'success');
			redirect(site_url('scadmin/course'));
		}catch(Exception $E){
		     $this->db->trans_rollback();
		     $this->session->set_flashdata('notification_msg', $E->getMessage());
			 $this->session->set_flashdata('notification_type', 'danger');
			 redirect(site_url('scadmin/course/edit/'.$primary_key));
		}
		exit;

	}

	/**
	* This Function is for deleting Student 
	*
	* @param Post delete id
	* @return Add page view
	* @author Tj Thouhid
	* @version 2017-11-26
	*/
	function delete(){
		$delete_id=$this->uri->segment(4);

		// Db Query Start
		$this->db->trans_begin();	
		
		try{
			$result=$this->mod_course->delete_data($delete_id);
			if($result==false){
				throw new Exception(lang("failure")." ".lang("delete"));
			}
			if ($this->db->trans_status() === FALSE)
			 {
			 	throw new Exception("transaction error");
			         // generate an error... or use the log_message() function to log your error
			 }
			 $this->db->trans_commit();
			 $results['notification_type']="success";
			 $results['notification_msg']=lang("success")." ".lang("deleted");
					 
			    	 
		}
		catch(Exception $E){
			$this->db->trans_rollback();
			$results['notification_type']="error";
			$results['notification_msg']=$E->getMessage();
			 			  	 
			
		}
		echo json_encode($results);
		exit;
		
		
	}

}