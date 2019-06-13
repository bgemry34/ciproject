<?php
    class Users extends CI_Controller{
        public function register(){
            $data['title'] = 'Register';

            $this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_check');
			$this->form_validation->set_rules('username', 'Username', 'required|callback_username_check');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('confirmPassword', 'Confirm Password', 'required|matches[password]');

            if(!$this->form_validation->run()){
            $this->load->view('templates/header');
            $this->load->view('users/register', $data);
            $this->load->view('templates/footer');
            }else{
                $enc_pass = md5($this->input->post('password'));
                $this->user_model->register($enc_pass);
                //set message
				$this->session->set_flashdata('user_registered', 'Your account is now registered you can log in now!');
                redirect('users/login');
            }
        }

        public function login(){
            $data['title'] = 'Log-In';

			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			
            if(!$this->form_validation->run()){
				$this->load->view('templates/header');
				$this->load->view('users/login', $data);
				$this->load->view('templates/footer');
			}else{
				$username = $this->input->post('username');
				$password = md5($this->input->post('password'));
				$user = $this->input->post('username');
				$user_id=$this->user_model->login($username, $password);
				if($user_id){
					$user_data = array(
						'user_id' => $user_id,
						'username' => $username,
						'is_login' => true
					);
					$this->session->set_userdata($user_data);

					$this->session->set_flashdata('user_login', 'Welcome '.$user);
					redirect('products');
				}else{
					$this->session->set_flashdata('login_fail', 'Incorrect Username and Password!');
					redirect('users/login');
				}
				
			}
        }

		//user log out
		public function logout(){
			//unset user data
			$this->session->unset_userdata('is_login');
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('username');

			$this->session->set_flashdata('user_loggedout', 'You are now logged out!');
			redirect('home');
		}

		//callbacks
        public function email_check($email){
            $this->form_validation->set_message('email_check', 'Sorry the email is already taken try another email address');

            return $this->user_model->email_check($email) ? false : true;
        }

        public function username_check($username){
            $this->form_validation->set_message('username_check', 'Sorry the username is already taken try another username');
            return $this->user_model->username_check($username) ? false : true;
        }
    }
