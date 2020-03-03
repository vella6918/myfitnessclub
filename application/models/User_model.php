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
    public function register ($enc_password, $role, $code){
        //User data array
        $data= array(
            'name' => $this->input->post('name'),
            'surname' => $this->input->post('surname'),
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'password' => $enc_password,
            'role_id' => $role,
            'entry_code' => $code
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
            $this->db->join('role','role.role_id = users.role_id');
            $query = $this->db->get('users');
            return $query->result_array();
        }
        
        //Get a specific user
        $this->db->join('role','role.role_id = users.role_id');
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
        
        //get user
        $this->db->where('user_id', $user_id);
        //Update user into database
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
    
    
    //update user details
    public function update($user_id){
        
        //User data array
        $data= array(
            'name' => $this->input->post('name'),
            'surname' => $this->input->post('surname'),
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'role_id' => $this->input->post('role_id')
        );
        
        //get user
        $this->db->where('user_id', $user_id);
        //Update user details
        $this->db->update('users', $data);
        
        return true;
    }//end of update_user method
    
    
    //check user entry code
    public function check_code($code){
       
        //check data in database
        $query = $this->db->get_where('users', array('entry_code' => $code));
        if(empty($query->row_array())){
            return false;
        } else {
            return true;
        }

    }//end of check_code method
    
    
    //find user with code
    public function code ($code){
        
        //Validate
        $this->db->where('entry_code', $code);
        
        // get user id
        $result = $this->db->get('users');
        
        //return user_id
        if($result->num_rows() == 1){
            return $result->row(0)->user_id;
        }else{
            return FALSE;
        }
        
    }//end of code method
    
    //get membership and user details
    public function membership_user($user_id){
        
        $this->db->join('users','users.user_id = membership_user.user_id');
        $this->db->join('memberships','memberships.membership_id = membership_user.membership_id');
        $this->db->join('role','role.role_id = users.role_id');
        $query = $this->db->get_where('membership_user', array('membership_user.user_id' => $user_id));
        return $query->row_array();
  
    }//end of membership_user data
    
    
    //check in user
    public function checkin ($user_id){
            $data= array(
                'user_id' => $user_id
            );
            
        
        //Insert user into database
        return $this->db->insert('checkins', $data);
        
    }//end of checkin method
    
}//end of class