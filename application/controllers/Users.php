<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Users extends CI_Controller {
        
        
        public function index(){
            //check login
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }
            
            //check if user is administrator or tainer
            if($this->session->userdata('role') == 3){
                //if user is not admin or trainer error 404 will shpw up
                show_404();
            }
            
            //set title
            $data['title'] = 'All Users';
            //get user
            $data['users'] = $this->user_model->get_users();
                        
            $this->load->view('templates/header');
            $this->load->view('users/index', $data);
            $this->load->view('templates/footer');
        }
        
        
        public function get_trainers(){
            //check login
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }
            
            //check if user is administrator or tainer
            if($this->session->userdata('role') == 3){
                //if user is not admin or trainer error 404 will shpw up
                show_404();
            }
            
            //set title
            $data['title'] = 'Trainers';
            //get user
            $data['users'] = $this->user_model->get_trainers();
            
            $this->load->view('templates/header');
            $this->load->view('users/index', $data);
            $this->load->view('templates/footer');
        }
        
        
        public function get_members(){
            //check login
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }
            
            //check if user is administrator or tainer
            if($this->session->userdata('role') == 3){
                //if user is not admin or trainer error 404 will shpw up
                show_404();
            }
            
            //set title
            $data['title'] = 'Members';
            //get user
            $data['users'] = $this->user_model->get_members();
            
            $this->load->view('templates/header');
            $this->load->view('users/index', $data);
            $this->load->view('templates/footer');
        }
        
        public function get_admins(){
            //check login
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }
            
            //check if user is administrator or tainer
            if($this->session->userdata('role') == 3){
                //if user is not admin or trainer error 404 will shpw up
                show_404();
            }
            
            //set title
            $data['title'] = 'Administrators';
            //get user
            $data['users'] = $this->user_model->get_admins();
            
            $this->load->view('templates/header');
            $this->load->view('users/index', $data);
            $this->load->view('templates/footer');
        }
        
        
        //member register method
        public function register() {
            $data['title'] = 'Sign Up';
            
            //get all user roles
            $data['roles'] = $this->user_model->get_roles();
            
            //setting errors
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('surname', 'Surname', 'required');
            $this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
            $this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
            $this->form_validation->set_rules('password', 'Password', 'required|callback_valid_password');
            $this->form_validation->set_rules('password2', 'Confirm Password', 'required', 'matches[password]');
            
            if($this->form_validation->run() === FALSE){
                //displaying the register page with errors
                $this->load->view('templates/header');
                $this->load->view('users/register', $data);
                $this->load->view('templates/footer');
            }else{
                //encript password
                $enc_password = md5($this->input->post('password'));
                
                //generate entry code
                $code = mt_rand(1000,9999);
                
                //check if code already exists in datbase
                $check_code = $this->user_model->check_code($code);
                
                //keep generating a new code until the code is unique
                while ($check_code == true){
                    //generate entry code
                    $code = mt_rand(1000,9999);
                    //check if code already exists in datbase
                    $check_code = $this->user_model->check_code($code);
                }
                
                //check role, if it is not posted, set role to default 3
                if($this->input->post('role_id')){
                    $role = $this->input->post('role_id');
                }else{
                    $role = '3';   
                }
                
                //get user email
                $recipient = $this->input->post('email');
                
                
                
                //calling the registration method in the user model and passing the encrypted password
                $this->user_model->register($enc_password, $role, $code);
                
                // set message in a session
                $this->session->set_flashdata('user_registered', 'You are now registered and can Login.');
                
                
                //check login
                if(!$this->session->userdata('logged_in')){
                     //if registration is done by the user online
                    //send email to the registered user
                    $this->email_for_new_user($recipient, $code);
                    
                    redirect('login');
                }else{
                    $password = $this->input->post('password');
                    $username = $this->input->post('username');
                    //if registration is done by the administrator or by the trainer
                    //send email
                    $this->email_for_new_user($recipient, $code,$password, $username);
                    
                    redirect('users');
                }
                
            }
        }//end of method register
        
                 
            
            //Login User method
            public function login() {
                $data['title'] = 'Sign In';
                
                //setting errors
                $this->form_validation->set_rules('username', 'Username', 'required');
                $this->form_validation->set_rules('password', 'Password', 'required');
                
                if($this->form_validation->run() === FALSE){
                    //displaying the register page with errors
                    $this->load->view('templates/header');
                    $this->load->view('users/login', $data);
                    $this->load->view('templates/footer');
                }else{
                    
                    //Get username
                    $username = $this->input->post('username');
                    
                    //Get and ecrypt the password
                    $password = md5($this->input->post('password'));
                    
                    //Login user
                    $user_id = $this->user_model->login($username, $password);
                    
                    //check for user id
                    if($user_id){
                        
                        //get user data
                        $user = $this->user_model->get_users($user_id);
                        
                        //check if user account is disabled
                        $disabled = $user['disabled'];
                        
                        
                        //if disabled redirect to login page and display message
                        if($disabled){
                            // set message in a session
                            $this->session->set_flashdata('user_disabled', 'Your user has been disabled');
                            
                            //redirect user to home page after registration is successful
                            redirect('login');
                        }
                        
                        //check admin rights
                        $role = $user['role_id'];
                                         
                        //Saving the data returned from user model to $user_data variable
                        $user_data = array(
                            'user_id' => $user_id,
                            'username' => $username,
                            'role' => $role,
                            'logged_in' => TRUE
                        );
                        
                        
                        //Set user data into a session
                        $this->session->set_userdata($user_data);
                        
                        // set message in a session
                        $this->session->set_flashdata('user_loggedin', 'You are now logged in.');
                        
                        //redirect user to home page after registration is successful
                        redirect('home');
                        
                    }else {
                        //set error message
                        $this->session->set_flashdata('login_failed', 'Login is invalid.');
                        
                        //redirect user to home page after registration is successful
                        redirect('users/login');
                    }
                }
            }//end of method login
            
            
            // User logout
            public function logout() {
                //unset user data session
                $this->session->unset_userdata('logged_in');
                $this->session->unset_userdata('username');
                $this->session->unset_userdata('role');
                $this->session->unset_userdata('user_id');
                
                
                //set message
                $this->session->set_flashdata('user_loggedout', 'Your are now logged out.');
                
                //redirect user to home page after registration is successful
                redirect('users/login');
                
            }//end of logout method
            

            
            //Check if username exists
            public function check_username_exists($username){
                //set error message
                $this->form_validation->set_message('check_username_exists', 'That username is taken. Please choose a different one.');
                
                //Database check in user model
                if($this->user_model->check_username_exists($username)){
                    return true;
                }else{
                    return false;
                }
            }
            
            
            
            // Check if email exists
            public function check_email_exists($email){
                $this->form_validation->set_message('check_email_exists', 'That email is taken. Please choose a different one.');
                if($this->user_model->check_email_exists($email)){
                    return true;
                } else {
                    return false;
                }
            }
            
            
            
            //Natanfelles (2016). CodeIgniter Strong Password Validation. Available at:https://forum.codeigniter.com/thread-66889.html (Accessed 24th January 2020)
            public function valid_password($password = '')
            {
                $password = trim($password);
                $regex_lowercase = '/[a-z]/';
                $regex_uppercase = '/[A-Z]/';
                $regex_number = '/[0-9]/';
                $regex_special = '/[!@#$%^&*()\-_=+{};:,<.>�~]/';

                if (preg_match_all($regex_lowercase, $password) < 1)
                {
                    $this->form_validation->set_message('valid_password', 'The {field} field must be at least one lowercase letter.');
                    return FALSE;
                }
                if (preg_match_all($regex_uppercase, $password) < 1)
                {
                    $this->form_validation->set_message('valid_password', 'The {field} field must be at least one uppercase letter.');
                    return FALSE;
                }
                if (preg_match_all($regex_number, $password) < 1)
                {
                    $this->form_validation->set_message('valid_password', 'The {field} field must have at least one number.');
                    return FALSE;
                }
                if (preg_match_all($regex_special, $password) < 1)
                {
                    $this->form_validation->set_message('valid_password', 'The {field} field must have at least one special character.' . ' ' . htmlentities('!@#$%^&*()\-_=+{};:,<.>�~'));
                    return FALSE;
                }
                if (strlen($password) < 5)
                {
                    $this->form_validation->set_message('valid_password', 'The {field} field must be at least 5 characters in length.');
                    return FALSE;
                }
                if (strlen($password) > 32)
                {
                    $this->form_validation->set_message('valid_password', 'The {field} field cannot exceed 32 characters in length.');
                    return FALSE;
                }
                return TRUE;
            }
            
            //view a specific user
            public function view ($user_id){
                
                //check login
                if(!$this->session->userdata('logged_in')){
                    redirect('users/login');
                }
                
                //check if user is trainee
                if($this->session->userdata('role') == 3){
                    //if user is trainee error 404 will shpw up
                    show_404();
                }
                
                //get user data
                $data['user'] = $this->user_model->get_users($user_id);
                
                //if trainer is not equal to NULL
                if($data['user']['trainer'] != NULL){
                    //get trainer data
                    $data['trainer'] = $this->user_model->get_users($data['user']['trainer']);
                }
                
                //if trainer find all assigned trainees
                if($data['user']['role_id'] == 2){
                   $data['trainees'] = $this->user_model->get_assigned_trainees($data['user']['user_id']);
                }
                
                if(empty($data['user'])){
                    show_404();
                }
                
                //if the user in question is trainee get membership details
                if($data['user']['role_id'] == 3){
                    $data['membership'] = $this->user_model->membership_user($user_id);
                }
                
                
                $this->load->view('templates/header');
                $this->load->view('users/view', $data);
                $this->load->view('templates/footer');
                
            }
            
            
            //disable user
            public function disable ($user_id){
                //check login
                if(!$this->session->userdata('logged_in')){
                    redirect('users/login');
                }
                
                //check if user is administrator
                if($this->session->userdata('role') != 1){
                    //if user is not admin error 404 will shpw up
                    show_404();
                }
                
                //disable user
                $disable = $this->user_model->disable_user($user_id);
                
                if($disable){
                    // Set message
                    $this->session->set_flashdata('user_disable', 'User has been disabled');
                    
                    //redirect user
                    redirect('users');
                }else{
                    // Set message
                    $this->session->set_flashdata('user_disable_failed', 'User cannot be disabled');
                    
                    //redirect user
                    redirect('users');
                }
            }
            
            
            
            //enable user
            public function enable ($user_id){
                //check login
                if(!$this->session->userdata('logged_in')){
                    redirect('users/login');
                }
                
                //check if user is administrator
                if($this->session->userdata('role') != 1){
                    //if user is not admin error 404 will shpw up
                    show_404();
                }
                
                //enable user
                $enable = $this->user_model->enable_user($user_id);
                
                if($enable){
                    // Set message
                    $this->session->set_flashdata('user_enabled', 'User has been enabled');
                    
                    //redirect user
                    redirect('users');
                }else{
                    // Set message
                    $this->session->set_flashdata('user_enable_failed', 'User cannot be enabled');
                    
                    //redirect user
                    redirect('users');
                }
            }
            
            
            //reset password
            public function resetPassword($user_id){
                
                $data['title'] = 'Reset Password';
                
                //check login
                if(!$this->session->userdata('logged_in')){
                    redirect('users/login');
                }
                
                //check if user is administrator
                if($this->session->userdata('role') != 1){
                    //if user is not admin error 404 will shpw up
                    show_404();
                }
                
                
                //Get Membership
                $data['user'] = $this->user_model->get_users($user_id);
                
                
                //Show error 404 if memnership does not exist in database
                if(empty($data['user'])){
                    show_404();
                }
                
                
                $this->load->view('templates/header');
                $this->load->view('users/reset_password', $data);
                $this->load->view('templates/footer');
            }
            
            
            
            //update new password
            public function update_password($user_id){
                //check login
                if(!$this->session->userdata('logged_in')){
                    redirect('users/login');
                }
                
                //check if user is administrator
                if($this->session->userdata('role') != 1){
                    //if user is not admin error 404 will shpw up
                    show_404();
                }
                
                                
                $this->form_validation->set_rules('password', 'Password', 'required|callback_valid_password');
                $this->form_validation->set_rules('password2', 'Confirm Password', 'required', 'matches[password]');
                
                if($this->form_validation->run() === FALSE){
                    //displaying the register page with errors
                    redirect('users/resetPassword/'.$user_id);
                }else{
                
                    //encript password
                    $enc_password = md5($this->input->post('password'));
                    
                    //load update_membership method from membership_model
                    $update = $this->user_model->reset_password($user_id, $enc_password);
                    
                    if($update){
                        // Set message
                        $this->session->set_flashdata('user_password_updated', 'User password was updated');
                        
                        //redirect user
                        redirect('users');
                    }else{
                        // Set message
                        $this->session->set_flashdata('user_password_failed_update', 'User password was not updated');
                        
                        //redirect user
                        redirect('users');
                    }
                }
            }//end of update_password method
            
            
            //edit user details
            public function edit($user_id){
                //check login
                if(!$this->session->userdata('logged_in')){
                    redirect('users/login');
                }
                
                //check if user is administrator or user id in session is the same as the current user id
                if($this->session->userdata('role') == 1 || $this->session->userdata('user_id') == $user_id){
                    //get user details
                    $data['user'] = $this->user_model->get_users($user_id);
                                      
                    
                    //if user details are not found show 404
                    if(empty($data['user'])){
                        show_404();
                    }
                    
                    //set title
                    $data['title'] = 'Edit User';
                    
                    //load pages from views
                    $this->load->view('templates/header');
                    $this->load->view('users/edit', $data);
                    $this->load->view('templates/footer');
                    
                }else{
                    //if user is not admin error 404 will shpw up
                    show_404();
                }
                
                
            }//end of edit method
            
            
            //update user details
            public function update($user_id){
                //check login
                if(!$this->session->userdata('logged_in')){
                    redirect('users/login');
                }
                
                $this->user_model->update($user_id);
                
                // Set message
                $this->session->set_flashdata('user_update', 'User details updated successfully.');
                
                redirect('users');
            }
            
            
            
            //private function to send email to new registered user
            public function email_for_new_user($recipient, $code, $password=FALSE, $username = FALSE){
                
                
                $config = array(
                    'protocol' => 'smtp',
                    'smtp_host' => 'ssl://smtp.gmail.com',
                    'smtp_user' => 'thefitnetics@gmail.com',
                    'smtp_pass' => 'ZebbugMaya2011?',
                    'smtp_port' => 465,
                    'mailtype' => 'html',
                    'charset' => 'iso-8859-1'
                );
                
                
                $this->email->initialize($config);
                $this->email->set_mailtype("html");
                $this->email->set_newline("\r\n");
                
                
                $this->email->to($recipient);
                $this->email->from('donotreply@thefitnessclub.com','The Fitness Club');
                $this->email->subject('The Fitness Club');
                
                if($password && $username){
                    $this->email->message('<p>You have been registered to The Fitness Club</p><p>You can now access the gym with this code: '.$code.'</p><p>You can access the web application with the following credentials</p><p><b>Username: </b>'.$username.'</p><p><b>Password: </b>'.$password.'</p>');
                }else{
                    $this->email->message('<p>WELCOME to The Fitness Club. Your online registration was successful. Next step is to purchase a membership from the web application.</p><p>Once purchased you will be able to access the gym\'s premises by presenting the following code to the reception desk.</p> <p>Code Number: <b>'.$code.'</b></p><p>Regards<br>The Management</p>');
                }
                
                
                //send email
                $this->email->send();

            }//end email function
            
            
            //asiign trainer to a member
            public function assign_trainer($user_id){
                //check login
                if(!$this->session->userdata('logged_in')){
                    redirect('users/login');
                }
                
                //if user is trainee show 404 error page will be displayed
                if($this->session->userdata('role') == 3){
                    show_404();
                }
                
                //find user
                $data['user'] = $this->user_model->get_users($user_id);
                
                //set user id
                $user_id = $data['user']['user_id'];
                
                //set title
                $data['title'] = 'Assign Trainer';
                
                //get all trainers
                $data['trainers'] = $this->user_model->get_trainers();
                
                //setting errors
                $this->form_validation->set_rules('trainer', 'Trainer', 'required');
                
                if($this->form_validation->run() === FALSE){
                    //displaying view page with errors
                    $this->load->view('templates/header');
                    $this->load->view('users/assign_trainer', $data);
                    $this->load->view('templates/footer');
                }else{
                    
                    $this->user_model->assign_trainer($user_id);
                    
                    // Set message
                    $this->session->set_flashdata('trainer_assigned', 'Trainer assigned.');
                    
                    redirect('users/view/'.$user_id);
                }
            }//end of assign_trainer method
            
    

    }//end of class