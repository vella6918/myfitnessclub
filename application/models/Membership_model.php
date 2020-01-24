<?php 

class Membership_model extends CI_Model{
    
    public function __construct(){
        $this->load->database();
    }
    
    //Get all memberships
    Public function get_memberships($membership_id = False){
        
        //Get all memberships
        if($membership_id === FALSE){
            $query = $this->db->get('memberships');
            return $query->result_array();
        }
        
        //Get a specific membership
        $query = $this->db->get_where('memberships', array('membership_id' => $membership_id));
        return $query->row_array();
        
    }
    
}