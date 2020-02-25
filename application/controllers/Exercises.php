<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Exercises extends CI_Controller{
    
    public function index(){
        
        //check login
        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }
        
        
        $data['title'] = 'All Exercises';
        $data['exercises'] = $this->exercise_model->get_exercises();
        
        $this->load->view('templates/header');
        $this->load->view('exercises/index', $data);
        $this->load->view('templates/footer');
    }//end of index method
    
    
    //view an exercise
    public function view($exercise_id){
        
        //check login
        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }
        
        $data['exercise'] = $this->exercise_model->get_exercises($exercise_id);
        
        if(empty($data['exercise'])){
            show_404();      
        }
        
        $this->load->view('templates/header');
        $this->load->view('exercises/view', $data);
        $this->load->view('templates/footer');
        
    }//end of view method
    
    
    //delete an exercise
    public function delete($exercise_id){
        //check login
        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }
        
        //check if user is administrator
        if($this->session->userdata('role') != 1){
            //if user is not admin error 404 will shpw up
            show_404();
        }
        
        //if user admin go to delete method in the membership model class
        $this->exercise_model->delete_exercise($exercise_id);
        
        
        // Set message
        $this->session->set_flashdata('exercise_deleted', 'The selected exercise was deleted.');
        
        //redirect
        redirect('exercises');
        
    }//end of delete method
    
    
    
    //create new exercise
    public function create() {
        
        
        //check login
        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }
        
        $data['title'] = 'New Exercise';
        
        //setting errors
        $this->form_validation->set_rules('exercise', 'Exercise', 'required');
        
        
        if($this->form_validation->run() === FALSE){
            //displaying the Add new membership page with errors
            $this->load->view('templates/header');
            $this->load->view('exercises/create', $data);
            $this->load->view('templates/footer');
        }else{
            
            //calling the new membership method in the membership model
            $this->exercise_model->new_exercise();
            
            // set message in a session
            $this->session->set_flashdata('exercise_created', 'You have created a new exercise.');
            
            //redirect user to memberships
            redirect('exercises');
        }
    }//end of method create
    
    
    
    //Method to edit exercise
    public function edit($exercise_id){
        
        //check login
        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }
        
        //check if user is administrator
        if($this->session->userdata('role') != 1){
            //if user is not admin error 404 will shpw up
            show_404();
        }
        
        //Get Membership
        $data['exercise'] = $this->exercise_model->get_exercises($exercise_id);
        
        
        //Show error 404 if memnership does not exist in database
        if(empty($data['exercise'])){
            show_404();
        }
        
        
        //set page title
        $data['title'] = 'Edit Exercise';
        
        //load views
        $this->load->view('templates/header');
        $this->load->view('exercises/edit', $data);
        $this->load->view('templates/footer');
        
        
    }//end of edit method
    
    
    //update exercise method
    public function update($exercise_id){
        //check login
        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }
        
        //check if user is administrator
        if($this->session->userdata('role') != 1){
            //if user is not admin error 404 will shpw up
            show_404();
        }
        
        
        //load update_membership method from membership_model
        $update = $this->exercise_model->update_exercise($exercise_id);
        
        if($update){
            // Set message
            $this->session->set_flashdata('exercise_updated', 'The selected exercise has been updated');
            
            //redirect user
            redirect('exercises/view/'.$exercise_id);
        }else{
            // Set message
            $this->session->set_flashdata('exercise_failed_to_update', 'The selected exercise has failed to update');
            
            //redirect user
            redirect('exercises/view/'.$exercise_id);
        }
    }//end of update method
    
}//end of class

?>