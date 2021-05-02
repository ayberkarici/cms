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
        $this->load->helper("text");
        $this->load->helper("tools");
        $this->load->model("product_model");
        $viewData = new stdClass();
        
        $viewData->viewFolder = "product_list_v";

        $viewData->products = $this->product_model->get_all(array("isActive"  => 1), "rank ASC");
		
		$this->load->view("product_list_v", $viewData);

    }

    public function product_detail($url= "") {
        $this->load->helper("text");
        $this->load->helper("tools");
        $this->load->model("product_model");
        $viewData = new stdClass();
        
        $viewData->viewFolder = "product_v";

        $viewData->product = $this->product_model->get(
            array(
                "isActive"  => 1,
                "url"       => $url
            )
        );

        $viewData->products = $this->product_model->get_all(
            array(
                "isActive"  => 1,
                "id !="    => $viewData->product->id
            ), "rand()", array("start" => 0, "count" => 3)
        );
		
		$this->load->view("product_list_v", $viewData);

    }

    public function portfolio_list() {
        $this->load->helper("text");
        $this->load->helper("tools");
        $this->load->model("portfolio_model");

        $viewData = new stdClass();
        
        $viewData->viewFolder = "portfolio_list_v";

        $viewData->portfolios = $this->portfolio_model->get_all(
            array(
                "isActive"  => 1
            ), "rank ASC"
        );

		$this->load->view("portfolio_list_v", $viewData);

    }

    public function portfolio_detail($url= "") {
        $this->load->helper("text");
        $this->load->helper("tools");
        $this->load->model("portfolio_model");
        $this->load->model("portfolio_image_model");

        $viewData = new stdClass();
        
        $viewData->viewFolder = "portfolio_v";

        $viewData->portfolio_item = $this->portfolio_model->get(
            array(
                "isActive"  => 1,
                "url"       => $url
            )
        );
        $viewData->rand_diff_item = $this->portfolio_model->get_random(
            array(
                "id !="   => $viewData->portfolio_item->id
            )
        );

        $viewData->portfolio_aside_images = $this->portfolio_image_model->get_all(
            array(
                "portfolio_id" => $viewData->rand_diff_item->id
            )
        );

        $viewData->portfolio_item_image = $this->portfolio_image_model->get_all(
            array(
                "portfolio_id" => $viewData->portfolio_item->id
            )
        );

		$this->load->view("portfolio_v", $viewData);
		
		

    }
}
