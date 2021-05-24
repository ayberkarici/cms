<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slides extends CI_Controller {

	public $viewFolder = "";

	public function __construct()
	{
		parent:: __construct();

		$this->viewFolder = "slides_v";

		$this->load->model("slide_model");

		if(!get_active_user()){
			redirect(base_url("login"));
		}

		page_title("Slaytlar");
	}

	public function index()
	{
        $viewData = new stdClass();


		/* Tablodan verilerin getirilmesi  */
		$items = $this->slide_model->get_all(array(),"rank ASC");
		
		/* viewe gönderilecek değişkenlerin set edilmesi */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
		$viewData->items = $items;
		
		$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
	}
	
	public function new_form()
	{
		$viewData = new stdClass();
		
		$viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";

		$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
	}

	public function save()
	{
		$this->load->library("form_validation");

		// Kurallar yazılır

		if($_FILES['img_url']['name'] == "") {
			$this->form_validation->set_rules("img_url","Görsel","required");
		};

		$this->form_validation->set_rules("title","Başlık","required|trim");
		
		if($this->input->post("allowButton") == "on") {
			$this->form_validation->set_rules("button_caption","Buton Başlık","required|trim");
			$this->form_validation->set_rules("button_url","Buton URL Bilgisi","required|trim");
		}

		$this->form_validation->set_message(
			array(
				"required" => "<b>{field}</b> alanı doldurulmalıdır" 
			)
		);


		// Form validation çalıştırılır
		$validate = $this->form_validation->run();

		if ($validate) {
			if($_FILES['img_url']['name'] != "") {
				// Upload süreci

				$file_name = convertToSEO(pathinfo($_FILES["img_url"]["name"], PATHINFO_FILENAME)).".".pathinfo($_FILES["img_url"]["name"], PATHINFO_EXTENSION);

				$image_1920x650 = upload_picture($_FILES['img_url']['tmp_name'], "uploads/$this->viewFolder", 1920, 650, $file_name);
				
				if($image_1920x650) {

					$insert = $this->slide_model->add(
						array(
							"title"				=> $this->input->post("title"),
							"description"		=> $this->input->post("description"),
							"img_url"			=> $file_name,
							"allowButton"		=> ($this->input->post("allowButton") == "on") ? 1:0 ,
							"button_caption"	=> $this->input->post("button_caption"),
							"button_url"		=> $this->input->post("button_url"),
							"animation_type"	=> $this->input->post("animation_type"),
							"animation_time"	=> get_slider_velocity($this->input->post("animation_time")),
							"rank"				=> 0,
							"isActive"			=> 1,
							"createdAt"			=> date("Y-m-d H:i:s")
							
						)
					);
				
					if($insert) {
						$alert = array(
							'title' => "İşlem Başarılı!",
							'type' 	=> "success",
							'text'	=> "Ürün başarıyla veritabanına kaydedildi"
						);
					} else {
						$alert = array(
							'title' => "İşlem Başarısız.",
							'type' 	=> "error",
							'text'	=> "Ürün kaydedilemedi"
						);
					};
				} else {
					$alert = array(
						'title' => "İşlem Başarısız.",
						'type' 	=> "error",
						'text'	=> "Görsel yüklenirken bir hata oluştu"
					);
				
					$this->session->set_flashdata("alert", $alert);
					
					redirect(base_url("slides/new_form"));

					die();
				}
				
				$this->session->set_flashdata("alert", $alert);
				
				redirect(base_url("slides"));			
			}
		} else {
			$viewData = new stdClass();

			$viewData->viewFolder = $this->viewFolder;
			$viewData->subViewFolder = "add";
			$viewData->form_error = true;
	
			$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
		}

	}

	public function update_form($id)
	{
		$viewData = new stdClass();

		$item = $this->slide_model->get(
			array (
				"id" => $id
			)
		);

		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "update";
		$viewData->item = $item; 

		$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
	}

	public function update($id)
	{
		$this->load->library("form_validation");

		// Kurallar yazılır

		$this->form_validation->set_rules("title","Başlık","required|trim");

		if($this->input->post("allowButton") == "on") {
			$this->form_validation->set_rules("button_caption","Buton Başlık","required|trim");
			$this->form_validation->set_rules("button_url","Buton URL Bilgisi","required|trim");
		}

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

				$image_1920x650 = upload_picture($_FILES['img_url']['tmp_name'], "uploads/$this->viewFolder", 1920, 650, $file_name);
				
				if($image_1920x650) {
					
					$data = array(
						"title"				=> $this->input->post("title"),
						"description"		=> $this->input->post("description"),
						"img_url"			=> $file_name,
						"allowButton"		=> ($this->input->post("allowButton") == "on") ? 1:0 ,
						"button_caption"	=> $this->input->post("button_caption"),
						"button_url"		=> $this->input->post("button_url"),
						"animation_type"	=> $this->input->post("animation_type"),
						"animation_time"	=> get_slider_velocity($this->input->post("animation_time")),
					);
				} else {
					$alert = array(
						'title' => "İşlem Başarısız.",
						'type' 	=> "error",
						'text'	=> "Görsel yüklenirken bir hata oluştu"
					);
				
					$this->session->set_flashdata("alert", $alert);
					
					redirect(base_url("slides/update_form/$id"));
					
					die();
				}
				
			} else {
				$data = array(
					"title"				=> $this->input->post("title"),
					"description"		=> $this->input->post("description"),
					"allowButton"		=> ($this->input->post("allowButton") == "on") ? 1:0 ,
					"button_caption"	=> $this->input->post("button_caption"),
					"button_url"		=> $this->input->post("button_url"),
					"animation_type"	=> $this->input->post("animation_type"),
					"animation_time"	=> get_slider_velocity($this->input->post("animation_time"))
				);
			}

			$update = $this->slide_model->update(array("id" => $id), $data);
			
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
			
			redirect(base_url("slides"));			
		} else {
			$viewData = new stdClass();

			$viewData->viewFolder = $this->viewFolder;
			$viewData->subViewFolder = "update";
			$viewData->form_error = true;
			$viewData->item = $this->slide_model->get(
				array(
					"id" => $id
				)
			);
			

			$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
		}

	}

	public function delete($id)
	{	
		$delete = $this->slide_model->delete(
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
		
		redirect(base_url("slides"));
		
	}

	public function isActiveSetter($id)
	{
		if($id) {
			$isActive = ($this->input->post('data') === "true") ? 1 : 0 ;

			$this->slide_model->update(
				array(
					"id" => $id
				),
				array(
					"isActive" => $isActive
				)
			);
		}
	}

	public function rankSetter()
	{
		$data = $this->input->post("data");

		parse_str($data, $order);

		$items = $order['ord'];

		foreach ($items as $rank => $id) {

			$this->slide_model->update(
				array(
					"id" 		=> $id,
					"rank !=" 	=> $rank
				),
				array(
					"rank" 		=> $rank
				)
			);
		};

	}

}
