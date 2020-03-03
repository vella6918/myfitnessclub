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
        
    }//end of get_memberships method
    
    
    
    
    /*
     * Insert data in the database
     * @param data array
     * 
     * 
     * @author      CodexWorld
     * @license     http://www.codexworld.com/license/
     * @link        http://www.codexworld.com
     * 
     */
    public function insertTransaction($data){
        $insert = $this->db->insert($this->transTable,$data);
        return $insert?true:false;
    }//end of insertTransaction method
    
    
    //insert data into membership_user table
    public function membership_user($expires_on, $membership_id, $user_id){
        
        //Membership data array
        $data= array(
            'user_id' => $user_id,
            'membership_id' => $membership_id,
            'expires_on' => $expires_on        
        );
        
        //Insert data into database
        return $this->db->insert('membership_user', $data);
        
    }//end of membership_user method
    
    
    
    
    
    //Create new membership
    public function new_membership(){
        //Membership data array
        $data= array(
            'membership' => $this->input->post('name'),
            'price' => $this->input->post('price')
        );
        
        //Insert user into database
        return $this->db->insert('memberships', $data);
    }//end of create_membership method
    
    
    
    
    
    
    //Delete a membership
    public function delete_membership($membership_id){
        $this->db->where('membership_id', $membership_id);
        $this->db->delete('memberships');
        
        return true;
    }//end of delete_membership method
    
    
    
    
    
    
    
    
    //update membership method
    public function update_membership($membership_id){
        
        //Membership data array
        $data= array(
            'membership' => $this->input->post('name'),
            'price' => $this->input->post('price'),
        );
        
        //get membership
        $this->db->where('membership_id', $membership_id);
        //Update membership into database
        $this->db->update('memberships', $data);
        
        return true;
    }
    
    
    
}