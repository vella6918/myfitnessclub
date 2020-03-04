<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Checkins extends CI_Controller {
    
    
    
    //check user entry in the gym
    public function check(){
        //check login
        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }
        
        //get role
        $role = $this->session->userdata('role');
        
        //check if user is trainer or admin
        if($role == 1 ||  $role == 2){
            //set title
            $data['title'] = 'Check User for entry';
            
            
            //setting errors
            $this->form_validation->set_rules('code', 'Code', 'required');
            
            if($this->form_validation->run() === FALSE){
                //load pages from views
                $this->load->view('templates/header');
                $this->load->view('checkins/check', $data);
                $this->load->view('templates/footer');
            }else{
                //get code
                $code = $this->input->post('code');
                
                //get user id by code
                $user_id = $this->user_model->code($code);
                
                //get details
                $data['details'] = $this->user_model->membership_user($user_id);
                
                //if no data found
                if(empty($data['details'])){
                    // Set message
                    $this->session->set_flashdata('no_membership', 'No Data Found. Check Database.');
                    
                    //redirect
                    redirect('check');
                }
                
                //load pages from views
                $this->load->view('templates/header');
                $this->load->view('checkins/check_results', $data);
                $this->load->view('templates/footer');
            }
        }else{
            //if user is trainee show 404 error
            show_404();
        }
    }//end of check method
    
    
    
    
    
    
    
    //check in user in gym
    public function checkin($user_id){
        //check login
        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }
        
        
        //get role
        $role = $this->session->userdata('role');
        
        //check if user is trainer or admin
        if($role == 1 ||  $role == 2){
            
            $this->checkin_model->checkin($user_id);
            
            // Set message
            $this->session->set_flashdata('check-in', 'User Check-in Sucessfully.');
            
            //redirect
            redirect('check');
            
        }else{
            //if user is trainee show 404
            show_404();
        }
        
    }// end of checkin method
    
    
    
    
    
    
    
    //get all checkins
    public function all_checkins(){
        //check login
        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }
        
        //get role
        $role = $this->session->userdata('role');
        
        //check if user is trainer or admin
        if($role == 1 ||  $role == 2){
            $data['title'] = 'All Checkins';
            $data['checkins'] = $this->checkin_model->get_checkins();
            
            $this->load->view('templates/header');
            $this->load->view('checkins/all_checkins', $data);
            $this->load->view('templates/footer');
            
        }else{
            show_404();
        }
        
        
    }//end of checkins method
    
}