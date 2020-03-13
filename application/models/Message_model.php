
<?php 

class Message_model extends CI_Model{
    
    //Get a message
    Public function get_message($message_id){
        $query = $this->db->get_where('messages', array('message_id' => $message_id));
        return $query->row_array();
    }
    
    public function get_messages($receiver){
        $query = $this->db->get_where('messages', array('receiver' => $receiver));
        return $query->result_array();
    }
    
    public function get_sent_messages($sender){
        $query = $this->db->get_where('messages', array('sender' => $sender));
        return $query->result_array();
    }
    
    public function reply($message_id, $sender){
        $data= array(
        'reply' => $this->db->escape_str($this->input->post('reply')),
        'user_id' => $sender,
        'message_id' => $message_id
        );
        
        return $this->db->insert('replies', $data);
    }
    
    //get replies
    public function get_replies($message_id){
        $this->db->join('users','users.user_id = replies.user_id');
        $query = $this->db->get_where('replies', array('message_id' => $message_id));
        return $query->result_array();
    }
    
}//end of class