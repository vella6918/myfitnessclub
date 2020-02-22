<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Payments extends CI_Controller {
    
    function index() {
        
        //check login
        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }
        
       
        $data['title'] = 'All Payments';
        $data['payments'] = $this->payment_model->get_payments();
        
        
        $this->load->view('templates/header');
        
        //check if user is administrator
        if($this->session->userdata('role') == 1){
            //load admin view for admin user
            $this->load->view('payments/index', $data);
        }else{
            //load index for normal user
            $this->load->view('payments/myPayments', $data);
        }
        $this->load->view('templates/footer');
    }
}
