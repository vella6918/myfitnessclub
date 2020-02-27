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
        /*
        $query=$this->db->select('*')->from('workouts')
        ->group_start()
        ->where('public', '1')
        ->where_not_in('created_by', $user_id)
        ->group_end()
        ->get();
        */
        $this->db->select('*');
        $this->db->from('workouts');
        $this->db->join('users','users.user_id = workouts.created_by');
        $this->db->where('created_by !=', $user_id);
        $this->db->where('public', TRUE);
        $query = $this->db->get();
        return  $query->result_array();
        
        
        
    }
       
}//end of class

?>