<?php 

class Checkin_model extends CI_Model{
    
    
    //insert checkin into database
    public function checkin ($user_id){
        
        $data= array(
            'user_id' => $this->db->escape_str($user_id)
        );
        
        
        //Insert user into database
        return $this->db->insert('checkins', $data);
        
    }//end of checkin method
    
    
    
    //get all checkins
    public function get_checkins(){
        $this->db->order_by('checkin_id', 'DESC');
        $this->db->join('users','users.user_id = checkins.user_id');
        $query = $this->db->get('checkins');
        return $query->result_array();
    }
    
    
}