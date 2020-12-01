<?php 
	class Categories extends CI_Controller{
		public function create(){
			//Check login
			if (!$this->session->userdata('logged_in')) {
				redirect('users/login');
			}
			$data['title'] = 'AJOUTER DES CLUBS';

			$this->form_validation->set_rules('name', 'Name', 'required');

			if ($this->form_validation->run() === FALSE) {
			
				$this->load->view('templates/header');
				$this->load->view('categories/create', $data);
				$this->load->view('templates/footer');
			}else{
				$this->category_model->create_category();
				redirect('categories');
			}
		}

		public function index(){
			$data['title'] = 'LISTES DES CLUBS';

			$data['club'] = $this->category_model->get_categories();
			//print_r($data['posts']);

			$this->load->view('templates/header');
			$this->load->view('categories/index', $data);
			$this->load->view('templates/footer');
		}

		public function posts($id){
			//$data['title'] = $this->category_model->get_category($id)->name;

			$data['experiencePro'] = $this->post_model->get_post_by_category($id);

				$this->load->view('templates/header');
				$this->load->view('posts/index', $data);
				$this->load->view('templates/footer');
		}

		public function delete($id){
			//Check login
			if (!$this->session->userdata('logged_in')) {
				redirect('users/login');
			}
			//echo $id;
			 $this->category_model->delete_category($id);
			 $this->session->set_flashdata('Suppression réussi', 'Suppression réussi');

			 redirect('categories');
		}

		public function edit($id){
			//Check login
			if (!$this->session->userdata('logged_in')) {
				redirect('users/login');
			}

			$data['club'] = $this->category_model->get_category($id);
			
			if (empty($data['club'])) {
					show_404();
			}

			$data['title'] = 'MODIFIER LES CLUBS';

			$this->load->view('templates/header');
			$this->load->view('categories/edit', $data);
			$this->load->view('templates/footer');
		}

		public function update(){
			//Check login
			if (!$this->session->userdata('logged_in')) {
				redirect('users/login');
			}

			$this->category_model->update_category();
			$this->session->set_flashdata('Modification réussi', 'Modification réussi');

			redirect('categories');
		}
	}