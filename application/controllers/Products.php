<?php
	class Products extends CI_Controller{
		public function create(){
			if(!$this->session->userdata('is_login') && empty($this->session->userdata('username'))){
			//set message
			$this->session->set_flashdata('acc_create', 'You need to login first');
			redirect('users/log-in');
			}

			$data['title'] = 'Create Product';

			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('price', 'Price', 'required|numeric');
			$this->form_validation->set_rules('description', 'Description', 'required');

			if(!$this->form_validation->run()){
			$this->load->view('templates/header');
            $this->load->view('products/create', $data); 
            $this->load->view('templates/footer'); 
			}else{
				//upload image
				$config['upload_path'] = './assets/images/products';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '2048';
				$path_parts = pathinfo($_FILES["userfile"]["name"]);
				$product_image = $path_parts['filename'].'_'.time().'.'.$path_parts['extension'];
				$config['file_name'] = $product_image;

				//load upload library with config
				$this->load->library('upload', $config);

				//if not upload
				if(!$this->upload->do_upload()){
					$errors=array('error' => $this->upload->display_errors());
					$product_image='noimage.jpg';
				}
				//if upload
				else{
					$data = array('upload_data' => $this->upload->data());
				}
				$user_id = $this->session->userdata('user_id');
				$this->product_model->create_product($product_image, $user_id);
				
				//set message
				$this->session->set_flashdata('product_added', 'Your product has been created!');

				redirect('products');
			}
		}

		public function index(){
			$data['title'] = 'Products';
			$data['products'] = $this->product_model->get_products();

			$this->load->view('templates/header');
            $this->load->view('products/index', $data); 
            $this->load->view('templates/footer');
		}

		public function view($id=NULL, $slug=NULL){
			$data['product'] = $this->product_model->get_products($id, $slug);

			if(empty($data['product'])){
				show_404();
			}

			$this->load->view('templates/header');
            $this->load->view('products/view', $data); 
            $this->load->view('templates/footer');
			
		}

		public function delete($id){
			if(!$this->session->userdata('is_login')){
				$this->session->set_flashdata('user_notlogin', 'You must login first!');
				redirect('users/login');
			}
			if(!$this->user_model->user_check($id, $this->session->userdata('user_id'))){
				$this->session->set_flashdata('acc_denied', 'Access Denied');
				redirect('Home');
			}

			$this->product_model->delete_product($id);

			//set message
			$this->session->set_flashdata('product_deleted', 'Your product has been deleted!');

			redirect('products');
		}

		public function edit($slug, $id){
			$this->toRestrict($id);
			if(!$this->session->userdata('is_login')){
				//set message
				$this->session->set_flashdata('acc_denied', 'Access Denied');
				redirect('users/log-in');
			}

			$data['title'] = 'Edit Product';
			$data['product'] = $this->product_model->get_products($id, $slug);

			$this->load->view('templates/header');
            $this->load->view('products/edit', $data); 
            $this->load->view('templates/footer'); 				
		}

		public function update($slug, $id){
			$this->toRestrict($id);
			$data['product'] = $this->product_model->get_products($id, $slug);

			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('price', 'Price', 'required|numeric');
			$this->form_validation->set_rules('description', 'Description', 'required');

			if(!$this->form_validation->run()){
			$this->edit($slug, $id);
			}else{
				//upload image
				$config['upload_path'] = './assets/images/products';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '2048';
				$path_parts = pathinfo($_FILES["userfile"]["name"]);
				$product_image = $path_parts['filename'].'_'.time().'.'.$path_parts['extension'];
				$config['file_name'] = $product_image;

				//load upload library with config
				$this->load->library('upload', $config);

				//if not upload
				if(!$this->upload->do_upload()){
					$errors=array('error' => $this->upload->display_errors());
					$product_image=$data['product']['product_image'];
				}
				//if upload
				else{
					$data = array('upload_data' => $this->upload->data());
				}
				$this->product_model->update_product($id, $product_image);
				
				//set message
				$this->session->set_flashdata('product_updated', 'Your product has been updated!');

				redirect('products');
			}
		}
		
		//access controll for users
		public function toRestrict($id){
			if(!$this->session->userdata('is_login')){
				$this->session->set_flashdata('user_notlogin', 'You must login first!');
				redirect('users/login');
			}
			if(!$this->user_model->user_check($id, $this->session->userdata('user_id'))){
				$this->session->set_flashdata('acc_denied', 'Access Denied');
				redirect('Home');
			}
		}
	}
