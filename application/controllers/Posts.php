<?php

	class Posts extends CI_Controller{
		
		//GET ALL POSTS

		public function index(){
			$data['title'] = 'LISTES DES JOUEURS';

			$data['experiencePro'] = $this->post_model->get_posts();
			//print_r($data['posts']);

			$this->load->view('templates/header');
			$this->load->view('posts/index', $data);
			$this->load->view('templates/footer');
		}

		//GET ONE POSTS

		public function view($slug = NULL){
			$data['post'] = $this->post_model->get_posts($slug);
			$post_id = $data['post']['id'];
			$data['comments'] = $this->comment_model->get_comments($post_id);
			
			if (empty($data['post'])) {
					show_404();
			}

			$data['nom'] = $data['post']['nom'];

			$this->load->view('templates/header');
			$this->load->view('posts/view', $data);
			$this->load->view('templates/footer');
		}

		// CREATE POSTS

		public function create(){
			//Check login
			if (!$this->session->userdata('logged_in')) {
				redirect('users/login');
			}

			$data['title'] = 'AJOUTER DES JOUEURS';

			$data['categories'] = $this->post_model->get_categories();

			$data['nationalite'] = $this->post_model->get_pays();

			$this->form_validation->set_rules('nom', 'Nom', 'required');
			$this->form_validation->set_rules('prenom', 'Prenom', 'required');
			$this->form_validation->set_rules('apropos', 'A propos', 'required');

			if ($this->form_validation->run() === FALSE) {
			
				$this->load->view('templates/header');
				$this->load->view('posts/create', $data);
				$this->load->view('templates/footer');
			}
			else{
				//Import image
				$config['upload_path'] = './assets/images/posts';
				$config['allowed_types'] = 'gif|jpg|png';
				// $config['max_size'] = '2048';
				// $config['max_width'] = '500';
				// $config['max_height'] = '500';

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload()) {
					$errors = array('error' => $this->upload->display_errors());
					$post_image = 'noimage.jpg'; 
				}
				else{
					$data = array('upload_data' => $this->upload->data());
					$post_image = $_FILES['userfile']['name'];
				}

				$this->post_model->create_posts($post_image);
				$this->session->set_flashdata('Ajout réussi', 'votre joueur est maintenant ajouter');

				redirect('posts');
			}				
		}

		//DELETE POSTS

		public function delete($id){
			//Check login
			if (!$this->session->userdata('logged_in')) {
				redirect('users/login');
			}

			//echo $id;
			 $this->post_model->delete_post($id);
			 $this->session->set_flashdata('Suppression réussi', 'Suppression réussi');

			 redirect('posts');
		}

		//EDIT POSTS

		public function edit($slug){
			//Check login
			if (!$this->session->userdata('logged_in')) {
				redirect('users/login');
			}

			$data['post'] = $this->post_model->get_posts($slug);

			if ($this->session->userdata('user_id') != $this->post_model->get_posts($slug)['user_id']){
				redirect('posts');
			}

			$data['categories'] = $this->post_model->get_categories();

			$data['nationalite'] = $this->post_model->get_pays();
			
			if (empty($data['post'])) {
					show_404();
			}

			$data['title'] = 'MODIFIER LES JOUEURS';

			$this->load->view('templates/header');
			$this->load->view('posts/edit', $data);
			$this->load->view('templates/footer');
		}

		//UPDATE POSTS

		public function update(){
			//Check login
			if (!$this->session->userdata('logged_in')) {
				redirect('users/login');
			}

			$this->post_model->update_posts();
			$this->session->set_flashdata('Modification réussi', 'Modification réussi');

			redirect('posts');
		}
	}