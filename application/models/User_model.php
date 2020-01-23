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
            'email' => $this->input->post('email'),
            'password' => $enc_password
        );
        
        //Insert user into database
        return $this->db->insert('members', $data);
    }
}