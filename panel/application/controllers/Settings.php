<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

	public $viewFolder = "";

	public function __construct()
	{
		parent:: __construct();

		$this->viewFolder = "settings_v";

		$this->load->model("settings_model");

		if(!get_active_user()){
			redirect(base_url("login"));
		}
	}

	public function index(){
        $viewData = new stdClass();


		/* Tablodan verilerin getirilmesi  */
		$item = $this->settings_model->get();

		if($item) {
			$viewData->subViewFolder = "update";
		} else {
			$viewData->subViewFolder = "no_content";
		}

		/* viewe gönderilecek değişkenlerin set edilmesi */
        $viewData->viewFolder = $this->viewFolder;
		$viewData->item = $item;
		
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

		if($_FILES['logo']['name'] == "") {
			$alert = array(
				'title' => "İşlem Başarısız.",
				'type' 	=> "error",
				'text'	=> "Lütfen bir görsel seçiniz"
			);
			
			$this->session->set_flashdata("alert", $alert);
			$this->form_validation->set_rules("logo","Logo","required");

			redirect(base_url("settings/new_form"));

			die();
		};

		$this->form_validation->set_rules("company_name","Şirket/Site Adı","required|trim");
		$this->form_validation->set_rules("phone_1","Telefon 1","required|trim");
		$this->form_validation->set_rules("email","E-posta Adresi","required|trim|valid_email");

		$this->form_validation->set_message(
			array(
				"required" => "<b>{field}</b> alanı doldurulmalıdır", 
				"valid_email" => "Lütfen geçerli bir <b>{field}</b> giriniz" 
			)
		);

		// Form validation çalıştırılır
		$validate = $this->form_validation->run();

		if ($validate) {
			// Upload süreci

			$file_name = convertToSEO($this->input->post("company_name")).".".pathinfo($_FILES["logo"]["name"], PATHINFO_EXTENSION);

			$config['allowed_types'] = "jpg|jpeg|png";
			$config['upload_path'] = "uploads/$this->viewFolder/";
			$config['file_name'] = $file_name;
	
			$this->load->library("upload", $config);
	
			$upload = $this->upload->do_upload("logo");
	
			if($upload) {
				$uploaded_file = $this->upload->data("file_name"); 

				$insert = $this->settings_model->add(
					array(
						"company_name"	=> $this->input->post("company_name"),
						"phone_1"		=> $this->input->post("phone_1"),
						"phone_2"		=> $this->input->post("phone_2"),
						"fax_1"			=> $this->input->post("fax_1"),
						"fax_2"			=> $this->input->post("fax_2"),
						"address"		=> $this->input->post("address"),
						"about_us"		=> $this->input->post("about_us"),
						"mission"		=> $this->input->post("mission"),
						"vision"		=> $this->input->post("vision"),
						"email"			=> $this->input->post("email"),
						"facebook"		=> $this->input->post("facebook"),
						"twitter"		=> $this->input->post("twitter"),
						"linkedin"		=> $this->input->post("linkedin"),
						"instagram"		=> $this->input->post("instagram"),
						"logo"			=> $uploaded_file,
						"createdAt"		=> date("Y-m-d H:i:s")
					)
				);
			
				if($insert) {
					$alert = array(
						'title' => "İşlem Başarılı!",
						'type' 	=> "success",
						'text'	=> "Kayıt başarıyla kaydedildi"
					);
				} else {
					$alert = array(
						'title' => "İşlem Başarısız.",
						'type' 	=> "error",
						'text'	=> "Kayıt kaydedilirken bir hata oluştu"
					);
				};
			} else {
				$alert = array(
					'title' => "İşlem Başarısız.",
					'type' 	=> "error",
					'text'	=> "Görsel yüklenirken bir hata oluştu"
				);
			
				$this->session->set_flashdata("alert", $alert);
				
				redirect(base_url("settings/new_form"));

				die();
			}
			
			$this->session->set_flashdata("alert", $alert);
			
			redirect(base_url("settings"));			
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

		$item = $this->settings_model->get(
			array (
				"id" => $id
			)
		);

		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "update";
		$viewData->item = $item; 

		$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
	}
	public function update_password_form($id){
		$viewData = new stdClass();

		$item = $this->settings_model->get(
			array (
				"id" => $id
			)
		);

		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "password";
		$viewData->item = $item; 

		$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
	}
	public function update($id){
		$this->load->library("form_validation");

		$old_user = $this->settings_model->get(
			array(
				"id" => $id
			)
		);

		// Kurallar yazılır
		if($old_user->user_name != $this->input->post("user_name")) {
			$this->form_validation->set_rules("user_name","Kullanıcı Adı","required|trim|is_unique[users.user_name]");};

		if($old_user->email != $this->input->post("email")) {
			$this->form_validation->set_rules("email","E-posta","required|trim|valid_email|is_unique[users.email]");}

		$this->form_validation->set_rules("full_name","Ad Soyad","required|trim");

		$this->form_validation->set_message(
			array(
				"required" => "<b>{field}</b> alanı doldurulmalıdır",
				"valid_email" => "Lütfen geçerli bir e-posta adresi girin",
				"is_unique" => "<b>{field}</b> alanı daha önceden alınmış",
			)
		);

		// Form validation çalıştırılır
		$validate = $this->form_validation->run();

		if ($validate) {
			// Upload süreci
			$update = $this->settings_model->update(
				array("id" => $id),
				array(
					"user_name"		=> $this->input->post("user_name"),
					"full_name"		=> $this->input->post("full_name"),
					"email"			=> $this->input->post("email"),
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
			
			redirect(base_url("settings"));			
		} else {
			$viewData = new stdClass();

			$viewData->viewFolder = $this->viewFolder;
			$viewData->subViewFolder = "update";
			$viewData->form_error = true;
			$viewData->item = $this->settings_model->get(
				array(
					"id" => $id
				)
			);
			

			$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
		}

	}
	public function update_password($id){
		$this->load->library("form_validation");

		$this->form_validation->set_rules("password","Şifre","required|trim|min_length[6]|max_length[10]");
		$this->form_validation->set_rules("re_password","Şifre tekrar","required|trim|min_length[6]|max_length[10]|matches[password]");

		$this->form_validation->set_message(
			array(
				"required" => "<b>{field}</b> alanı doldurulmalıdır",
				"matches" => "Şifreler birbirini tutmuyor",
				"min_length" => "Şifreniz 6 karakter ya da daha uzun olmalı",
				"max_length" => "Şifreniz 10 karakter ya da daha kısa olmalı"
			)
		);

		// Form validation çalıştırılır
		$validate = $this->form_validation->run();

		if ($validate) {
			// Upload süreci
			$update = $this->settings_model->update(
				array("id" => $id),
				array(
					"password"		=> md5($this->input->post("password")),
				)
			);
			
			if($update) {
				$alert = array(
					'title' => "İşlem Başarılı!",
					'type' 	=> "success",
					'text'	=> "Şifre başarıyla değiştirildi"
				);
			} else {
				$alert = array(
					'title' => "İşlem Başarısız.",
					'type' 	=> "error",
					'text'	=> "Şifre değiştirme sırasında bir problem oluştu"
				);
			};
			
			$this->session->set_flashdata("alert", $alert);
			
			redirect(base_url("settings"));			
		} else {
			$viewData = new stdClass();

			$viewData->viewFolder = $this->viewFolder;
			$viewData->subViewFolder = "password";
			$viewData->form_error = true;
			$viewData->item = $this->settings_model->get(
				array(
					"id" => $id
				)
			);
			

			$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
		}

	}
	public function delete($id){	
		$delete = $this->settings_model->delete(
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
		
		redirect(base_url("settings"));
		
	}
	public function isActiveSetter($id){
		if($id) {
			$isActive = ($this->input->post('data') === "true") ? 1 : 0 ;

			$this->settings_model->update(
				array(
					"id" => $id
				),
				array(
					"isActive" => $isActive
				)
			);
		}
	}
	public function login(){
        $viewData = new stdClass();

		/* viewe gönderilecek değişkenlerin set edilmesi */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "login";
		
		$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
	}

}
