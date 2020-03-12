<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
    }
    
    function index()
    {
        $this->load->view('templates/header');
        $this->load->view('calendar/index');
        $this->load->view('templates/footer');
    }
    
    function load()
    {
        $event_data = $this->calendar_model->fetch_all_event();
        foreach($event_data->result_array() as $row)
        {
            $data[] = array(
                'id' => $row['id'],
                'title' => $row['title'],
                'start' => $row['start_event'],
                'end' => $row['end_event']
            );
        }
        echo json_encode($data);
    }
    

    

    
}

?>