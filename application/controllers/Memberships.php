<?php 

class Memberships extends CI_Controller {
    
    function  __construct(){
        parent::__construct();
        
        // Load paypal library & membership model
        $this->load->library('paypal_lib');
        $this->load->model('membership_model');
    }
    
    public function index(){
        $data['title'] = 'Memberships';
        $data['memberships'] = $this->membership_model->get_memberships();
        
        $this->load->view('templates/header');
        $this->load->view('memberships/index', $data);
        $this->load->view('templates/footer');
    }
    
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
        
    }
    
    
    
    //create new membership
    public function create() {
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
    }//end of method register

}