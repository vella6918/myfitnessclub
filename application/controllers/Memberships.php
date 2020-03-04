<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Memberships extends CI_Controller {
    
    function  __construct(){
        parent::__construct();
        
        // Load paypal library & membership model
        $this->load->library('paypal_lib');
    }
    
    
    //default view method for memberships
    public function index(){
        $data['title'] = 'Memberships';
        $data['memberships'] = $this->membership_model->get_memberships();
        
        $this->load->view('templates/header');
        
        //check if user is administrator
        if($this->session->userdata('role') == 1){
            //load admin view for admin user
            $this->load->view('memberships/admin_view', $data);
        }else{            
            //load index for normal user
            $this->load->view('memberships/index', $data);
        }
        $this->load->view('templates/footer');
    }//end of index method
    
    
    
    //Buy Membership
    public function buy($membership_id){
        
       //check login
        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }
        
        // Set variables for paypal form
        $returnURL = base_url().'paypal/success';
        $cancelURL = base_url().'paypal/cancel';
        $notifyURL = base_url().'paypal/ipn';
        
        // Get product data from the database
        $membership = $this->membership_model->get_memberships($membership_id);
        
        // Get current user ID from the session
        $userID = $this->session->userdata('user_id');
        
        // Add fields to paypal form
        $this->paypal_lib->add_field('return', $returnURL);
        $this->paypal_lib->add_field('cancel_return', $cancelURL);
        $this->paypal_lib->add_field('notify_url', $notifyURL);
        $this->paypal_lib->add_field('item_name', $membership['name']);
        $this->paypal_lib->add_field('custom', $userID);
        $this->paypal_lib->add_field('item_number',  $membership['membership_id']);
        $this->paypal_lib->add_field('amount',  $membership['price']);
        
        // Render paypal form
        $this->paypal_lib->paypal_auto_form();
        
    }//end of buy method
    
    
    
    
    
    //create new membership
    public function create() {
        
        
        //check login
        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }
        
        //check if user is administrator
        if($this->session->userdata('role') != 1){
            //if user is not admin error 404 will shpw up
            show_404();
        }
        
        
        
        $data['title'] = 'New Membership';
        
        //setting errors
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required');

        
        if($this->form_validation->run() === FALSE){
            //displaying the Add new membership page with errors
            $this->load->view('templates/header');
            $this->load->view('memberships/create', $data);
            $this->load->view('templates/footer');
        }else{
            
            //calling the new membership method in the membership model
            $this->membership_model->new_membership();
            
            // set message in a session
            $this->session->set_flashdata('membership_created', 'You have created a new membership');
            
            //redirect user to memberships
            redirect('memberships/index');
        }
    }//end of method create
    
    
    
    
    //Method to delete memebership
    public function detele($membership_id){
        //check login
        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }
        
        //check if user is administrator
        if($this->session->userdata('role') != 1){
            //if user is not admin error 404 will shpw up
            show_404();
        }
        
        //if user admin go to delete method in the membership model class
        $this->membership_model->delete_membership($membership_id);
            
        
        // Set message
        $this->session->set_flashdata('membership_deleted', 'Your post has been deleted');
        
        //redirect
        redirect('memberships');
     
    }//end of delete method
    
    
    
    
    
    //Method to edit membership
    public function edit($membership_id){
        
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
        $data['membership'] = $this->membership_model->get_memberships($membership_id);
        
        
        //Show error 404 if memnership does not exist in database
        if(empty($data['membership'])){
            show_404();
        }
        
        
        //set page title
        $data['title'] = 'Edit Membership';
        
        //load views
        $this->load->view('templates/header');
        $this->load->view('memberships/edit', $data);
        $this->load->view('templates/footer');
        
        
    }//end of edit membership method
    
    
    
    
    
    
    //update membership method
    public function update($membership_id){
        //check login
        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }
        
        //check if user is administrator
        if($this->session->userdata('role') != 1){
            //if user is not admin error 404 will shpw up
            show_404();
        }
        
       
        //load update_membership method from membership_model
        $update = $this->membership_model->update_membership($membership_id);
        
        if($update){
            // Set message
            $this->session->set_flashdata('membership_updated', 'Your membership has been updated');
            
            //redirect user
            redirect('memberships');
        }else{
            // Set message
            $this->session->set_flashdata('membership_failed_to_update', 'Your membership has failed to update');
            
            //redirect user
            redirect('memberships');
        }
    }//end of update method
    
    
    //renew membership and pay by cash
    public function assign($user_id){
        
        //check login
        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }
        
        //get role
        $role = $this->session->userdata('role');
        
        //if user is trainee show 404 error
        if($role == 3){
            show_404();
        }
        
        //set page title
        $data['title'] = 'Assign Membership';
        
       //get memberships
       $data['memberships'] = $this->membership_model->get_memberships();
       
       //current user
       $data['user'] = $user_id;
       
       
       //setting errors
       $this->form_validation->set_rules('membership', 'membership', 'required');
        
       if($this->form_validation->run() === FALSE){
            //load views
            $this->load->view('templates/header');
            $this->load->view('memberships/assign', $data);
            $this->load->view('templates/footer');
       }else{
           
           $membership_id = $this->input->post('membership');
           
           //get the selected membership
           $data['membership'] = $this->membership_model->get_memberships($membership_id);
           
           $membership_days = $data['membership']['days'];
                    
           $membership_price =  $data['membership']['price'];
           
           // Insert the transaction data in the database
           $data= array(
               'user_id' => $user_id,
               'product_id' => $membership_id,
               'payment_gross' => $membership_price,
               'currency_code' => 'EUR',
               'payment_type' => 'CASH',
               'payment_status' => 'Completed'
           );
           
           //insert transaction into database
           $this->membership_model->insertTransaction($data);
           
           //find data in membership_user table
           $data['details'] = $this->user_model->membership_user($user_id);
           
           //calculate membership expiry date
           $currentDate = date('Y-m-d');
 
           $expires_on = date('Y-m-d', strtotime($currentDate . ' + '.$membership_days.' days'));
          
           
           if(empty($data['details'])){
               //insert new record in table membership_user
               $this->membership_model->membership_user($expires_on, $membership_id, $user_id);
               
               // set message in a session
               $this->session->set_flashdata('membership_renewed', 'Membership Renewed.');
               
               //redirect user to memberships
               redirect('view/'.$user_id);
           }else{
               //update membership_user table
               $update = $this->membership_model->update_membership_user($expires_on, $membership_id, $user_id);
               
               // set message in a session
               $this->session->set_flashdata('membership_renewed', 'Membership Renewed.');
               
               //redirect user to memberships
               redirect('view/'.$user_id);
           }
           
       }
 
    }//end of assign method

}//end of class
    
    
    ?>
