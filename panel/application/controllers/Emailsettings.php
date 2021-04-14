<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Emailsettings extends CI_Controller {

	public $viewFolder = "";

	public function __construct(){
		parent:: __construct();

		$this->viewFolder = "email_settings_v";

		$this->load->model("emailsettings_model");

		if(!get_active_user()){
			redirect(base_url("login"));
		}
	}

	public function index(){
        $viewData = new stdClass();


		/* Tablodan verilerin getirilmesi  */
		$items = $this->emailsettings_model->get_all(array());
		
		/* viewe gönderilecek değişkenlerin set edilmesi */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
		$viewData->items = $items;
		
		$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
	}
	public function new_form(){
		$viewData = new stdClass();
		
		$viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";

		$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
	}
	public function save(){
		$this->load->library("form_validation");

		// Kurallar yazılır

		$this->form_validation->set_rules("protocol","Protokol Numarası","required|trim");
		$this->form_validation->set_rules("host","E-posta Sunucusu","required|trim");
		$this->form_validation->set_rules("port","Port Numarası","required|trim");
		$this->form_validation->set_rules("user_name","Kullanıcı Adı","required|trim");
		$this->form_validation->set_rules("user","E-posta (User)","required|trim|valid_email");
		$this->form_validation->set_rules("from","Kimden gidecek (from)","required|trim|valid_email");
		$this->form_validation->set_rules("to","Kime gidecek (to)","required|trim|valid_email");
		$this->form_validation->set_rules("password","Şifre","required|trim");
		
		
		$this->form_validation->set_message(
			array(
				"required" => "<b>{field}</b> alanı doldurulmalıdır",
				"valid_email" => "Lütfen geçerli bir e-posta adresi girin",
			)
		);

		// Form validation çalıştırılır
		$validate = $this->form_validation->run();

		if ($validate) {
			// Upload süreci
			$insert = $this->emailsettings_model->add(
				array(
					"protocol"		=> $this->input->post("protocol"),
					"host"			=> $this->input->post("host"),
					"port"			=> $this->input->post("port"),
					"user_name"		=> $this->input->post("user_name"),
					"user"			=> $this->input->post("user"),
					"from"			=> $this->input->post("from"),
					"to"			=> $this->input->post("to"),
					"password"		=> $this->input->post("password"),
					"isActive"		=> 1,
					"createdAt"		=> date("Y-m-d H:i:s")
				)
			);
		
			if($insert) {
				$alert = array(
					'title' => "İşlem Başarılı!",
					'type' 	=> "success",
					'text'	=> "E-posta başarıyla veritabanına kaydedildi"
				);
			} else {
				$alert = array(
					'title' => "İşlem Başarısız.",
					'type' 	=> "error",
					'text'	=> "E-posta kaydedilemedi"
				);
			};

			$this->session->set_flashdata("alert", $alert);
		
			redirect(base_url("emailsettings"));			
			
			die();
		} else {
			$viewData = new stdClass();

			$viewData->viewFolder = $this->viewFolder;
			$viewData->subViewFolder = "add";
			$viewData->form_error = true;
	
			$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
		}

	}
	public function update_form($id){
		$viewData = new stdClass();

		$item = $this->emailsettings_model->get(
			array (
				"id" => $id
			)
		);

		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "update";
		$viewData->item = $item; 

		$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
	}
	public function update($id){
		$this->load->library("form_validation");
		
		$this->form_validation->set_rules("protocol","Protokol Numarası","required|trim");
		$this->form_validation->set_rules("host","E-posta Sunucusu","required|trim");
		$this->form_validation->set_rules("port","Port Numarası","required|trim");
		$this->form_validation->set_rules("user_name","Kullanıcı Adı","required|trim");
		$this->form_validation->set_rules("user","E-posta (User)","required|trim|valid_email");
		$this->form_validation->set_rules("from","Kimden gidecek (from)","required|trim|valid_email");
		$this->form_validation->set_rules("to","Kime gidecek (to)","required|trim|valid_email");
		$this->form_validation->set_rules("password","Şifre","required|trim");

		$this->form_validation->set_message(
			array(
				"required" => "<b>{field}</b> alanı doldurulmalıdır",
				"valid_email" => "Lütfen geçerli bir e-posta adresi girin",
			)
		);

		// Form validation çalıştırılır
		$validate = $this->form_validation->run();

		if ($validate) {
			// Upload süreci
			$update = $this->emailsettings_model->update(
				array("id" => $id),
				array(
					"protocol"		=> $this->input->post("protocol"),
					"host"			=> $this->input->post("host"),
					"port"			=> $this->input->post("port"),
					"user_name"		=> $this->input->post("user_name"),
					"user"			=> $this->input->post("user"),
					"from"			=> $this->input->post("from"),
					"to"			=> $this->input->post("to"),
					"password"		=> $this->input->post("password"),
				)
			);
			
			if($update) {
				$alert = array(
					'title' => "İşlem Başarılı!",
					'type' 	=> "success",
					'text'	=> "Kayıt başarıyla güncellendi"
				);
			} else {
				$alert = array(
					'title' => "İşlem Başarısız.",
					'type' 	=> "error",
					'text'	=> "Kayıt güncelleme sırasında bir problem oluştu"
				);
			};
			
			$this->session->set_flashdata("alert", $alert);
			
			redirect(base_url("emailsettings"));			
		} else {
			$viewData = new stdClass();

			$viewData->viewFolder = $this->viewFolder;
			$viewData->subViewFolder = "update";
			$viewData->form_error = true;
			$viewData->item = $this->emailsettings_model->get(
				array(
					"id" => $id
				)
			);
			

			$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
		}

	}
	public function delete($id){	
		$delete = $this->emailsettings_model->delete(
			array(
				"id" => $id
			)
		);


		//TODO alert sistemi eklenecek
		if($delete) {

			$alert = array(
				'title' => "İşlem Başarılı!",
				'type' 	=> "success",
				'text'	=> "Ürün başarıyla veritabanından silindi"
			);
			
		} else {

			$alert = array(
				'title' => "İşlem Başarısız.",
				'type' 	=> "error",
				'text'	=> "Ürün silinemedi"
			);

		};
		
		$this->session->set_flashdata("alert", $alert);
		
		redirect(base_url("emailsettings"));
		
	}
	public function isActiveSetter($id){
		if($id) {
			$isActive = ($this->input->post('data') === "true") ? 1 : 0 ;

			$this->emailsettings_model->update(
				array(
					"id" => $id
				),
				array(
					"isActive" => $isActive
				)
			);
		}
	}

}
