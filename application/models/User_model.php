<?php 

class User_model extends CI_Model{
    
    //loading database library
    public function __construct(){
        $this->load->database();
    }
    
    
     
    //get all user roles
    public function get_roles(){
        $this->db->order_by('role_id', 'DESC');
        $query = $this->db->get('role');
        return $query->result_array();
    }
    
    
    
    //indert user data
    public function register ($enc_password, $role){
        //User data array
        $data= array(
            'name' => $this->input->post('name'),
            'surname' => $this->input->post('surname'),
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'password' => $enc_password,
            'role_id' => $role
        );
        
        //Insert user into database
        return $this->db->insert('users', $data);
        
    }
    
    
    //login method
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
        
        //Get all users
        if($user_id === FALSE){
            $query = $this->db->get('users');
            return $query->result_array();
        }
        
        //Get a specific user
        $query = $this->db->get_where('users', array('user_id' => $user_id));
        return $query->row_array();
        
    }
    
    
    //disable user
    public function disable_user($user_id){
        
        //Membership data array
        $data= array(
            'disabled' => 1
        );
        
        //get membership
        $this->db->where('user_id', $user_id);
        //Update membership into database
        $this->db->update('users', $data);
        
        return true;
    }
    
    //enable user
    public function enable_user($user_id){
        
        //Membership data array
        $data= array(
            'disabled' => 0
        );
        
        //get membership
        $this->db->where('user_id', $user_id);
        //Update membership into database
        $this->db->update('users', $data);
        
        return true;
    }
    
    
    //reset password
    public function reset_password($user_id, $enc_password){
        
        
        $data= array(
            'password' => $enc_password
        );
        
        //get user
        $this->db->where('user_id', $user_id);
        //Update membership into database
        $this->db->update('users', $data);
        
        return true;
    }
    
    
    
}