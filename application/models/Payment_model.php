<?php 

class Payment_model extends CI_Model {
    
    //Get all payments
    public function get_payments($payment_id = False){
        
        //Get all payments
        if($payment_id === FALSE){
            $this->db->order_by('payments.payment_id', 'DESC');
            $this->db->join('users','users.user_id = payments.user_id');
            $this->db->join('memberships','memberships.membership_id = payments.product_id');
            $query = $this->db->get('payments');
            return $query->result_array();
        }
        
        //Get a payment by payment id
        $this->db->order_by('payments.payment_id', 'DESC');
        $this->db->join('users','users.user_id = payments.user_id');
        $this->db->join('memberships','memberships.membership_id = payments.product_id');
        $query = $this->db->get_where('payments', array('payment_id' => $payment_id));
        return $query->row_array();
        
    }//end of get_payments method
    
    
    //get user payments
    public function get_user_payments($user_id){
        
        //Get all payments that were made by the current user
        if($user_id){
            $this->db->order_by('payments.payment_id', 'DESC');
            $this->db->join('users','users.user_id = payments.user_id');
            $this->db->join('memberships','memberships.membership_id = payments.product_id');
            $query = $this->db->get_where('payments', array('payments.user_id' => $user_id));
            return $query->result_array();
        
        }
    }//end of get_user_payments method
    
    
}

?>