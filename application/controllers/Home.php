<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * 
	 * This Controller Is For Admin Dashboard
	 * here all Dashboard Task Happen.
	 *
	 */
	private $root_folder="public";

	public function index()
	{
		$data['page_name']=lang("home");
		$data['root_folder']=$this->root_folder;
		$data['dir']="home";
		$data['page']="index";

		$this->load->view($this->root_folder."/main",$data);
	}

	
}
