<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Users extends CI_Controller {
        
        public function index(){
            $data['title'] = 'All Users';
            $data['users'] = $this->user_model->get_users();
            
            $this->load->view('templates/header');
            $this->load->view('users/index', $data);
            $this->load->view('templates/footer');
        }
        
        
        //member register method
        public function register() {
            $data['title'] = 'Sign Up';
            
            //setting errors
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('surname', 'Surname', 'required');
            $this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
            $this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
            $this->form_validation->set_rules('password', 'Password', 'required|callback_valid_password');
            $this->form_validation->set_rules('password2', 'Confirm Password', 'required', 'matches[password]');
            
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
                        
                        //check admin rights
                        $administrator = $this->user_model->check_admin_rights($user_id);
                                         
                        //Saving the data returned from user model to $user_data variable
                        $user_data = array(
                            'user_id' => $user_id,
                            'username' => $username,
                            'administrator' => $administrator,
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
                $this->session->unset_userdata('administrator');
                $this->session->unset_userdata('user_id');
                
                
                //set message
                $this->session->set_flashdata('user_loggedout', 'Your are now logged out.');
                
                //redirect user to home page after registration is successful
                redirect('users/login');
                
            }//end of logout method
            

            
            //Check if username exists
            public function check_username_exists($username){
                //set error message
                $this->form_validation->set_message('check_username_exists', 'That username is taken. Please choose a different one.');
                
                //Database check in user model
                if($this->user_model->check_username_exists($username)){
                    return true;
                }else{
                    return false;
                }
            }
            
            
            
            // Check if email exists
            public function check_email_exists($email){
                $this->form_validation->set_message('check_email_exists', 'That email is taken. Please choose a different one.');
                if($this->user_model->check_email_exists($email)){
                    return true;
                } else {
                    return false;
                }
            }
            
            
            
            //Natanfelles (2016). CodeIgniter Strong Password Validation. Available at:https://forum.codeigniter.com/thread-66889.html (Accessed 24th January 2020)
            public function valid_password($password = '')
            {
                $password = trim($password);
                $regex_lowercase = '/[a-z]/';
                $regex_uppercase = '/[A-Z]/';
                $regex_number = '/[0-9]/';
                $regex_special = '/[!@#$%^&*()\-_=+{};:,<.>§~]/';

                if (preg_match_all($regex_lowercase, $password) < 1)
                {
                    $this->form_validation->set_message('valid_password', 'The {field} field must be at least one lowercase letter.');
                    return FALSE;
                }
                if (preg_match_all($regex_uppercase, $password) < 1)
                {
                    $this->form_validation->set_message('valid_password', 'The {field} field must be at least one uppercase letter.');
                    return FALSE;
                }
                if (preg_match_all($regex_number, $password) < 1)
                {
                    $this->form_validation->set_message('valid_password', 'The {field} field must have at least one number.');
                    return FALSE;
                }
                if (preg_match_all($regex_special, $password) < 1)
                {
                    $this->form_validation->set_message('valid_password', 'The {field} field must have at least one special character.' . ' ' . htmlentities('!@#$%^&*()\-_=+{};:,<.>§~'));
                    return FALSE;
                }
                if (strlen($password) < 5)
                {
                    $this->form_validation->set_message('valid_password', 'The {field} field must be at least 5 characters in length.');
                    return FALSE;
                }
                if (strlen($password) > 32)
                {
                    $this->form_validation->set_message('valid_password', 'The {field} field cannot exceed 32 characters in length.');
                    return FALSE;
                }
                return TRUE;
            }
            

    }//end of class