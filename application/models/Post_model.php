<?php
	class Post_model extends CI_Model{

		public function __construct(){
			$this->load->database(); //CONNEXION AU BD
		}

		//GET ALL POSTS

		public function get_posts($slug = FALSE){
			if ($slug === FALSE) {
				$this->db->order_by('joueur.id', 'DESC');
				$this->db->join('categories', 'categories.id = joueur.category_id');
				$this->db->join('nationalite', 'nationalite.id = joueur.nationalite_id');
				$query = $this->db->get('joueur'); // SELECT * FROM joueur
				return $query->result_array();
			}

			//GET ONE POSTS
			$this->db->join('categories', 'categories.id = joueur.category_id');
			$this->db->join('nationalite', 'nationalite.id = joueur.nationalite_id');
			$query = $this->db->get_where('joueur', array('slug' => $slug)); //SELECT * FROM joueur WHERE slug = ''
			return $query->row_array();
		}

		//CREATE POSTS

		public function create_posts($post_image){

			$slug = url_title($this->input->post('nom'));

			$data = array(
				'nom' => $this->input->post('nom'),
				'prenom' => $this->input->post('prenom'),
				'slug' => $slug,
				'apropos' => $this->input->post('apropos'),
				'category_id' => $this->input->post('category_id'),
				'nationalite_id' => $this->input->post('nationalite_id'),
				'user_id' => $this->session->userdata('user_id'),
				'post_image'=> $post_image
			);

			return $this->db->insert('joueur', $data);
		}

		//DELETE POST

		public function delete_post($id){
			$this->db->where('id', $id);
			$this->db->delete('joueur');

			return true;
		}

		//UPDATE POSTS

		public function update_posts(){
			//echo $this->input->post('id');
			$slug = url_title($this->input->post('nom'));

			$data = array(
				'nom' => $this->input->post('nom'),
				'prenom' => $this->input->post('prenom'),
				'slug' => $slug,
				'apropos' => $this->input->post('apropos'),
				'category_id' => $this->input->post('category_id'),
				'nationalite_id' => $this->input->post('nationalite_id')
			);

			$this->db->where('id', $this->input->post('id'));

			return $this->db->update('joueur', $data);
		}

		//GET ALL CATEGORIES

		public function get_categories(){
			$this->db->order_by('name');
			$query = $this->db->get('categories');

			return $query->result_array();
		}

		//GET ALL PAYS

		public function get_pays(){
			$this->db->order_by('pays');
			$query = $this->db->get('nationalite');

			return $query->result_array();
		}

		public function get_post_by_category($category_id){
			$this->db->order_by('joueur.id', 'DESC');
			$this->db->join('categories', 'categories.id = joueur.category_id');
			$this->db->join('nationalite', 'nationalite.id = joueur.nationalite_id');
			$query = $this->db->get_where('joueur', array('category_id' => $category_id));// SELECT * FROM joueur where category_id=?
	
			return $query->result_array();
		}

		public function get_post_by_nationality($nationalite_id){
			$this->db->join('nationalite', 'nationalite.id = joueur.nationalite_id');
			$this->db->join('categories', 'categories.id = joueur.category_id');
			$query = $this->db->get_where('joueur', array('nationalite_id' => $nationalite_id));

			return $query->result_array();
		}
	} 
