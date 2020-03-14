<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Events extends CI_Controller {
    
    
    
    //default view method for fitness classes
    public function index(){
        //check login
        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }
        
        $data['title'] = 'Fitness Classes';
        $data['events'] = $this->event_model->get_events();
        
        $this->load->view('templates/header');
        $this->load->view('events/index', $data);
        $this->load->view('templates/footer');
    }//end of index method
    
    
    //view a specific event
    public function view ($event_id){
        
        //check login
        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }
        
        //get user data
        $data['event'] = $this->event_model->get_events($event_id);
        
        //set user id
        $user_id = $this->session->userdata('user_id');
        
        //check if user if joined to the event
        $data['join'] = $this->event_model->check_join($event_id, $user_id);
        
        //get joiners
        $data['joiners'] = $this->event_model->get_joiners($event_id);
        
        if(empty($data['event'])){
            show_404();
        }
                
        $this->load->view('templates/header');
        $this->load->view('events/view', $data);
        $this->load->view('templates/footer');
        
    }
    
    
    
    //edit event details
    public function edit($event_id){
        //check login
        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }
        
        //check if user is administrator or user id in session is the same as the current user id
        if($this->session->userdata('role') == 3){      
            //if user is not admin error 404 will shpw up
            show_404();
        }
        
        //get event
        $data['event'] = $this->event_model->get_events($event_id);
        
        //get trainers
        $data['trainers'] = $this->user_model->get_trainers();
        
        //if user details are not found show 404
        if(empty($data['event'])){
            show_404();
        }
        
        //set title
        $data['title'] = 'Edit Event';
        
        //load pages from views
        $this->load->view('templates/header');
        $this->load->view('events/edit', $data);
        $this->load->view('templates/footer');
        
        
    }//end of edit method
    
    
    //update event details
    public function update($event_id){
        //check login
        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }
        
        $this->event_model->update($event_id);
        
        // Set message
        $this->session->set_flashdata('event_update', 'Event details updated successfully.');
        
        redirect('events/view/'.$event_id);
    }
    
    
    
    //create new event
    public function create() {
        
        
        //check login
        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }
        
        //check if user is administrator
        if($this->session->userdata('role') == 3){
            //if user is trainee error 404 will shpw up
            show_404();
        }
        
        
        //set title
        $data['title'] = 'New Event';
        
        //get trainers
        $data['trainers'] = $this->user_model->get_trainers();
        
        //setting errors
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('start', 'Start', 'required');
        $this->form_validation->set_rules('end', 'End', 'required');
        $this->form_validation->set_rules('trainer', 'Trainer', 'required');
        
        
        if($this->form_validation->run() === FALSE){
            //displaying the Add new event page with errors
            $this->load->view('templates/header');
            $this->load->view('events/create', $data);
            $this->load->view('templates/footer');
        }else{
            
            //calling the new membership method in the membership model
            $this->event_model->new_event();
            
            // set message in a session
            $this->session->set_flashdata('event_created', 'You have created a new event');
            
            //redirect user to memberships
            redirect('events/index');
        }
    }//end of method create
    
    
    //Method to delete event
    public function delete($event_id){
        //check login
        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }
        
        //check if user is administrator
        if($this->session->userdata('role') == 3){
            //if user istrainee error 404 will shpw up
            show_404();
        }
        
        //if user admin go to delete method in the membership model class
        $this->event_model->delete_event($event_id);
        
        
        // Set message
        $this->session->set_flashdata('event_deleted', 'Your event has been deleted');
        
        //redirect
        redirect('events/index');
        
    }//end of delete method
    
    
    
    public function join($event_id){
        //check login
        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }
        
        //set trainee id
        $trainee_id = $this->session->userdata('user_id');
        
        //join event
        $this->event_model->events_trainees($event_id, $trainee_id);
        
        // Set message
        $this->session->set_flashdata('joined', 'You have joined successfully event');
        
        //redirect
        redirect('events/view/'.$event_id);
    }
        
   
}//end of class
    
?>