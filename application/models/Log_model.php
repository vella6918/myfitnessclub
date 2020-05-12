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

}