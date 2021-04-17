<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public $viewFolder = "";
//	public $user = "";

	public function __construct()
	{
		parent:: __construct();

		$this->viewFolder = "dashboard_v";
		$this->subViewFolder = "list";

//		$this->user = get_Active_user();

		if(!get_active_user()){
			redirect(base_url("login"));
		}

		$this->load->model("settings_model");
		$settings = $this->settings_model->get();
		$this->session->set_userdata("settings", $settings);

	}

	public function index()
	{
    	$viewData = new stdClass();
    	$viewData->viewFolder = $this->viewFolder;
    	$viewData->subViewFolder = $this->subViewFolder;
		
		$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
	}
}
