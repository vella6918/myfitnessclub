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
    
    
    //get current user workouts
    public function my_workouts(){
        //check login
        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }
        
        //set title
        $data['title'] = 'My Workouts';
        //get workouts
        $data['my_workouts'] = $this->workout_model->get_my_workouts($this->session->userdata('user_id'));
        
 
        $this->load->view('templates/header');
        $this->load->view('workouts/my_workouts', $data);
        $this->load->view('templates/footer');
            
    }
    
    
    //get public workouts
    public function public_workouts(){
        //check login
        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }
        
        //set title
        $data['title'] = 'Public Workouts';
        //get workouts
        $data['workouts'] = $this->workout_model->get_public_workouts($this->session->userdata('user_id'));
        
        if(empty($data['workouts'])){
            show_404();
        }
        
        $this->load->view('templates/header');
        $this->load->view('workouts/public', $data);
        $this->load->view('templates/footer');
    }//end of public workouts method
    
    
    //create new workout
    public function create() {
         
        //check login
        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }
        
        $data['title'] = 'New Workout';
        
        //get all exercises
        $data['exercises'] = $this->exercise_model->get_exercises();
        
        //setting errors
        $this->form_validation->set_rules('workout', 'Workout', 'required');
        
        
        if($this->form_validation->run() === FALSE){
            //displaying the Add new membership page with errors
            $this->load->view('templates/header');
            $this->load->view('workouts/create', $data);
            $this->load->view('templates/footer');
        }else{
            
            //calling the new_workout method in the workout model
            $workout_id = $this->workout_model->new_workout();
            
            //get arrays of exercises
            $exercises = $this->input->post('w_name');
            $sets = $this->input->post('sets');
            $reps = $this->input->post('reps');
            
            //count exercises
            $size = count($exercises);
            
            
            if($exercises > 0){
                
               for($i=0; $i<$size; $i++){
                    $current_e = $exercises[$i];
                    $current_s = $sets[$i];
                    $current_r = $reps[$i];
                    
                    //insert exercise details in workout
                    $this->workout_model->insert_exercise_into_workout($workout_id, $current_e, $current_s, $current_r);
               }        
            }
            
            // set message in a session
            $this->session->set_flashdata('workout_created', 'You have created a new workout.');
            
            //redirect user to memberships
            redirect('my_workouts');
        }
    }//end of method create
    
    
    
    //Method to edit workout
    public function edit($workout_id){
        
        //check login
        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }
        
        //Get workout
        $data['workout'] = $this->workout_model->get_workouts($workout_id);
        
        //Show error 404 if memnership does not exist in database
        if(empty($data['workout'])){
            show_404();
        }
        
        //check if user is administrator or owner of workout
        if($this->session->userdata('role') == 1 || $this->session->userdata('user_id') == $data['workout']['created_by']){
            
            //set page title
            $data['title'] = 'Edit Workout';
            
            //get all exercises for the current workout
            $data['selected_exercises'] = $this->workout_model->get_exercises_workout($workout_id);

            //get all exercises
            $data['exercises'] = $this->exercise_model->get_exercises();
            
            //count the number of exercises
            $data['size'] = count($data['selected_exercises']);
            
            //load views
            $this->load->view('templates/header');
            $this->load->view('workouts/edit', $data);
            $this->load->view('templates/footer');
            
        }else{
            show_404();
        }

    }//end of edit workout method

    
    //update workout
    public function update($workout_id){
        //check login
        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }
        
        
        //Get workout
        $data['workout'] = $this->workout_model->get_workouts($workout_id);
        
        //Show error 404 if memnership does not exist in database
        if(empty($data['workout'])){
            show_404();
        }
        
        //check if user is administrator or owner of workout
        if($this->session->userdata('role') == 1 || $this->session->userdata('user_id') == $data['workout']['created_by']){
            //load update workout
            $update_workout = $this->workout_model->update_workout($workout_id);
            
            
            //get arrays of exercises
            $exercises = $this->input->post('w_name');
            $sets = $this->input->post('sets');
            $reps = $this->input->post('reps');
            
            $new_exercises = $this->input->post('new_exercise');
            $new_sets = $this->input->post('new_sets');
            $new_reps = $this->input->post('new_reps');
            $slugs = $this->input->post('slugs');
            
            //count current exercises
            $size_slugs = count($slugs);
            
            //count new exercises
            $size_exercises = count($new_exercises);
            
            //update current exercises
            for($i=0; $i<$size_slugs; $i++){
                //current data
                $current_e = $exercises[$i];
                $current_s = $sets[$i];
                $current_r = $reps[$i];
                $current_slug = $slugs[$i];
                
                //update exercises of the current workout
                $update_exercises = $this->workout_model->update_workout_exercise_table($workout_id, $current_e, $current_s, $current_r, $current_slug);
            }
            
            //insert new exercises
            for($i=0; $i<$size_exercises; $i++){
                
                $current_e = $new_exercises[$i];
                $current_s = $new_sets[$i];
                $current_r = $new_reps[$i];
                
                //insert exercise details in workout
                $this->workout_model->insert_exercise_into_workout($workout_id, $current_e, $current_s, $current_r);
                
            }

            // Set message
            $this->session->set_flashdata('workout_updated', 'Your workout has been updated');
                
            //redirect user
            redirect('workouts/view/'.$workout_id);      
        
        
        }else {
            show_404();
        }
    }//end of update method
    
    
    
    //Method to delete workout
    public function delete($workout_id){
        //check login
        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }
        
        //Get workout
        $data['workout'] = $this->workout_model->get_workouts($workout_id);
        
        //check if user is administrator or owner of workout
        if($this->session->userdata('role') == 1 || $this->session->userdata('user_id') == $data['workout']['created_by']){
            
            //if user admin go to delete method in the membership model class
            $this->workout_model->delete_workout($workout_id);
                       
            // Set message
            $this->session->set_flashdata('workout_deleted', 'Your workout has been deleted');
            
            //redirect
            redirect('workouts');
        
        }
        
    }//end of delete method
    
    
    
    //Method to share a workout
    public function share($workout_id){
        //check login
        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }
        
        //if user is trainee show error 404
        if($this->session->userdata('role') == 3){
            //if user is not admin error 404 will shpw up
            show_404();
        }
        
        //get workout
        $data['workout'] = $this->workout_model->get_workouts($workout_id);
        //ser title
        $data['title'] = 'Share Workout:'.$data['workout']['workout'];
        //get all users
        $data['users'] = $this->user_model->get_users();
        
        
        //load views
        $this->load->view('templates/header');
        $this->load->view('workouts/share', $data);
        $this->load->view('templates/footer');
        
        
        
    }//end of share method
    
    
    //Method to share a workout
    public function share_workout($workout_id){
        //check login
        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }
        
        //if user is trainee show error 404
        if($this->session->userdata('role') == 3){
            //if user is not admin error 404 will shpw up
            show_404();
        }
        
        //set id of the selected user
        $user_id = $this->input->post('user_id');
        
        //check if workout is already shared with the selected user
        $check = $this->workout_model->check_share($workout_id,$user_id);
        
        //if check is true
        if($check){
            //get selected user
            $data['user'] = $this->user_model->get_users($user_id);
            
            // Set message
            $this->session->set_flashdata('workout_already_shared', 'Your workout is already shared with '.$data['user']['username']);
            
            //redirect
            redirect('workouts/view/'.$workout_id);
        }else{
            
            $this->workout_model->workout_user($workout_id, $user_id);
            
            // Set message
            $this->session->set_flashdata('workout_shared', 'Your workout has been shared');
            
            //redirect
            redirect('workouts/view/'.$workout_id);
            
        }
           
    }//end of share_workout method
    
    
    
   
    
}//end of class

?>