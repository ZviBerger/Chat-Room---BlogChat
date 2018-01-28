<?php
// a class to handle cars in the database
// CREATE TABLE `car` (
// `id` int(11) NOT NULL,
//  `name` varchar(128) NOT NULL
// ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

class Chat_model extends CI_Model {

    // returns all content of the car table, ordered by name
    public function chat_list() {
        return $this->db
                ->select('*') /* select anything  */
                ->from('chat') /* from car  */
                ->order_by('date', 'DESC') /* order it by name, ascendant */
                ->get() /* execute the query */
                ->result_array(); /* convert result into an array */
    }
    // returns an array of the corresponding car (DB table row) 
    // with given id in parameter
    
    public function add_message($userid,$message){
      
            $data = array('message' =>$message,
                          'user_id'=>$userid);
              return $this->db->insert('chat',$data);
  }  
    
    public function delete_by_id($id,$user_id) {
       $this->db->where('id',$id);
       $this->db->where( 'user_id',$user_id);
        return $this->db->delete('chat');
    }

}
