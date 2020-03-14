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
            
            //if message not found show error 404
            if(empty($data['message'])){
                show_404();
            }
            
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
            
            //get message
            $data['message'] = $this->message_model->get_message($message_id);
            
            //get sender
            $data['sender'] = $this->user_model->get_users($sender);
            
            //get receiver
            $data['receiver'] = $this->user_model->get_users($data['message']['sender']);
            
            //input message in database
            $this->message_model->reply($message_id, $sender);
            
            $recipient = $data['receiver']['email'];
            $sender_name = $data['sender']['name'];
            $sender_surname = $data['sender']['surname'];
            $reply = $this->input->post('reply');
            
            //send email to recepient
            $this->email($recipient, $sender_name, $sender_surname, $message_id, $reply);
            
            redirect('messages/view/'.$message_id);
        }
        
        
        public function create(){
            
            //check login
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }
            
            //set title
            $data['title'] = 'New Message';
            
            if($this->session->userdata('role')==3){
                //if user is trainee display only trainers in the sent to select
                //get trainers
                $data['receivers'] = $this->user_model->get_trainers();
            }else{
                //if user in trainer or admin display all users in the sent to select
                $data['receivers'] = $this->user_model->get_users();
            }
            
            
            //get sender data
            $data['sender'] = $this->user_model->get_users($this->session->userdata('user_id'));
            
            //setting errors
            $this->form_validation->set_rules('receiver', 'Receiver', 'required');
            $this->form_validation->set_rules('subject', 'Subject', 'required');
            $this->form_validation->set_rules('message', 'Message', 'required');
            
            
            if($this->form_validation->run() === FALSE){
                //display errors
                $this->load->view('templates/header');
                $this->load->view('messages/create', $data);
                $this->load->view('templates/footer');
            }else{
              //create message in database
              $message_id = $this->message_model->create($data['sender']['user_id']);
              
              //get receiver details
              $data['receiver'] = $this->user_model->get_users($this->input->post('receiver'));
              
              $recipient = $data['receiver']['email'];
              $sender_name = $data['sender']['name'];
              $sender_surname = $data['sender']['surname'];
              $message = $this->input->post('message');
              
              //send email to recepient
              $this->email($recipient, $sender_name, $sender_surname, $message_id, $message);
              
              
              // set message in a session
              $this->session->set_flashdata('message_sent', 'Message sent.');
              
              //redirect
              redirect('messages/view/'.$message_id);
            }//end of create method
  
        }
        
        
        private function email($recipient, $sender_name, $sender_surname, $message_id, $message){
            
            $config = array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.gmail.com',
                'smtp_user' => 'thefitnetics@gmail.com',
                'smtp_pass' => 'ZebbugMaya2011?',
                'smtp_port' => 465,
                'mailtype' => 'html',
                'charset' => 'iso-8859-1'
            );
            
            $this->email->initialize($config);
            $this->email->set_mailtype("html");
            $this->email->set_newline("\r\n");
            
            $this->email->to($recipient);
            $this->email->from('donotreply@thefitnessclub.com','The Fitness Club');
            $this->email->subject('The Fitness Club');

            $this->email->message('<p>You have received a new message from '.$sender_name.' '.$sender_surname.'. Please access the web app to reply to message #'.$message_id.'.</p><p><b><u>Message:</u></b></p><p>'.$message.'</p>');

            //send email
            $this->email->send();
        }
        
    }//end of class