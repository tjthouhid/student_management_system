<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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

	   
	   }

	public function index()
	{
		check_admin_login();
		$postedData =$this->input->post(NULL);
		if(isset($postedData['user_name'])){
			$data = array(
			'user_name' => $postedData['user_name'],
			'pass' => $postedData['user_pass']
			 );
			if(login_admin($data)){
				$this->session->set_flashdata('notification_msg', lang('success_login'));
				$this->session->set_flashdata('notification_type', 'success');
				redirect(site_url('scadmin/dashboard'));
			}else{
				$this->session->set_flashdata('notification_msg', lang('wrong_user_detail'));
				$this->session->set_flashdata('notification_type', 'danger');
				
			}
		}
		$data['page_name']=lang("login");
		$data['root_folder']=$this->root_folder;
		$data['dir']="Login";
		$data['page']="index";

		$this->load->view($this->root_folder."/".$data['dir']."/".$data['page'],$data);
	}

	function out(){
		admin_logout();
		redirect(site_url('scadmin'));
	}
	

	
}
