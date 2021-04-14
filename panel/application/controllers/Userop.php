<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userop extends CI_Controller {

	public $viewFolder = "";

	public function __construct(){
		parent:: __construct();

		$this->viewFolder = "users_v";

		$this->load->model("user_model");

	}

	public function login(){

        if(get_active_user()) {
            redirect(base_url());
        }


        $viewData = new stdClass();

		/* viewe gönderilecek değişkenlerin set edilmesi */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "login";
		
		$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
	}

    public function do_login(){
        $this->load->library("form_validation");

		// Kurallar yazılır
		$this->form_validation->set_rules("user_email","E-posta","required|trim|valid_email");
		$this->form_validation->set_rules("user_password","Şifre","required|trim");

		$this->form_validation->set_message(
			array(
				"required" => "<b>{field}</b> alanı doldurulmalıdır",
				"valid_email" => "Lütfen geçerli bir e-posta adresi girin",

			)
		);

		// Form validation çalıştırılır

        if($this->form_validation->run() == FALSE) {
            $viewData = new stdClass();

			$viewData->viewFolder = $this->viewFolder;
			$viewData->subViewFolder = "login";
			$viewData->form_error = true;
	
			$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

        } else {
            $user = $this->user_model->get(
                array(
                    "email"     => $this->input->post("user_email"), 
                    "password"  => md5($this->input->post("user_password")),
                    "isActive"     => 1 
                )
            );            

            if($user) {
                $alert = array(
                    "title" => "İşlem Başarılı", 
                    "text"  =>  "$user->full_name, Hoş geldiniz.",
                    "type"  => "success"
                );

                $this->session->set_userdata("user", $user);
                $this->session->set_flashdata("alert", $alert);

                redirect(base_url());
            } else {
                // Hata verilecek
                
                $alert = array(
                    "title" => "İşlem Başarısız", 
                    "text"  => "Giriş bilgilerini kontrol et",
                    "type"  => "error"
                );

                $this->session->set_flashdata("alert", $alert);

                redirect(base_url("login"));
            }
        }
    }
    public function logout() {

        $this->session->unset_userdata("user");

        redirect(base_url("login"));
    }
    public function send_email()
    {
        $config = array(
            "protocol"  => "smtp",
            "smtp_host" => "ssl://smtp.gmail.com",
            "smtp_port" => "465",
            "smtp_user" => "ayberk816gg@gmail.com",
            "smtp_pass" => "Soru.bankasi54",
            "starttls"  => true,
            "charset"   => "utf-8",
            "mailtype"  => "html",
            "wordwrap"  => true,
            "newline"   => "\r\n"
        );

        $this->load->library("email", $config);

        $this->email->from("ayberk816gg@gmail.com", "CMS");
        $this->email->to("ayberk_gsli@hotmail.com");
        $this->email->subject("CMS için email çalışmaları");
        $this->email->message("Deneme e-postasi.. ");

        $send = $this->email->send();

        if($send) {
            echo "Eposta başarılı bir şekilde gönderildi.";
        } else {
            echo $this->email->print_debugger();
        }
    }
    public function forget_password(){
        
        if(get_active_user()) {
            redirect(base_url());
        }

        $viewData = new stdClass();

		/* viewe gönderilecek değişkenlerin set edilmesi */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "forget_password";
		
		$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }
    public function reset_password(){
        echo "reset_test";
    }


}
