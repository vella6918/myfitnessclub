<?php

class Calendar_model extends CI_Model
{
    
    var $prefs;
    
    public function __construct(){
        parent::__construct();
        
        $this->prefs = array(
            'start_day' => 'monday',
            'month_type'   => 'long',
            'day_type'     => 'short',
            'show_next_prev' => TRUE,
            'next_prev_url' => base_url().'calendar/index'
        );
        
        $this->prefs['template'] = '

            {table_open}<table border="0" cellpadding="0" cellspacing="0" class="calendar">{/table_open}
    
            {heading_row_start}<tr>{/heading_row_start}
    
            {heading_previous_cell}
                <th class="previous">
                    <a class="btn btn-secondary btn-sm active" role="button" aria-pressed="true" href="{previous_url}"><b>&lt;</b></a>          
                </th>
            {/heading_previous_cell}
            {heading_title_cell}
                <th colspan="{colspan}" class="cal_heading">
                    {heading}
                </th>
            {/heading_title_cell}
            {heading_next_cell}
                <th class="next">
                    <a class="btn btn-secondary btn-sm active" role="button" aria-pressed="true" href="{next_url}"><b>&gt;</b></a>
                </th>
            {/heading_next_cell}
    
            {heading_row_end}</tr>{/heading_row_end}
    
            {week_row_start}<tr>{/week_row_start}
            {week_day_cell}
                <td class="text-center">
                    <div class="week_days">
                        {week_day}
                    </div>
                </td>
            {/week_day_cell}
            {week_row_end}</tr>{/week_row_end}


    
            {cal_row_start}<tr class="days">{/cal_row_start}
            {cal_cell_start}<td class="day">{/cal_cell_start}


    
            {cal_cell_content}
                <div class="day_num">{day}</div>
                <div class="content">{content}</div>
            {/cal_cell_content}

            {cal_cell_content_today}
                <div class="day_num highlight">{day}</div>
                <div class="content">{content}</div>
            {/cal_cell_content_today}
    
            {cal_cell_no_content}
                <div class="day_num">{day}</div>
            {/cal_cell_no_content}

            {cal_cell_no_content_today}
                <div class="day_num highlight">{day}</div>
            {/cal_cell_no_content_today}
    
            {cal_cell_blank}&nbsp;{/cal_cell_blank}
    
            {cal_cell_other}{day}{/cal_cel_other}
    
            {cal_cell_end}</td>{/cal_cell_end}
            {cal_cell_end_today}</td>{/cal_cell_end_today}
            {cal_cell_end_other}</td>{/cal_cell_end_other}
            {cal_row_end}</tr>{/cal_row_end}
    
            {table_close}</table>{/table_close}
        ';
        
    }
    

    public function generate($year, $month) {

        $this->load->library('calendar', $this->prefs);
        
      
        $calendar_data = $this->get_calendar_data($year, $month);
        
        return $this->calendar->generate($year, $month, $calendar_data);
    }
    
    
    
    public function get_calendar_data($year, $month){
        
        $query = $this->db->select('date,data')->from('calendar')->like('date', "$year-$month", 'after')->get();
        
        $calendar_data = array();
        
        foreach ($query->result() as $row){
            // to remove leading zero from day format
            $calendar_date = date("Y-m-j", strtotime($row->date));
            $calendar_data[substr($calendar_date,8,2)] = $row->data;
        }
        
        return $calendar_data;
    }
    
    function add_calendar_data($date, $data){
        
        //if Event on that particular date already exist update current event, else create a new one
        if($this->db->select('date')->from('calendar')->where('date', $data)->count_all_results()){
            
            $this->db->where('date', $data)->update('calendar', array(
                
            ));
        }else{
            
            $this->db->insert('calendar', array(
                'date' => $date,
                'data' => $data
            ));
            
        }
        
        
    }

    

}

?>