<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public $viewFolder = "";

	public function __construct()
	{
		parent:: __construct();

		$this->viewFolder = "users_v";

		$this->load->model("user_model");
	}

	public function index(){
        $viewData = new stdClass();


		/* Tablodan verilerin getirilmesi  */
		$items = $this->user_model->get_all(array());
		
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

		$this->form_validation->set_rules("user_name","Kullanıcı Adı","required|trim|is_unique[users.user_name]");
		$this->form_validation->set_rules("full_name","Ad Soyad","required|trim");
		$this->form_validation->set_rules("email","E-posta","required|trim|valid_email|is_unique[users.email]");
		$this->form_validation->set_rules("password","Şifre","required|trim|min_length[6]|max_length[10]");
		$this->form_validation->set_rules("re_password","Şifre tekrar","required|trim|min_length[6]|max_length[10]|matches[password]");

		$this->form_validation->set_message(
			array(
				"required" => "<b>{field}</b> alanı doldurulmalıdır",
				"valid_email" => "Lütfen geçerli bir e-posta adresi girin",
				"is_unique" => "<b>{field}</b> alanı daha önceden alınmış",
				"matches" => "Şifreler birbirini tutmuyor",
				"min_length" => "Şifreniz 6 karakter ya da uzun olmalı",
				"max_length" => "Şifreniz 10 karakter ya da  kısa olmalı"
			)
		);

		// Form validation çalıştırılır
		$validate = $this->form_validation->run();

		if ($validate) {
			// Upload süreci
			$insert = $this->user_model->add(
				array(
					"user_name"		=> $this->input->post("user_name"),
					"full_name"		=> $this->input->post("full_name"),
					"email"			=> $this->input->post("email"),
					"password"		=> md5($this->input->post("password")),
					"isActive"		=> 1,
					"createdAt"		=> date("Y-m-d H:i:s"),
				)
			);
		
			if($insert) {
				$alert = array(
					'title' => "İşlem Başarılı!",
					'type' 	=> "success",
					'text'	=> "Kullanıcı başarıyla veritabanına kaydedildi"
				);
			} else {
				$alert = array(
					'title' => "İşlem Başarısız.",
					'type' 	=> "error",
					'text'	=> "Kullanıcı kaydedilemedi"
				);
			};

			$this->session->set_flashdata("alert", $alert);
		
			redirect(base_url("users"));			
			
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

		$item = $this->user_model->get(
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

		// Kurallar yazılır

		$this->form_validation->set_rules("title","Başlık","required|trim");

		$this->form_validation->set_message(
			array(
				"required" => "<b>{field}</b> alanı doldurulmalıdır" 
			)
		);

		// Form validation çalıştırılır
		$validate = $this->form_validation->run();

		if ($validate) {
			// Upload süreci

			if($_FILES['img_url']['name'] !== "") {
				$file_name = convertToSEO(pathinfo($_FILES["img_url"]["name"], PATHINFO_FILENAME)).".".pathinfo($_FILES["img_url"]["name"], PATHINFO_EXTENSION);

				$config['allowed_types'] = "jpg|jpeg|png";
				$config['upload_path'] = "uploads/$this->viewFolder/";
				$config['file_name'] = $file_name;
		
				$this->load->library("upload", $config);
		
				$upload = $this->upload->do_upload("img_url");
		
				if($upload) {
					$old_image = $this->user_model->get(
						array(
							"id" => $id
						)
					);

					$uploaded_file = $this->upload->data("file_name"); 
					
					$data = array(
						"title"			=> $this->input->post("title"),
						"description"	=> $this->input->post("description"),
						"url"			=> convertToSEO($this->input->post("title")),
						"img_url"		=> $uploaded_file,
						"changedAt"		=> date("Y-m-d H:i:s")
					);
				} else {
					$alert = array(
						'title' => "İşlem Başarısız.",
						'type' 	=> "error",
						'text'	=> "Görsel yüklenirken bir hata oluştu"
					);
				
					$this->session->set_flashdata("alert", $alert);
					
					redirect(base_url("references/update_form/$id"));
					
					die();
				}
				
			} else {
				$data = array(
					"title"			=> $this->input->post("title"),
					"description"	=> $this->input->post("description"),
					"url"			=> convertToSEO($this->input->post("title")),
					"changedAt"		=> date("Y-m-d H:i:s")
				);
			}

			$update = $this->user_model->update(array("id" => $id), $data);
			
			if($update) {
				if($_FILES['img_url']['name'] !== "") {
					unlink("uploads/$this->viewFolder/$old_image->img_url");
				};

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
			
			redirect(base_url("references"));			
		} else {
			$viewData = new stdClass();

			$viewData->viewFolder = $this->viewFolder;
			$viewData->subViewFolder = "update";
			$viewData->form_error = true;
			$viewData->item = $this->user_model->get(
				array(
					"id" => $id
				)
			);
			

			$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
		}

	}
	public function delete($id){	
		$delete = $this->user_model->delete(
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
		
		redirect(base_url("references"));
		
	}
	public function isActiveSetter($id){
		if($id) {
			$isActive = ($this->input->post('data') === "true") ? 1 : 0 ;

			$this->user_model->update(
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
