<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends CI_Controller {

	/**
	 * 
	 * This Controller Is For Admin Dashboard
	 * here all Dashboard Task Happen.
	 *
	 */
	private $root_folder="public";
	public function __construct()
	   {
	       parent::__construct();
	      $this->load->model('mod_students');
	      $this->load->helper('user');
	   }

	public function register()
	{
		check_user_login();
		$data['page_name']=lang("register");
		$data['root_folder']=$this->root_folder;
		$data['dir']="student";
		$data['page']="register";
		$data['course_lists']=$this->mod_students->get_course_list();

		$this->load->view($this->root_folder."/main",$data);
	}

		public function insert_student(){
			$postedData =$this->input->post(NULL);

			$res_data['student_name']=isset($postedData['student_name']) ? $postedData['student_name'] : "";
			$res_data['student_email']=isset($postedData['student_email']) ? $postedData['student_email'] : "";
			$res_data['student_mobile']=isset($postedData['student_mobile']) ? $postedData['student_mobile'] : "";
			$res_data['student_address']=isset($postedData['student_address']) ? $postedData['student_address'] : "";
			$res_data['student_nid']=isset($postedData['student_nid']) ? $postedData['student_nid'] : "";
			$res_data['student_password']=isset($postedData['student_password']) ? $postedData['student_password'] : "";
			$cs_data['course_id']=isset($postedData['course_id']) ? $postedData['course_id'] : "";

			$this->db->trans_begin(); 
	 		try{
	 			if($res_data['student_name']==""){
	 				throw new Exception(lang("student")." ".lang("name")." ".lang("not_null"));
	 			}
	 			if($res_data['student_email']==""){
	 				throw new Exception(lang("student")." ".lang("email")." ".lang("not_null"));
	 			}
	 			if($res_data['student_mobile']==""){
	 				throw new Exception(lang("student")." ".lang("mobile")." ".lang("not_null"));
	 			}
	 			if($res_data['student_address']==""){
	 				throw new Exception(lang("student")." ".lang("address")." ".lang("not_null"));
	 			}
	 			if($res_data['student_nid']==""){
	 				throw new Exception(lang("student")." ".lang("nid")." ".lang("not_null"));
	 			}
	 			if($res_data['student_password']==""){
	 				throw new Exception(lang("student")." ".lang("passwor")." ".lang("not_null"));
	 			}
	 			if($cs_data['course_id']==""){
	 				throw new Exception(lang("student")." ".lang("course")." ".lang("not_null"));
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

	 			$student_insert_id=$this->mod_students->save_student_info($res_data,$image_name);
	 			if($student_insert_id){
	 				$cs_data['student_id']=$student_insert_id;
	 				$course_insert=$this->mod_students->save_student_course($cs_data);
	 				if(!$course_insert){
	 					throw new Exception(lang("some_thing_wrong"));
	 				}
	 			}else{
	 				throw new Exception(lang("some_thing_wrong"));
	 			}
	 			if ($this->db->trans_status() === FALSE){
					throw new Exception("transaction error");
				}
				$this->db->trans_commit();
				$this->session->set_flashdata('notification_msg', lang("student")." ".lang('inserted')." ".lang('success'));
				$this->session->set_flashdata('notification_type', 'success');
				redirect(site_url('students/register'));
			}catch(Exception $E){
			     $this->db->trans_rollback();
			     $this->session->set_flashdata('notification_msg', $E->getMessage());
				 $this->session->set_flashdata('notification_type', 'danger');
				 redirect(site_url('students/register'));
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



	public function login()
	{
		check_user_login();
		$postedData =$this->input->post(NULL);
		if(isset($postedData['student_email'])){
			$data = array(
			'user_email' => $postedData['student_email'],
			'pass' => $postedData['student_password']
			 );
			if(login_user($data)){
				$this->session->set_flashdata('notification_msg', lang('success_login'));
				$this->session->set_flashdata('notification_type', 'success');
				redirect(site_url('students/profile'));
			}else{
				$this->session->set_flashdata('notification_msg', lang('wrong_user_detail'));
				$this->session->set_flashdata('notification_type', 'danger');
				
			}
		}
		$data['page_name']=lang("login");
		$data['root_folder']=$this->root_folder;
		$data['dir']="student";
		$data['page']="login";
		
		$this->load->view($this->root_folder."/main",$data);
	}

	function profile(){
		check_user_login();
		$data['page_name']=lang("profile");
		$data['root_folder']=$this->root_folder;
		$data['dir']="student";
		$data['page']="profile";
		
		$this->load->view($this->root_folder."/main",$data);
	}

	function logout(){
		user_logout();
		redirect(site_url());
	}

	function printPdf(){
		$data['page_name']=lang("profile");
		$data['root_folder']=$this->root_folder;
		$data['dir']="student";
		$data['page']="profile";
		$user_id= $this->session->userdata('user_id');
		$data['student_datas']=$this->mod_students->get_student_datas($user_id);
		$data['payment_datas']=$this->mod_students->get_student_payment_datas($user_id);
		$avatarUrl = site_url().'uploads/logo.png';
		

		//echo '<img src="'.$data['imageData'].'" width="">';
		//exit;
		    // // page info here, db calls, etc.     
		   //$this->load->view($this->root_folder."/student/printPdf", $data);
		    

		   
		     //Load the library
		     $this->load->library('html2pdf');
		     
		     //Set folder to save PDF to
		     $this->html2pdf->folder('./uploads/');
		     
		     //Set the filename to save/download as
		     $this->html2pdf->filename('test.pdf');
		     
		     //Set the paper defaults
		     $this->html2pdf->paper('a4', 'portrait');
		     
		     // $data = array(
		     // 	'title' => 'PDF Created',
		     // 	'message' => 'Hello World!'
		     // );
		     
		     //Load html view
		     $this->html2pdf->html($this->load->view($this->root_folder."/student/printPdf", $data, true));
		     
		     if($this->html2pdf->create('download')) {
		     	//PDF was successfully saved or downloaded
		     	echo 'PDF saved';
		     }
	}


	function checkEmail(){
		$student_email=$_POST['student_email'];
		$student=$this->mod_students->checkEmail($student_email);
		if($student){
			echo 'false';
		}else{
			echo 'true';
		}
		exit;
	}

	
}
