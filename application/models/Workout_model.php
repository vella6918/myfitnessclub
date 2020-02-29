<?php 

class Workout_model extends CI_Model{
    
    //Get all workouts
    Public function get_workouts($workout_id = False){
        
        //Get all workouts
        if($workout_id === FALSE){
            $this->db->join('users','users.user_id = workouts.created_by');
            $query = $this->db->get('workouts');
            return $query->result_array();
        }
        
        //Get a specific exercise
        $this->db->join('users','users.user_id = workouts.created_by');
        $query = $this->db->get_where('workouts', array('workouts.workout_id' => $workout_id));
        return $query->row_array();
        
    }//end of get_workouts method
    
    
    //get all exercises for a workout
    public function get_exercises_workout($workout_id){
        $this->db->join('workouts',' workouts.workout_id = workout_exercise.workout_id');
        $this->db->join('exercises',' exercises.exercise_id = workout_exercise.exercise_id');
        $query = $this->db->get_where('workout_exercise', array('workout_exercise.workout_id' => $workout_id));
        return $query->result_array();
    }//end of get_exercises_workout method
    
    
    //get all users for a workout
    public function get_users_workout($workout_id){
        $this->db->join('workouts','workouts.workout_id = workout_user.workout_id');
        $this->db->join('users','users.user_id = workout_user.shared_with');
        $query = $this->db->get_where('workout_user', array('workout_user.workout_id' => $workout_id));
        return $query->result_array();
    }//end of get_users_workout method
    
    
    //get current user's workouts
    public function get_my_workouts($user_id){
        $query = $this->db->get_where('workouts', array('created_by' => $user_id));
        return  $query->result_array();
    }
    
    
    //get public workouts
    public function get_public_workouts($user_id = FALSE){

        $this->db->select('*');
        $this->db->from('workouts');
        $this->db->join('users','users.user_id = workouts.created_by');
        $this->db->where('created_by !=', $user_id);
        $this->db->where('public', TRUE);
        $query = $this->db->get();
        return  $query->result_array();
  
    }//end of get_public_workouts method
    
    
    //Create new workout
    public function new_workout(){
        //Exercise data array
        $data= array(
            'workout' => $this->input->post('workout'),
            'created_by' => $this->session->userdata('user_id')
        );
        
        //Insert workout into database
        $this->db->insert('workouts', $data);
        
        return $this->db->insert_id();
    }//end of new_exercise method
    
    public function insert_exercise_into_workout($workout_id, $exercise_id, $sets, $reps){
        //Exercise data array
        $data= array(
            'workout_id' => $workout_id,
            'exercise_id' => $exercise_id,
            'sets' => $sets,
            'reps' => $reps
       );
        
       //insert exercise data into table workout_exercise
       return $this->db->insert('workout_exercise', $data);
    }//end of 
       
}//end of class insert_exercise_into_workout 

?>