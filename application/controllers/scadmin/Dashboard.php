<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	/**
	 * 
	 * This Controller Is For Admin Dashboard
	 * here all Dashboard Task Happen.
	 *
	 */
	
	public function __construct()
	   {
	    parent::__construct();
	    $this->load->helper('user');
	    $this->load->model('admin/mod_dashboard');

	   
	   }
	private $root_folder="admin";

	public function index()
	{
		check_admin_login();
		$postedData =$this->input->post(NULL);
		// for datatable
		if(array_key_exists("start", $postedData)){
			$this->_get_student_tbl();
			return false;
		}
		else{
		$data['page_name']=lang("dashboard");
		$data['root_folder']=$this->root_folder;
		$data['dir']="dashboard";
		$data['page']="index";
		}

		$this->load->view($this->root_folder."/main",$data);
	}

	/**
	* This Function is for Getting Data Table For Students 
	*
	* @param Post Table Param 
	* @return Success Result Table Json
	* @author Tj Thouhid
	* @version 2017-11-26
	*/

	private function _get_student_tbl(){
		$postedData =$this->input->post(NULL, true);

		$params =array(
			'offset' =>$postedData['start'],
			'length' =>$postedData['length'],
			'search' =>$postedData['search']['value'],
			'sortings' =>isset($postedData['order'])? $postedData['order'] : array(),
			'sortings_columns' =>array("1" =>"st.student_id"),
			'advance_searches' =>isset($postedData['advance_searches'])? $postedData['advance_searches'] : array(),
		);
		$resultForDatatable = $this->mod_dashboard->get_student_list_datatable($params);
		$data = array();
		$serial_no = $postedData['start'];
		foreach ($resultForDatatable['data'] as $sdata) {
		
		    $row = array();
		    $row['0'] = ++$serial_no;
		    $row['1'] = $sdata->student_name;
		    $row['2'] = $sdata->student_address;
		    $row['3'] = $sdata->student_email;
		    $row['4'] = $sdata->student_mobile;
		  
		    $row['5'] = $sdata->student_nid;
		    $row['6'] = $sdata->course_name;
		    $row['7'] = $sdata->course_price;
		    
		 
		    
		    $row['8'] ='<a href="'.site_url().'scadmin/dashboard/pay/'.$sdata->student_id.'" class="btn btn-info"><i class="fa fa-plus" aria-hidden="true"></i></a>';
		   
		
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
	function pay(){
		$data['id']=$id=$this->uri->segment(4);
		$data['page_name']=lang('pay');
		$data['root_folder']=$this->root_folder;
		$data['dir']="dashboard";
		$data['page']="pay";
		$data['student_data']=$this->mod_dashboard->get_student_data($id);

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

		public function insert_pay(){
			$postedData =$this->input->post(NULL);
			$primary_key=$this->uri->segment(4);

			$res_data['student_payment_amount']=isset($postedData['student_payment_amount']) ? $postedData['student_payment_amount'] : "";
			$res_data['student_payment_date']=date("Y-m-d");
			$res_data['student_id']=$primary_key;

			$this->db->trans_begin(); 
	 		try{
	 			

	 			$this->mod_dashboard->save_pay($res_data);
	 			if ($this->db->trans_status() === FALSE){
					throw new Exception("transaction error");
				}
				$this->db->trans_commit();
				$this->session->set_flashdata('notification_msg', 'Payment Added Successfully');
				$this->session->set_flashdata('notification_type', 'success');
				redirect(site_url('scadmin'));
			}catch(Exception $E){
			     $this->db->trans_rollback();
			     $this->session->set_flashdata('notification_msg', $E->getMessage());
				 $this->session->set_flashdata('notification_type', 'danger');
				 redirect(site_url('scadmin'));
			}
					
		}



	
}
