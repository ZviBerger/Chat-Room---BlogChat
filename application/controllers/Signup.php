<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Signup extends CI_Controller{
    
    
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function index() {
        // the view checks for an "error" so we initialize
        // empty string
       
        //store empty fields in the view
        $data["error"] = $data['name'] = $data['email']= $data['password'] ="";
        //loading the view
        $this->load->view("sign_up_view", $data);
        
        
    }
    
    
    public function checksignup() {
        $this->load->model('Sign_up_model');
       // log_message('debug', "Form email: " . $this->input->post('email'));
        //get the fields content from th user after post it
        $data['name'] = $this->input->post('username');
        $data['email'] = $this->input->post('email');
        $data['password'] = $this->input->post('pwd');
        $data["error"]="";
        //if the fileds are empty we will rech the catch
       try {
          //try to add user 
        $user_added =  $this->Sign_up_model->add_user( $data['name'],  $data['email'],  $data['password']);
            if($user_added ) {
              $this->load->view('signed_view',$data);
            }
            else{
                $data["error"]="The email you entered already exist in the system.";
                $this->load->view('sign_up_view',$data);
            }
       }
     catch (Exception $ex){
     //set error and reloud the view
     $data["error"]="All fields are necessary please try again.";
     $this->load->view('sign_up_view',$data);
     
 }
           
          
    }

    
    
    
    
    
    
    
    
    
}