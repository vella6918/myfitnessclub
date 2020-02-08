<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
    }
    

    
    public function index($year = null, $month = null){
        
        $data['title'] = 'My Calendar';
        $data['calendar'] = $this->calendar_model->generate($year, $month);
        
        $this->load->view('templates/header');
        $this->load->view('calendar/index', $data);
        $this->load->view('templates/footer');
    }
    
}

?>
