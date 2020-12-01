<?php 
	class Nationalite extends CI_Controller{
		public function index(){
			$data['title'] = "NATIONALITE";
			$data['origine'] = $this->nationalite_model->index();

			$this->load->view('templates/header');
			$this->load->view('nationalite/index', $data);
			$this->load->view('templates/footer');
		}

		public function create(){
			$data['title'] = 'Ajouter un pays';

			$this->form_validation->set_rules('pays', 'pays', 'required');
			if ($this->form_validation->run() === FALSE) {
				
				$this->load->view('templates/header');
				$this->load->view('nationalite/create', $data);
				$this->load->view('templates/footer');
			} else{

				$this->nationalite_model->create();

				redirect('nationalite/index');
			}
		}

		public function edit($id){
			if (!$this->session->userdata('logged_in')) {
				redirect('users/login');
			}

			$data['country'] = $this->nationalite_model->edit($id);

			if (empty($data['country'])) {
					show_404();
			}

			$data['title'] = 'Modifier un pays';

			$this->load->view('templates/header');
			$this->load->view('nationalite/edit', $data);
			$this->load->view('templates/footer');
		}

		public function update(){
			$this->form_validation->set_rules('pays', 'pays', 'required');

			if ($this->form_validation->run() === FALSE) {
				
				$this->load->view('templates/header');
				$this->load->view('nationalite/edit');
				$this->load->view('templates/footer');
			} else{

				$this->nationalite_model->update();

				redirect('nationalite');
			}
		}

		public function delete($id){
			if (!$this->session->userdata('logged_in')) {
				redirect('users/login');
			}

			$this->nationalite_model->delete($id);

			redirect('nationalite');
		}

		public function posts($id){
			//$data['title'] = $this->category_model->get_category($id)->name;

			$data['experiencePro'] = $this->post_model->get_post_by_nationality($id);

				$this->load->view('templates/header');
				$this->load->view('posts/index', $data);
				$this->load->view('templates/footer');
		}
	}