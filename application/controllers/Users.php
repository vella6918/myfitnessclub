<?php 

    class Users extends CI_Controller {
        
        //register function
        public function register() {
            $data['title'] = 'Sign Up';
            
            //setting errors
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('surname', 'Surname', 'required');
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
                redirect('home');
            }
            
            
            
        }
    
    }