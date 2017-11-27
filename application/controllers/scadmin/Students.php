<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends CI_Controller {

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
	      $this->load->model('admin/mod_students');
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
		$postedData =$this->input->post(NULL);
		// for datatable
		if(array_key_exists("start", $postedData)){
			$this->_get_students_tbl();
			return false;
		}
		else{
			$data['page_name']=lang('students');
			$data['root_folder']=$this->root_folder;
			$data['dir']="students";
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

	private function _get_students_tbl(){
		$postedData =$this->input->post(NULL, true);

		$params =array(
			'offset' =>$postedData['start'],
			'length' =>$postedData['length'],
			'search' =>$postedData['search']['value'],
			'sortings' =>isset($postedData['order'])? $postedData['order'] : array(),
			'sortings_columns' =>array("1" =>"st.student_id"),
			'advance_searches' =>isset($postedData['advance_searches'])? $postedData['advance_searches'] : array(),
		);
		$resultForDatatable = $this->mod_students->get_student_list_datatable($params);
		$data = array();
		$serial_no = $postedData['start'];
		foreach ($resultForDatatable['data'] as $sdata) {
		
		    $row = array();
		    $row['0'] = ++$serial_no;
		    $row['1'] = $sdata->student_name;
		    $row['2'] = $sdata->student_birthdate;
		    $row['3'] = $sdata->student_gender;
		    
		 
		    
		    $row['4'] =generate_action_button("scadmin/students",$sdata->student_id,true);
		   
		
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
		$data['page_name']=lang('add')." ".lang('student');
		$data['root_folder']=$this->root_folder;
		$data['dir']="students";
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

	public function insert_student(){
		$postedData =$this->input->post(NULL);

		$res_data['student_name']=isset($postedData['student_name']) ? $postedData['student_name'] : "";

		$this->db->trans_begin(); 
 		try{
 			if($res_data['student_name']==""){
 				throw new Exception(lang("class_title_null"));
 			}
 			$image_name=""; 
 			if($_FILES['student_photo']['name']!==""){
 				$upload_image=$this->_student_thumb($_FILES);
 				// print_r($upload_image);
 				// exit;
 				// print_r($upload_image);
 				// exit;
 				if (array_key_exists('error', $upload_image)) {
 					throw new Exception($upload_image['error']);
 				}else{
 					$image_name=$upload_image['upload_data']['file_name'];
 				}
 			}

 			$this->mod_students->save_student_info($res_data,$image_name);
 			if ($this->db->trans_status() === FALSE){
				throw new Exception("transaction error");
			}
			$this->db->trans_commit();
			$this->session->set_flashdata('notification_msg', 'Student Save Successfully');
			$this->session->set_flashdata('notification_type', 'success');
			redirect(site_url('scadmin/students'));
		}catch(Exception $E){
		     $this->db->trans_rollback();
		     $this->session->set_flashdata('notification_msg', $E->getMessage());
			 $this->session->set_flashdata('notification_type', 'danger');
			 redirect(site_url('scadmin/students/add'));
		}
				
	}

    /**
	* This Function is for upload Students image
	*
	* @param Student Table Param 
	* @return Success Result Table Json
	* @author Tj Thouhid
	* @version 2017-11-26
	*/
	private  function _student_thumb($st_image)
	{	
	    $config['upload_path']          = './uploads/students/';
	    $config['allowed_types']        = 'gif|jpg|png';
	    $config['max_size']             = 3000;
	    $config['max_width']            = 1440;
	    $config['max_height']           = 768;

	    $this->load->library('upload', $config);

	    if ( ! $this->upload->do_upload('student_photo'))
	    {
	         return   $error = array('error' => $this->upload->display_errors());

	           // $this->load->view('upload_form', $error);
	    }
	    else
	    {
	           return $data = array('upload_data' => $this->upload->data());

	           // $this->load->view('upload_success', $data);
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
		$data['page_name']=lang('edit')." ".lang('class');
		$data['root_folder']=$this->root_folder;
		$data['dir']="students";
		$data['page']="add";
		$data['datas']=$this->mod_students->get_data($id);

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
	public function update_student(){
		$postedData =$this->input->post(NULL, true);
		// $res_data['student_name']=isset($postedData['student_name']) ? $postedData['student_name'] : "";
		$primary_key=$this->uri->segment(4);
		// Db Query Start
		$this->db->trans_begin();	
		
		try{
 			$image_name="";
 			if($_FILES['student_photo']['name']!==""){
 				$upload_image=$this->_student_thumb($_FILES);
 				// print_r($upload_image);
 				// exit;
 				// print_r($upload_image);
 				// exit;
 				if (array_key_exists('error', $upload_image)) {
 					throw new Exception($upload_image['error']);
 				}else{
 					$image_name=$upload_image['upload_data']['file_name'];
 				}
 			}

 			$this->mod_students->update_data($postedData,$primary_key,$image_name);
 			if ($this->db->trans_status() === FALSE){
				throw new Exception("transaction error");
			}
			$this->db->trans_commit();
			$this->session->set_flashdata('notification_msg', 'Student Save Successfully');
			$this->session->set_flashdata('notification_type', 'success');
			redirect(site_url('scadmin/students'));
		}catch(Exception $E){
		     $this->db->trans_rollback();
		     $this->session->set_flashdata('notification_msg', $E->getMessage());
			 $this->session->set_flashdata('notification_type', 'danger');
			 redirect(site_url('scadmin/students/add'));
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
			$result=$this->mod_students->delete_data($delete_id);
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