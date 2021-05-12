<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portfolio_categories extends CI_Controller {

	public $viewFolder = "";

	public function __construct()
	{
		parent:: __construct();

		$this->viewFolder = "portfolio_categories_v";

		$this->load->model("portfolio_category_model");

		if(!get_active_user()){
			redirect(base_url("login"));
		}

		page_title("Portfolyo Kategorileri");
		
	}

	public function index()
	{
        $viewData = new stdClass();


		/* Tablodan verilerin getirilmesi  */
		$items = $this->portfolio_category_model->get_all(array());
		
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
		$this->form_validation->set_rules("title","Başlık","required|trim");

		$this->form_validation->set_message(
			array(
				"required" => "<b>{field}</b> alanı doldurulmalıdır" 
			)
		);

		// Form validation çalıştırılır
		$validate = $this->form_validation->run();

		if ($validate) {
			$insert = $this->portfolio_category_model->add(
				array(
					"title"			=> $this->input->post("title"),
					"isActive"		=> 1,
					"createdAt"		=> date("Y-m-d H:i:s")
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
			
			
			$this->session->set_flashdata("alert", $alert);
			
			redirect(base_url("portfolio_categories"));			
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

		$item = $this->portfolio_category_model->get(
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

		$this->form_validation->set_message(
			array(
				"required" => "<b>{field}</b> alanı doldurulmalıdır" 
			)
		);

		// Form validation çalıştırılır
		$validate = $this->form_validation->run();

		if ($validate) {
			// Upload süreci
			$update = $this->portfolio_category_model->update(
				array("id" => $id),
				array("title"	=> $this->input->post("title"))
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
			
			redirect(base_url("portfolio_categories"));			
		} else {
			$viewData = new stdClass();
			$viewData->viewFolder = $this->viewFolder;
			$viewData->subViewFolder = "update";
			$viewData->form_error = true;
			$viewData->item = $this->portfolio_category_model->get(
				array(
					"id" => $id
				)
			);
			
			$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
		}

	}

	public function delete($id)
	{	
		$deleted_item = $this->portfolio_category_model->get(
			array(
				"id" => $id
			)
		);

		$delete = $this->portfolio_category_model->delete(
			array(
				"id" => $id
			)
		);


		if($delete) {
			unlink("uploads/$this->viewFolder/$deleted_item->img_url");

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
		
		redirect(base_url("portfolio_categories"));
		
	}

	public function isActiveSetter($id)
	{
		if($id) {
			$isActive = ($this->input->post('data') === "true") ? 1 : 0 ;

			$this->portfolio_category_model->update(
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
