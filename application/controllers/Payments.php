<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Payments extends CI_Controller {
    
    function index() {
        
        //check login
        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }
        
       
        $data['title'] = 'All Payments';
        
        
        
        $this->load->view('templates/header');
        
        //if user is administrator
        if($this->session->userdata('role') == 1){
            
            //check if user is administrator
            if($this->session->userdata('role') != 1){
                //if user is not admin error 404 will shpw up
                show_404();
            }
            
            //get all payments
            $data['payments'] = $this->payment_model->get_payments();
            
            //load admin view for admin user
            $this->load->view('payments/index', $data);
        }
        //if user is a member
        elseif($this->session->userdata('role') == 3){
            
            //get all payments related to the current member
            $data['payments'] = $this->payment_model->get_user_payments($this->session->userdata('user_id'));
            
            //load index for normal user
            $this->load->view('payments/myPayments', $data);
        }
        $this->load->view('templates/footer');
    }
}
