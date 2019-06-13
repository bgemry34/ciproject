<?php
	class product_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

		public function create_product($product_image, $user_id){
			$slug = url_title($this->input->post('name'));
			$data = array(
				'name' => $this->input->post('name'),
				'user_id'=>$user_id,
				'slug' => $slug,
				'price' => $this->input->post('price'),
				'description' => $this->input->post('description'),
				'product_image' => $product_image,
			);

			return $this->db->insert('products', $data);
		}

		public function get_products($id = NULL, $slug=NULL){
			if($id==NULL && $id==NULL){
				$this->db->order_by('id', 'DESC');
				$query = $this->db->get('products');
				return $query->result_array();
			}
				$query = $this->db->get_where('products', array('id' => $id, 'slug' => $slug));
				return $query->row_array();
		}

		public function delete_product($id){
			$this->db->where('id', $id);
			$this->db->delete('products');
			return true;
		}

		public function update_product($id, $product_image){
			$slug = url_title($this->input->post('name'));
			$data = array(
				'name' => $this->input->post('name'),
				'price' => $this->input->post('price'),
				'description' => $this->input->post('description'),
				'slug' => $slug,
				'product_image' => $product_image
			);
			$this->db->where('id', $id);
			$this->db->update('products', $data);
			return true;
		}
	}
