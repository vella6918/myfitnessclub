<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Workouts extends CI_Controller{
    
    public function index(){
        
        //check login
        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }
        
        
        $data['title'] = 'All Workouts';
        $data['workouts'] = $this->workout_model->get_workouts();
        
        $this->load->view('templates/header');
        $this->load->view('workouts/index', $data);
        $this->load->view('templates/footer');
    }//end of index method
    
    /*
    //get workouts of a specific user
    public function my_workouts($user_id){
        
        //check login
        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }
        
        $data['title'] = 'My Workouts';
        $data['workouts'] = $this->workout_model->get_my_workouts($user_id);
        
        $this->load->view('templates/header');
        $this->load->view('workouts/index', $data);
        $this->load->view('templates/footer');
    }//end of index method
    */
    
    //view a workout
    public function view($workout_id){
        
        //check login
        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }
        
        //get workout
        $data['workout'] = $this->workout_model->get_workouts($workout_id);
        //get all exercises for the workout
        $data['exercises'] = $this->workout_model->get_exercises_workout($workout_id);
        //get all users that can see this workout
        //get all user roles
        $data['users'] = $this->workout_model->get_users_workout($workout_id);
        
        if(empty($data['workout'])){
            show_404();
        }
        
        
        $this->load->view('templates/header');
        $this->load->view('workouts/view', $data);
        $this->load->view('templates/footer');
        
    }//end of view method
    
    

    
    
   
    
}//end of class

?>