<?php 

class Log_model extends CI_Model{
    
    //Create new log
    public function new_log($user_id, $log){
        //Exercise data array
        $data= array(
            'user_id' => $user_id,
            'log' => $log
        );
        
        //Insert user into database
        return $this->db->insert('logs', $data);
    }
    
    
    //Get all logs
    Public function get_logs(){
        
        $this->db->join('users','users.user_id = logs.user_id');
        $query = $this->db->get('logs');
        return $query->result_array();
    }
    
    //Get all logs
    Public function search(){
        
        $search = $this->db->escape_str( $this->input->post('search'));
        
        $this->db->join('users','users.user_id = logs.user_id');
        $this->db->like('users.username', $search, 'both');
        $query= $this->db->get_where('logs', array('users.username' => $search));
        return $query->result_array();
        
        //$query = $this->db->get_where('users', array('user_id' => $user_id));
    }

}