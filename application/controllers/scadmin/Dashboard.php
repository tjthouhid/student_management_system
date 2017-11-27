<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	/**
	 * 
	 * This Controller Is For Admin Dashboard
	 * here all Dashboard Task Happen.
	 *
	 */
	private $root_folder="admin";

	public function index()
	{
		$data['page_name']=lang("dashboard");
		$data['root_folder']=$this->root_folder;
		$data['dir']="dashboard";
		$data['page']="index";

		$this->load->view($this->root_folder."/main",$data);
	}

	
}
