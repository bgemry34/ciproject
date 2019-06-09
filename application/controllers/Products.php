<?php
	class Products extends CI_Controller{
		public function create(){
			$data['title'] = 'Create Product';

			$this->load->view('templates/header');
            $this->load->view('products/create', $data); 
            $this->load->view('templates/footer'); 
		}
	}
