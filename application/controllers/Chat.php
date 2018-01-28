<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* this controller demonstrates basic controllers accessing a database 
 * author: Solange Karsenty
 *  */
class Chat extends CI_Controller {
    public function __construct() {
        parent::__construct();
       
        $this->load->database();
        //to store the messages 
        $this->load->model('Chat_model');
        //to store and use the user information
        $this->load->model('User_model');
       
    }
   
    public function index() {
        //the user cen get here only if is connected alreay 
        //otherwise will direct to login page
         if ($userid = $this->session->userdata('user_id')) {
             
        // prepare an empty array
        $data = array();
        // request all list of cars from the DB and insert in the array
        //the user id
        $data['userid'] = $userid;
        //get all messages
        $data['chats'] = $this->Chat_model->chat_list();
        //the user name
        $data['name'] =  $this->User_model->get_name_by_id($userid);
        //to give evry message is wrriter
        $data['names']= $this->User_model->get_all_ids_and_names();

        // pass it and load the view
        $this->load->view('chats_view', $data);
         }
         else{
             //the user is not connected
              redirect('login', 'refresh');
         }
    }
    
    public function new_message(){
         //if the user is not connected
        if(!$this->session->userdata('user_id'))
            return  redirect('login', 'refresh');
        //the message is empty?
        if(trim($this->input->post('message'))=="")
            return redirect('chat', 'refresh');
          //otherwise:
            $this->load->model('Chat_model');
          //add new message using post
            if( $this->Chat_model->add_message(
                   $this->session->userdata('user_id'),
                    $this->input->post('message')))
            {
               
               redirect('chat', 'refresh');
            }
           
    }
    public function delete_message($id){
        //deleting message by id and  user id
         if($this->session->userdata('user_id'))
         { 
         
            $this->Chat_model->delete_by_id($id,$this->session->userdata('user_id'));
         }
         redirect('chat', 'refresh');
    }

}