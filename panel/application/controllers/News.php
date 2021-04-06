<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

	public $viewFolder = "";

	public function __construct()
	{
		parent:: __construct();

		$this->viewFolder = "news_v";

		$this->load->model("news_model");
	}

	public function index()
	{
        $viewData = new stdClass();


		/* Tablodan verilerin getirilmesi  */
		$items = $this->news_model->get_all(array(),"rank ASC");
		
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

		// Kurallar
		$news_type = $this->input->post("news_type");
		
		if ($news_type == "image") {
			if($_FILES['img_url']['name'] == "") {
				$alert = array(
					'title' => "İşlem Başarısız.",
					'type' 	=> "error",
					'text'	=> "Lütfen bir görsel seçiniz"
				);
				
				$this->session->set_flashdata("alert", $alert);
				$this->form_validation->set_rules("img_url","image URL","required");
			};

		} else if ($news_type == "video") {
			$this->form_validation->set_rules("video_url","video URL","required|trim");
			

			$alert = array(
				'title' => "İşlem Başarısız.",
				'type' 	=> "error",
				'text'	=> "Lütfen bir video bağlantısı yapıştırın"
			);
			
			$this->session->set_flashdata("alert", $alert);
		}

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
			if($news_type == "image") {
				$file_name = convertToSEO(pathinfo($_FILES["img_url"]["name"], PATHINFO_FILENAME)).".".pathinfo($_FILES["img_url"]["name"], PATHINFO_EXTENSION);

				$config['allowed_types'] = "jpg|jpeg|png";
				$config['upload_path'] = "uploads/$this->viewFolder/";
				$config['file_name'] = $file_name;
		
				$this->load->library("upload", $config);
		
				$upload = $this->upload->do_upload("img_url");
		
				if($upload) {
					$uploaded_file = $this->upload->data("file_name"); 
					
					$data = array(
						"title"			=> $this->input->post("title"),
						"description"	=> $this->input->post("description"),
						"url"			=> convertToSEO($this->input->post("title")),
						"news_type"		=> $news_type,
						"img_url"		=> $uploaded_file,
						"video_url"		=> "#",
						"rank"			=> 0,
						"isActive"		=> 1,
						"createdAt"		=> date("Y-m-d H:i:s")
					);
			 	} else {
					$alert = array(
						'title' => "İşlem Başarısız.",
						'type' 	=> "error",
						'text'	=> "Görsel yüklenirken bir hata oluştu"
					);
				
					$this->session->set_flashdata("alert", $alert);
					
					redirect(base_url("news/new_form"));
	
					die();
				}
				
			} else if ($news_type == "video" ) {
				$data = array(
					"title"			=> $this->input->post("title"),
					"description"	=> $this->input->post("description"),
					"url"			=> convertToSEO($this->input->post("title")),
					"news_type"		=> $news_type,
					"img_url"		=> "#",
					"video_url"		=> $this->input->post("video_url"),
					"rank"			=> 0,
					"isActive"		=> 1,
					"createdAt"		=> date("Y-m-d H:i:s")
				);
			}

			$insert = $this->news_model->add($data);
			
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
			
			$this->session->set_flashdata("alert", $alert);
			
			redirect(base_url("news"));			
		} else {
			$viewData = new stdClass();

			$viewData->viewFolder = $this->viewFolder;
			$viewData->subViewFolder = "add";
			$viewData->form_error = true;
			$viewData->news_type = $news_type;
	
			$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
		}

	}

	public function update_form($id)
	{
		$viewData = new stdClass();

		$item = $this->news_model->get(
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

		// Kurallar
		$this->form_validation->set_rules("title","Başlık","required|trim");

		$this->form_validation->set_message(
			array(
				"required" => "<b>{field}</b> alanı doldurulmalıdır" 
			)
		);

		// Form validation çalıştırılır
		// TRUE - FALSE
		$validate = $this->form_validation->run();

		if ($validate) {
			$update = $this->news_model->update(
				array(
					"id" => $id
				),
				array(
					"title"			=> $this->input->post("title"),
					"description"	=> $this->input->post("description"),
					"url"			=> convertToSEO($this->input->post("title")),
				)
			);
			
			// TODO alert sistemi eklemek
			if($update) {

				$alert = array(
					'title' => "İşlem Başarılı!",
					'type' 	=> "success",
					'text'	=> "Ürün başarıyla değiştirildi"
				);
				
			} else {
	
				$alert = array(
					'title' => "İşlem Başarısız.",
					'type' 	=> "error",
					'text'	=> "Ürün değiştirilemedi"
				);
	
			};
			
			$this->session->set_flashdata("alert", $alert);
			
			redirect("product");				
		} else {
			$viewData = new stdClass();

			// Tablodan verilerin getirilmesi
			$item = $this->news_model->get(
				array(
					"id" => $id
				)
			);

			$viewData->viewFolder = $this->viewFolder;
			$viewData->subViewFolder = "update";
			$viewData->form_error = true;
			$viewData->item = $item;
	
			$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
		}

	}

	public function delete($id)
	{	
		$imagesDelete = $this->product_image_model->get_all(
			array(
				"product_id" => $id
			)
		);

		$delete = $this->news_model->delete(
			array(
				"id" => $id
			)
		);


		//TODO alert sistemi eklenecek
		if($delete) {
			foreach ($imagesDelete as $image) {
				unlink("uploads/$this->viewFolder/$image->img_url");
				
				$this->product_image_model->delete(
					array(
						"product_id" => $id
					)
				);
			}

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
		
		redirect(base_url("product"));
		
	}
	public function imageDelete($id, $parent_id)
	{	
		$file_name = $this->product_image_model->get(
			array(
				"id" => $id
			)			
		);

		$delete = $this->product_image_model->delete(
			array(
				"id" => $id
			)
		);

		//TODO alert sistemi eklenecek
		if($delete) {
			unlink("uploads/$this->viewFolder/$file_name->img_url");
				
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
		
		redirect(base_url("product/image_form/$parent_id"));
	}

	public function isActiveSetter($id)
	{
		if($id) {
			$isActive = ($this->input->post('data') === "true") ? 1 : 0 ;

			$this->news_model->update(
				array(
					"id" => $id
				),
				array(
					"isActive" => $isActive
				)
			);
		}
	}

	public function imageIsActiveSetter($id)
	{
		if($id) {
			$isActive = ($this->input->post('data') === "true") ? 1 : 0 ;

			$this->product_image_model->update(
				array(
					"id" => $id
				),
				array(
					"isActive" => $isActive
				)
			);
		}
	}
	public function isCoverSetter($id, $parent_id)
	{
		if($id && $parent_id) {
			$isCover = ($this->input->post('data') === "true") ? 1 : 0 ;

			// Kapak yapılmak istenen kayıt
			$this->product_image_model->update(
				array(
					"id" 			=> $id,
					"product_id" 	=> $parent_id
				),
				array(
					"isCover" => $isCover
				)
			);
				
			// Kapak yapılmayan kayıtlar
			$this->product_image_model->update(
				array(
					"id !=" 		=> $id,
					"product_id" 	=> $parent_id
				),
				array(
					"isCover" => 0
				)
			);

			$viewData = new stdClass();
		
			$viewData->viewFolder = $this->viewFolder;
			$viewData->subViewFolder = "image";
	
			$viewData->item_images = $this->product_image_model->get_all(
				array(
					"product_id" => $parent_id
				), "rank ASC"
			);
	
			$render_page = $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/render_elements/image_list_v", $viewData, true);
	
			echo $render_page;
		}
	}

	public function rankSetter()
	{
		$data = $this->input->post("data");

		parse_str($data, $order);

		$items = $order['ord'];

		foreach ($items as $rank => $id) {

			$this->news_model->update(
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
	public function imageRankSetter()
	{
		$data = $this->input->post("data");

		parse_str($data, $order);

		$items = $order['ord'];

		foreach ($items as $rank => $id) {

			$this->product_image_model->update(
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

	public function image_form($id)
	{
		$viewData = new stdClass();
		
		$viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "image";
        $viewData->item = $this->news_model->get(
			array(
				"id" => $id
			)
		);

		$viewData->item_images = $this->product_image_model->get_all(
			array(
				"product_id" => $id
			), "rank ASC"
		);

		$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
	}

	public function image_upload($id)
	{
		$file_name = convertToSEO(pathinfo($_FILES["file"]["name"], PATHINFO_FILENAME)).".".pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);

		$config['allowed_types'] = "jpg|jpeg|png";
		$config['upload_path'] = "uploads/$this->viewFolder/";
		$config['file_name'] = $file_name;

		$this->load->library("upload", $config);

		$upload = $this->upload->do_upload("file");

		if($upload) {
			$uploaded_file = $this->upload->data("file_name"); 

			$this->product_image_model->add(
				array(
					"img_url" => $uploaded_file,
					"product_id" => $id,
					"rank" => 0,
					"isActive" => 1,
					"isCover" => 0,
					"createdAt" => date("Y-m-d H:i:s")
				)
			);
			
		} else {
			echo "İşlem başarısız";
		}
	
	}

	public function refresh_image_list($id)
	{
		$viewData = new stdClass();
		
		$viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "image";

		$viewData->item_images = $this->product_image_model->get_all(
			array(
				"product_id" => $id
			)
		);

		$render_page = $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/render_elements/image_list_v", $viewData, true);

		echo $render_page;
	}

}
