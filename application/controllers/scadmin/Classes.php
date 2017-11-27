<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Classes extends CI_Controller {

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
	      $this->load->model('admin/mod_classes');
	   }

	/**
	*
	*Description : This is Admin Restarant Controller
	*for add resturend and resturent list
	*@param 
	*@return 
	*@author Tj Thouhid
	*@version 1.0 2017-11-24 
	*/
	public function index()
	{
		$postedData =$this->input->post(NULL);
		// for datatable
		if(array_key_exists("start", $postedData)){
			$this->_get_classes_tbl();
			return false;
		}
		else{
			$data['page_name']=lang('classes');
			$data['root_folder']=$this->root_folder;
			$data['dir']="classes";
			$data['page']="index";

			$this->load->view($this->root_folder."/main",$data);
		}
	}


	/**
	* This Function is for Getting Data Table For Class 
	*
	* @param Post Table Param 
	* @return Success Result Table Jason
	* @author Tj Thouhid
	* @version 2017-11-24
	*/

	private function _get_classes_tbl(){
		$postedData =$this->input->post(NULL, true);

		$params =array(
			'offset' =>$postedData['start'],
			'length' =>$postedData['length'],
			'search' =>$postedData['search']['value'],
			'sortings' =>isset($postedData['order'])? $postedData['order'] : array(),
			'sortings_columns' =>array("1" =>"cl.class_title"),
			'advance_searches' =>isset($postedData['advance_searches'])? $postedData['advance_searches'] : array(),
		);
		$resultForDatatable = $this->mod_classes->get_class_list_datatable($params);
		$data = array();
		$serial_no = $postedData['start'];
		foreach ($resultForDatatable['data'] as $cdata) {
		
		    $row = array();
		    $row['0'] = ++$serial_no;
		    $row['1'] = $cdata->class_title;
		    
		 
		    
		    $row['2'] =generate_action_button("scadmin/classes",$cdata->class_id,false);
		   
		
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
	* This Function is for adding Class 
	*
	* @param 
	* @return Success Result redirect to classes table
	* @author Tj Thouhid
	* @version 2017-11-24
	*/
	function add(){
		$data['page_name']=lang('add')." ".lang('class');
		$data['root_folder']=$this->root_folder;
		$data['dir']="classes";
		$data['page']="add";

		$this->load->view($this->root_folder."/main",$data);
	}
	

	/**
	* This Function is for insert Class 
	*
	* @param Post Class Data
	* @return Success Result delete succssesfull json
	* @author Tj Thouhid
	* @version 2017-11-24
	*/
	public function insert_class(){
		$postedData =$this->input->post(NULL, true);
		$res_data['class_title']=isset($postedData['class_title']) ? $postedData['class_title'] : "";
		// Db Query Start
		$this->db->trans_begin();	
		
		try{
			if($res_data['class_title']==""){
				throw new Exception(lang("class_title_null"));
			}
			$result=$this->mod_classes->insert_data($res_data);
			if($result==false){
				throw new Exception(lang("failure")." ".lang("insert"));
			}
			if ($this->db->trans_status() === FALSE)
			{
				throw new Exception("transaction error");
			        // generate an error... or use the log_message() function to log your error
			}
			 $this->db->trans_commit();
			 $this->session->set_flashdata('notification_msg', lang("success")." ".lang("inserted"));
			 $this->session->set_flashdata('notification_type', 'success');
			   	 
			 redirect(site_url('scadmin/classes' ));

		}
		catch(Exception $E){
			$this->db->trans_rollback();
			$this->session->set_flashdata('notification_msg', $E->getMessage());
			$this->session->set_flashdata('notification_type', 'error');			  	 
			redirect(site_url('scadmin/classes' ));
			//echo "founc exception :".$E->getMessage();
		}
		exit;

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
		$data['dir']="classes";
		$data['page']="add";
		$data['datas']=$this->mod_classes->get_data($id);

		$this->load->view($this->root_folder."/main",$data);
	}


	/**
	* This Function is for updating Class 
	*
	* @param Post Class Data
	* @return Success redirect classes 
	* @author Tj Thouhid
	* @version 2017-11-24
	*/
	public function update_class(){
		$postedData =$this->input->post(NULL, true);
		$res_data['class_title']=isset($postedData['class_title']) ? $postedData['class_title'] : "";
		$primary_key=$this->uri->segment(4);
		// Db Query Start
		$this->db->trans_begin();	
		
		try{
			if($res_data['class_title']==""){
				throw new Exception(lang("class_title_null"));
			}
			$result=$this->mod_classes->update_data($res_data,$primary_key);
			if($result==false){
				throw new Exception(lang("failure")." ".lang("update"));
			}
			if ($this->db->trans_status() === FALSE)
			{
				throw new Exception("transaction error");
			        // generate an error... or use the log_message() function to log your error
			}
			 $this->db->trans_commit();
			 $this->session->set_flashdata('notification_msg', lang("success")." ".lang("updated"));
			 $this->session->set_flashdata('notification_type', 'success');
			   	 
			 redirect(site_url('scadmin/classes'));

		}
		catch(Exception $E){
			$this->db->trans_rollback();
			$this->session->set_flashdata('notification_msg', $E->getMessage());
			$this->session->set_flashdata('notification_type', 'error');			  	 
			redirect(site_url('scadmin/classes' ));
			//echo "founc exception :".$E->getMessage();
		}
		exit;

	}


	/**
	* This Function is for deleting Class 
	*
	* @param Post delete id
	* @return Add page view
	* @author Tj Thouhid
	* @version 2017-11-24
	*/
	function delete(){
		$delete_id=$this->uri->segment(4);

		// Db Query Start
		$this->db->trans_begin();	
		
		try{
			$result=$this->mod_classes->delete_data($delete_id);
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
