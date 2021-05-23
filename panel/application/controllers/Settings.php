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
		
		page_title("Ayarlar");
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

			$image_150x35 = upload_picture($_FILES['logo']['tmp_name'], "uploads/$this->viewFolder", 150, 35, $file_name);
				
			if($image_150x35) {

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
						"logo"			=> $file_name,
						"createdAt"		=> date("Y-m-d H:i:s")
					)
				);
			
				if($insert) {
					// Session update işlemi
					$settings = $this->settings_model->get();
					$this->session->set_userdata("settings", $settings);

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
	public function update($id){
		$this->load->library("form_validation");

		// Kurallar yazılır

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

			if($_FILES['logo']['name'] !== "") {
				$file_name = convertToSEO($this->input->post("company_name")).".".pathinfo($_FILES["logo"]["name"], PATHINFO_EXTENSION);

				$image_150x35 = upload_picture($_FILES['logo']['tmp_name'], "uploads/$this->viewFolder", 150, 35, $file_name);
				
				if($image_150x35) {
					
					$data = array(
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
						"logo"			=> $file_name,
						"updatedAt"		=> date("Y-m-d H:i:s")
					);
				} else {
					$alert = array(
						'title' => "İşlem Başarısız.",
						'type' 	=> "error",
						'text'	=> "Görsel yüklenirken bir hata oluştu"
					);
				
					$this->session->set_flashdata("alert", $alert);
					
					redirect(base_url("settings/update_form/$id"));
					
					die();
				}
				
			} else {
				$data = array(
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
					"updatedAt"		=> date("Y-m-d H:i:s")
				);
			}

			$update = $this->settings_model->update(array("id" => $id), $data);
			
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

			// Session update işlemi
			$settings = $this->settings_model->get();
			$this->session->set_userdata("settings", $settings);

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


}
