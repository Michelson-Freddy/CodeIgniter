<?php 
	class Nationalite_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

		public function index(){
			$this->db->order_by('pays');
			$query = $this->db->get('nationalite');

			return $query->result_array();
		}

		public function create(){
			$post = array('pays' => $this->input->post('pays'));

			return $this->db->insert('nationalite', $post);
		}

		public function edit($id){
			$data = array('id' => $id);
			$query = $this->db->get_where('nationalite', $data);

			return $query->row_array();
		}

		public function update(){
			$data = array('pays' => $this->input->post('pays'));
			$id = $this->input->post('id');
			$this->db->where('id', $id);

			return $this->db->update('nationalite', $data);
		}

		public function delete($id){
			$this->db->where('id', $id);
			$this->db->delete('nationalite');
		}
	}