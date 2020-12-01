<?php 
	class Comment_model extends CI_Model{
		public function __construct(){
			$this->load->database(); //CONNEXION AU BD
		}

		public function create_comment($joueur_id){
			$data = array(
				'joueur_id' => $joueur_id,
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'body' => $this->input->post('body')
			);

			return $this->db->insert('comments', $data);
		}

		public function get_comments($post_id){
			$comment = array('joueur_id' => $post_id);

			$query = $this->db->get_where('comments', $comment);

			return $query->result_array();
		}
	}