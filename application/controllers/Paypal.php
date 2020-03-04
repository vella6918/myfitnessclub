 <!--  
 
 * @author      CodexWorld
 * @license     http://www.codexworld.com/license/
 * @link        http://www.codexworld.com
 
 -->


<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paypal extends CI_Controller{
    
     function  __construct(){
        parent::__construct();
        
        // Load paypal library & product model
        $this->load->library('paypal_lib');
        $this->load->model('membership_model');
     }
     
    function success(){
        // Get the transaction data
        //$paypalInfo = $this->input->get();

        $data['item_name']      = $this->input->get('item_name');
        $data['item_number']    = $this->input->get('item_number');
        $data['txn_id']         = $this->input->get('tx');
        $data['payment_amt']    = $this->input->get('amt');
        $data['currency_code']  = $this->input->get('cc');
        $data['status']         = $this->input->get('st');
      
        // Pass the transaction data to ipn method
        $this->ipn();
    }
     
     function cancel(){
        // Load payment failed view
        $this->load->view('paypal/cancel');
     }
     
     function ipn(){
        // Paypal posts the transaction data
        $paypalInfo = $this->input->post();
        
        if(!empty($paypalInfo)){
            // Validate and get the ipn response
            $ipnCheck = $this->paypal_lib->validate_ipn($paypalInfo);

            // Check whether the transaction is valid
            if($ipnCheck){
                
                // Insert the transaction data in the database
                $data= array(
                    'user_id' => $this->input->post('custom'),
                    'product_id' => $this->input->post('item_number'),
                    'txn_id' => $this->input->post('txn_id'),
                    'payment_gross' => $this->input->post('mc_gross'),
                    'currency_code' => $this->input->post('mc_currency'),
                    'payment_type' => 'PayPal',
                    'payer_email' => $this->input->post('payer_email'),
                    'payment_status' => 'Completed'
               );

                //insert transaction into database 
                $this->membership_model->insertTransaction($data);
                
                //get product details
                $data['product'] = $this->membership_model->get_memberships($this->input->post('item_number'));
                
                //calculate membership expiry date
                $expires_on = Date('d:m:y', strtotime("+".$data['product']['days']." days"));
                
                //insert data into table membership_user
                $this->membership_model->membership_user($expires_on, $this->input->post('item_number'), $this->input->post('custom'));
                
                // set message in a session
                $this->session->set_flashdata('successful_transaction', 'Your transaction was successful.');
                
                //redirect to homepage
                redirect(base_url('home'));
            }
        }
    }
}