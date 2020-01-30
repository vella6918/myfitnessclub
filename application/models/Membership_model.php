<?php 

class Membership_model extends CI_Model{
    
    public function __construct(){
        $this->load->database();
        $this->transTable = 'payments';
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
    
    /*
     * Insert data in the database
     * @param data array
     */
    public function insertTransaction($data){
        $insert = $this->db->insert($this->transTable,$data);
        return $insert?true:false;
    }
    
    
    //Create new membership
    public function new_membership(){
        //Membership data array
        $data= array(
            'name' => $this->input->post('name'),
            'price' => $this->input->post('price'),
        );
        
        //Insert user into database
        return $this->db->insert('memberships', $data);
    }
    
    
}