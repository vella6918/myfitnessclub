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
        
        //Insert user into database
        return $this->db->insert('members', $data);
    }
    
    
}