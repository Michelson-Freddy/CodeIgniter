<?php 
	class Category_model extends CI_Model{
		public function __construct(){
			$this->load->database(); //CONNEXION AU BD
		}

		public function create_category(){

			$data = array(
				'name' => $this->input->post('name')
			);

			return $this->db->insert('categories', $data);
		}

		public function get_categories(){

				$this->db->order_by('name');
				$query = $this->db->get('categories'); // SELECT * FROM categories
				return $query->result_array();
		}

		public function get_category($id){

			$query = $this->db->get_where('categories', array('id' => $id)); //SELECT * FROM joueur WHERE slug = ''
			return $query->row_array();
		}

		public function delete_category($id){
			$this->db->where('id', $id);
			$this->db->delete('categories');

			return true;
		}

		public function update_category(){
			//echo $this->input->post('id');

			$data = array(
				'name' => $this->input->post('name'));

			$this->db->where('id', $this->input->post('id'));

			return $this->db->update('categories', $data);
		}
	}