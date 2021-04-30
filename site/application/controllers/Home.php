<?php 
class Home  extends CI_Controller {
    public $viewFolder = "";
    public function __construct() {
        
        parent::__construct();
        $this->viewFolder = "homepage";

    }
    public function index() {
        // Ana sayfa

        echo $this->viewFolder;
    }

    public function product_list() {
        $this->load->model("product_model");
        $viewData = new stdClass();
        
        $viewData->viewFolder = "product_list_v";

        $viewData->products = $this->product_model->get_all(array("isActive"  => 1), "rank ASC");
		
		$this->load->view("product_list_v", $viewData);

    }
}
