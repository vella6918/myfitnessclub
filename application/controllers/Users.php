<?php 

    class Users extends CI_Controller {
        
        //member register method
        public function register() {
            $data['title'] = 'Sign Up';
            
            //setting errors
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('surname', 'Surname', 'required');
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('password2', 'Confirm Password', 'required', 'matches[password');
            
            if($this->form_validation->run() === FALSE){
                //displaying the register page with errors
                $this->load->view('templates/header');
                $this->load->view('users/register', $data);
                $this->load->view('templates/footer');
            }else{
                //encript password
                $enc_password = md5($this->input->post('password'));
                
                //calling the registration method in the user model and passing the encrypted password
                $this->user_model->register($enc_password);
                
                // set message in a session
                $this->session->set_flashdata('user_registered', 'You are now registered and can Login.');
                
                //redirect user to home page after registration is successful
                redirect('users/login');
            }
        }//end of method register
            
            
            //Login User method
            public function login() {
                $data['title'] = 'Sign In';
                
                //setting errors
                $this->form_validation->set_rules('username', 'Username', 'required');
                $this->form_validation->set_rules('password', 'Password', 'required');
                
                if($this->form_validation->run() === FALSE){
                    //displaying the register page with errors
                    $this->load->view('templates/header');
                    $this->load->view('users/login', $data);
                    $this->load->view('templates/footer');
                }else{
                    
                    //Get username
                    $username = $this->input->post('username');
                    
                    //Get and ecrypt the password
                    $password = md5($this->input->post('password'));
                    
                    //Login user
                    $user_id = $this->user_model->login($username, $password);
                    
                    //check for user id
                    if($user_id){
                        
                        //Saving the data returned from user model to $user_data variable
                        $user_data = array(
                            'user_id' => $user_id,
                            'username' => $username,
                            'logged_in' => TRUE
                        );
                        
                        //Set user data into a session
                        $this->session->set_userdata($user_data);
                        
                        // set message in a session
                        $this->session->set_flashdata('user_loggedin', 'You are now logged in.');
                        
                        //redirect user to home page after registration is successful
                        redirect('home');
                        
                    }else {
                        //set error message
                        $this->session->set_flashdata('login_failed', 'Login is invalid.');
                        
                        //redirect user to home page after registration is successful
                        redirect('users/login');
                    }
                }
            }//end of method login
            
            
            // User logout
            public function logout() {
                //unset user data session
                $this->session->unset_userdata('logged_in');
                $this->session->unset_userdata('username');
                $this->session->unset_userdata('user_id');
                
                
                //set message
                $this->session->set_flashdata('user_loggedout', 'Your are now logged out.');
                
                //redirect user to home page after registration is successful
                redirect('users/login');
                
            }//end of logout method
            
            
            //Check Login
            public function check_login(){
                if(!$this->session->userdata('logged_in')){
                    //set message
                    $this->session->set_flashdata('user_notloggedin', 'You need to Login first.');
                    
                    redirect('user/login');
                }
            }//End of check login method

    }//end of class