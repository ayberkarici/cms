<?php 
class Home  extends CI_Controller {
    public $viewFolder = "";
    public function __construct() {
        
        parent::__construct();
        $this->viewFolder = "homepage";
        $this->load->helper("text");
        
        
    }
    public function index() {
        // Ana sayfa
        echo $this->viewFolder;
    }

    public function product_list() {
        $this->load->helper("tools");
        $this->load->model("product_model");
        $viewData = new stdClass();
        
        $viewData->viewFolder = "product_list_v";

        $viewData->products = $this->product_model->get_all(array("isActive"  => 1), "rank ASC");
		
		$this->load->view("product_list_v", $viewData);

    }

    public function product_detail($url= "") {
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
        $viewData->rand_diff_item = $this->portfolio_model->get_all(
            array(
                "isActive" => 1,
                "id !="   => $viewData->portfolio_item->id
            ), "rand()", array (
                "count" => 1,
                "start" => 0
            )
            );

        $viewData->portfolio_aside_image = $this->portfolio_image_model->get(
            array(
                "isActive"  => 1,
                "portfolio_id" => $viewData->rand_diff_item->id,
                "isCover" => 1
            ) 
        );

        $viewData->portfolio_item_image = $this->portfolio_image_model->get_all(
            array(
                "isActive"  => 1,
                "portfolio_id" => $viewData->portfolio_item->id
            )
        );

		$this->load->view("portfolio_v", $viewData);
		
		

    }

    public function course_list(){
        $viewData = new stdClass();
        $viewData->viewFolder = "course_list_v";
        
        $this->load->model("course_model");

        $viewData->courses = $this->course_model->get_all(
            array(
                "isActive" => 1
            ) , "rank ASC, event_date ASC"
        );

		$this->load->view("course_list_v", $viewData);

    }

    public function course_detail($url) {  
        $this->load->helper("tools");
        $this->load->model("course_model");

        $viewData = new stdClass();
        
        $viewData->viewFolder = "course_v";

        $viewData->course_item = $this->course_model->get(
            array(
                "isActive"  => 1,
                "url"       => $url
            )
        );
        $viewData->rand_diff_item = $this->course_model->get(
            array(
                "isActive"  => 1,
                "id !="   => $viewData->course_item->id
            ), "rand()"
        );

		$this->load->view($viewData->viewFolder, $viewData);
    }

    public function reference_list(){

        $viewData = new stdClass();
        $viewData->viewFolder = "reference_list_v";
        $this->load->model("reference_model");
        $viewData->references = $this->reference_model->get_all(
            array(
                "isActive" => 1,
            ), "rank ASC"
        );

        $this->load->view($viewData->viewFolder, $viewData);

    }

    public function brand_list(){

        $viewData = new stdClass();
        $viewData->viewFolder = "brand_list_v";

        $this->load->model("brand_model");

        $viewData->brands = $this->brand_model->get_all(
            array(
                "isActive"  => 1
            ), "rank ASC"
        );

        $this->load->view($viewData->viewFolder, $viewData);

    }

    public function service_list(){

        $viewData = new stdClass();
        $viewData->viewFolder = "service_list_v";
        $this->load->model("service_model");
        $viewData->services = $this->service_model->get_all(
            array(
                "isActive" => 1,
            ), "rank ASC"
        );

        $this->load->view($viewData->viewFolder, $viewData);

    }

    public function about_us(){

        $viewData = new stdClass();

        $viewData->viewFolder = "about_v";
        $this->load->model("settings_model");
        $viewData->settings = $this->settings_model->get();

        $this->load->view($viewData->viewFolder, $viewData);

    }

    public function contact() {
        $viewData = new stdClass();

        $viewData->viewFolder = "contact_v";
        $this->load->helper("captcha");

        $config = array(
            "word"          => '',
            "img_path"      => "captcha/",
            "img_url"       => base_url("captcha"),
            "font_path"     => base_url("fonts/corbel.ttf"),
            "img_width"     => 150,
            "img_height"    => 50,
            "expiration"    => 7200,
            "word_length"   => 5,
            "font_size"     => 20,
            "image_id"      => "captcha_img",
            "pool"          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
            "colors"        => array(
                "background"=> array(56,255,45),
                "border"    => array(255,255,255),
                "text"      => array(0,0,0),
                "grid"      => array(255,40,40)
            )
        );

        $captcha = create_captcha($config);
        $viewData->captcha = $captcha;

        $this->session->set_userdata("captcha", $viewData->captcha["word"]);

        $this->load->view($viewData->viewFolder, $viewData); 
    }

    public function send_contact_message() {
        $this->load->library("form_validation");    
        
        $this->form_validation->set_rules("name", "Ad", "trim|required");
        $this->form_validation->set_rules("email", "E-posta", "trim|required|valid_email");
        $this->form_validation->set_rules("subject", "Konu", "trim|required");
        $this->form_validation->set_rules("message", "Mesaj", "trim|required");
        $this->form_validation->set_rules("captcha", "Doğrulama Kodu", "trim|required");

        if($this->form_validation->run() === FALSE) {

            // TODO Alert.. 
            redirect(base_url("iletisim"));
            
        } else {
            
            if($this->session->userdata("captcha") == $this->input->post("captcha")) {

                $name = $this->input->post("name");
                $email = $this->input->post("email");
                $subject = $this->input->post("subject");
                $message = $this->input->post("message");

                $email_message = "<b>{$name}</b> isimli ziyaretçi mesaj bıraktı: <br> <b>Mesaj</b> : {$message} <br> <b>E-posta</b> : {$email}";

                if(send_email("", "Site iletişim mesajı | $subject", $email_message)) {
                    echo "işlem başarılı"; 
                } else {
                    echo "işlem başarısız";
                }

            } else {

                echo "Captcha yanlış";
                
            }
            
        }
    }

    public function make_me_member() {
        $this->load->library("form_validation");

        $this->form_validation->set_rules("subscribe_email", "Abone ol", "required|trim|valid_email");

        if($this->form_validation->run() == FALSE) {
            
            // TODO Alert

        } else {

            $this->load->model("member_model");

            $insert = $this->member_model->add(
                array(
                    "isActive"  => 1,
                    "email"     => $this->input->post("subscribe_email"),
                    "ip_address"=> $this->input->ip_address(),
                    "createdAt" => date("Y-m-d H-i-s")
                )
            );

            if($instert){
                // TODO

            } else {
                // TODO

            }
        }

        redirect(base_url('iletisim'));

    }

    public function news_list() {
        $this->load->helper("tools");
        $this->load->model("news_model");

        $viewData = new stdClass();
        
        $viewData->viewFolder = "news_list_v";

        $viewData->news_list = $this->news_model->get_all(
            array(
                "isActive"  => 1
            ), "rank DESC"
        );

		$this->load->view($viewData->viewFolder, $viewData);
    }

    public function news($url) {

        if($url != "") {
            $this->load->helper("tools");
            $this->load->model("news_model");
    
            $viewData = new stdClass();
            
            $viewData->viewFolder = "news_v";
    
            $news = $this->news_model->get(
                array(
                    "isActive"  => 1,
                    "url"       => $url
                )
            );

            if($news) {
                $viewData->news = $news;
                
                $viewData->recent_news = $this->news_model->get_all(
                    array(
                        "id !="     => $news->id,
                        "isActive"  => 1
                    ) , "rank DESC"
                );

                /****************** Görüntülenme  ******************/
    
                $view_count = $news->view_count + 1;
                $this->news_model->update(
                    array(
                        "id" => $news->id
                    ),
                    array(
                        "view_count" => $view_count
                    )
                );

                $viewData->news->view_count = $view_count;

                $this->load->view($viewData->viewFolder, $viewData);
                
            } else {
                // TODO Alert...
            }
            
            
        } else {
            // TODO Alert...
            
        }
    }
}

