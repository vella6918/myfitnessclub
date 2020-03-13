<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Messages extends CI_Controller {
        
        
        public function inbox(){
            //check login
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }
                       
            //set title
            $data['title'] = 'Inbox';
            //set user id
            $user_id= $this->session->userdata('user_id');
            //get user
            $data['messages'] = $this->message_model->get_messages($user_id);
                        
            $this->load->view('templates/header');
            $this->load->view('messages/index', $data);
            $this->load->view('templates/footer');
        }
        
        
        public function sent(){
            //check login
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }
            
            //set title
            $data['title'] = 'Sent';
            //set user id
            $user_id= $this->session->userdata('user_id');
            
            //get user
            $data['messages'] = $this->message_model->get_sent_messages($user_id);
            
            $this->load->view('templates/header');
            $this->load->view('messages/index', $data);
            $this->load->view('templates/footer');
        }
        
        
        public function view($message_id){
            //check login
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }
            
            //get message
            $data['message'] = $this->message_model->get_message($message_id);
            
            //set title
            $data['title'] = $data['message']['subject'];
            
            //get sender
            $data['sender'] = $this->user_model->get_users($data['message']['sender']);
            
            //get replies
            $data['replies'] = $this->message_model->get_replies($data['message']['message_id']);
            
            $this->load->view('templates/header');
            $this->load->view('messages/view', $data);
            $this->load->view('templates/footer');
        }
        
        public function reply($message_id, $sender){
            //check login
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }
            
            $this->message_model->reply($message_id, $sender);
            
            redirect('messages/view/'.$message_id);
        }
        
    }//end of class