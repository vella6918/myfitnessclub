<?php 

class User_model extends CI_Model{
    
    //loading database library
    public function __construct(){
        $this->load->database();
    }
    
    public function register ($enc_password){
        //User data array
        $data= array(
            'name' => $this->input->post('name'),
            'surname' => $this->input->post('surname'),
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'password' => $enc_password
        );
        
        //Insert user into database
        return $this->db->insert('users', $data);
        
    }
    
    
    
    public function login ($username, $password){
        
        //Validate
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        
        // get user id
        $result = $this->db->get('users');
        
        //check if user exists in datbase
        if($result->num_rows() == 1){
            return $result->row(0)->user_id;
        }else{
            return FALSE;
        }
        
    }
    
    
    public function check_admin_rights ($user_id){
        // get user
        $query = $this->db->get_where('users', array('user_id' => $user_id));
               
        if($query->num_rows() == 1){
            return $query->row(6)->administrator;
        }
        
    }
    
    
    // Check username exists
    public function check_username_exists($username){
        $query = $this->db->get_where('users', array('username' => $username));
        if(empty($query->row_array())){
            return true;
        } else {
            return false;
        }
    }
    
    
    // Check email exists
    public function check_email_exists($email){
        $query = $this->db->get_where('users', array('email' => $email));
        if(empty($query->row_array())){
            return true;
        } else {
            return false;
        }
    }
    
    
    //Get all users
    Public function get_users($user_id = False){
        
        //Get all memberships
        if($user_id === FALSE){
            $query = $this->db->get('users');
            return $query->result_array();
        }
        
        //Get a specific user
        $query = $this->db->get_where('users', array('user_id' => $user_id_id));
        return $query->row_array();
        
    }
    
    
}