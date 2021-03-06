<?php 

class Exercise_model extends CI_Model{
    
    //Get all exercises
    Public function get_exercises($exercise_id = False){
        
        //Get all exercises
        if($exercise_id === FALSE){
            $query = $this->db->get('exercises');
            return $query->result_array();
        }
        
        //Get a specific exercise
        $query = $this->db->get_where('exercises', array('exercise_id' => $exercise_id));
        return $query->row_array();
        
    }//end of get_exercises method
    
    
    //Get all muscle groups
    Public function get_muscle_groups($muscle_id = False){
        
        //Get all muscle_groups
        if($muscle_id === FALSE){
            $query = $this->db->get('muscle_group');
            return $query->result_array();
        }
        
        //Get a specific muscle_group
        $query = $this->db->get_where('muscle_group', array('muscle_id' => $muscle_id));
        return $query->row_array();
        
    }//end of get_muscle_groups method
    
    
    //Delete a exercise
    public function delete_exercise($exercise_id){
        $this->db->where('exercise_id', $exercise_id);
        $this->db->delete('exercises');
        
        return true;
    }//end of delete_exercise method
    
    
    //Create new exercise
    public function new_exercise(){
        //Exercise data array
        $data= array(
            'exercise' => $this->db->escape_str($this->input->post('exercise')),
            'details' => $this->db->escape_str($this->input->post('details')),
            'video' => $this->db->escape_str($this->input->post('video')),
            'group_id' => $this->db->escape_str($this->input->post('muscle_id'))
        );
        
        //Insert user into database
        return $this->db->insert('exercises', $data);
    }//end of new_exercise method
    
    
    //update membership method
    public function update_exercise($exercise_id){
        
        //Exercise data array
        $data= array(
            'exercise' => $this->db->escape_str($this->input->post('exercise')),
            'details' => $this->db->escape_str($this->input->post('details')),
            'video' => $this->db->escape_str($this->input->post('video')),
            'group_id' => $this->db->escape_str($this->input->post('muscle_id'))
        );
        
        //get membership
        $this->db->where('exercise_id', $exercise_id);
        //Update membership into database
        $this->db->update('exercises', $data);
        
        return true;
    }//end of update_exercise method
    
}//end of class

?>