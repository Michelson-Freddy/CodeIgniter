<?php 
	class Users extends CI_Controller{
		public function register(){
			$data['title'] = 'Creer un compte';

			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
			$this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('password2', 'Confirim password', 'matches[password]');

			if ($this->form_validation->run() === FALSE) {
			
				$this->load->view('templates/header');
				$this->load->view('users/register', $data);
				$this->load->view('templates/footer');
			} else{
				//die('Continue');
				//encrypt password
				$enc_password = md5($this->input->post('password'));
				$this->user_model->register($enc_password);

				//set message
				$this->session->set_flashdata('user_register', 'Utilisateur enregistré');

				redirect('posts');
			}
		}

		public function check_username_exists($username){
			$this->form_validation->set_message('check_username_exists', 'Cette utilisateur est déjà enregistré. Utiliser un autre nom d\'utilisateur.');
			if ($this->user_model->check_username_exists($username)) {

				return true;
			} else{

				return false;
			}
		}

		public function check_email_exists($email){
			$this->form_validation->set_message('check_email_exists', 'Cette email est déjà enregistré. Utiliser un autre email.');
			if ($this->user_model->check_email_exists($email)) {

				return true;
			} else{

				return false;
			}
		}

		public function login(){
			$data['title'] = 'Se connecter';

			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if ($this->form_validation->run() === FALSE) {
			
				$this->load->view('templates/header');
				$this->load->view('users/login', $data);
				$this->load->view('templates/footer');
			} else{

				$username = $this->input->post('username');
				$password = md5($this->input->post('password'));
				$user_id = $this->user_model->login($username, $password);

				if ($user_id) {
					//die('SUCCESS');
					//Create session
					$user_data = array(
						'user_id' => $user_id,
						'username' => $username,
						'logged_in' => true
						);

					$this->session->set_userdata($user_data);

					$this->session->set_flashdata('user_loggedin', 'Bienvenue!');

					redirect('posts');
				} else{

					//set message
				$this->session->set_flashdata('login_failed', 'Nom d\'utilisateur ou/et mot de passe incorrect!');

				redirect('users/login');
				}
			}
		}

		public function logout(){
			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('username');

			$this->session->set_flashdata('user_logout', 'Vous etes déconnecté!');

			redirect('users/login');
		}
	}