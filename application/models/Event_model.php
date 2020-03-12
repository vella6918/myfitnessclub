<?php 

class Event_model extends CI_Model{

    //Get all fitness classes
    Public function get_events($event_id = False){
        
        //Get all fitness classes
        if($event_id === FALSE){
            $this->db->join('users','users.user_id = events.trainer');
            $query = $this->db->get('events');
            return $query->result_array();
        }
        
       
        $this->db->join('users','users.user_id = events.trainer');
        $query = $this->db->get_where('events', array('events.id' => $event_id));
        return $query->row_array();
        
    }//end of get_events method
    
    
    //get joiners
    public function get_joiners($event_id){
        
        $this->db->join('users','users.user_id = event_trainees.trainee_id');
        $this->db->join('events','events.id = event_trainees.event_id');
        $query = $this->db->get_where('event_trainees', array('event_id' => $event_id));
        return $query->result_array();
    }//end of get_joiners method
    
    
    
    //update event details
    public function update($event_id){
        
        //event data array
        $data= array(
            'title' => $this->db->escape_str($this->input->post('title')),
            'start_event' => $this->input->post('start'),
            'end_event' => $this->input->post('end'),
            'trainer' => $this->input->post('trainer')
        );
        
        //get user
        $this->db->where('id', $event_id);
        //Update user details
        $this->db->update('events', $data);
        
        return true;
    }//end of update_event method
    
    
    //Create new event
    public function new_event(){
        //event data array
        $data= array(
            'title' => $this->db->escape_str($this->input->post('title')),
            'start_event' => $this->input->post('start'),
            'end_event' => $this->input->post('end'),
            'trainer' => $this->input->post('trainer')
        );
        
        //Insert user into database
        $this->db->insert('events', $data);
        
    }//end of new_event method
    
    
    //Delete a event
    public function delete_event($event_id){
        $this->db->where('id', $event_id);
        $this->db->delete('events');
        
        return true;
    }//end of delete_event method
    
}//end of class class_name 

?>