<?php 

class Memberships extends CI_Controller {
    
    public function index(){
        $data['title'] = 'Memberships';
        $data['memberships'] = $this->membership_model->get_memberships();
        
        $this->load->view('templates/header');
        $this->load->view('pages/memberships', $data);
        $this->load->view('templates/footer');
    }
    
}