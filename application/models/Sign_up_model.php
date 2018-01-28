<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Sign_up_model extends CI_Model{
    
    
  public function is_exist($name,$email,$pass){
      
       if (trim($name)==""||trim($email) == "" || trim($pass) == "")
            throw new Exception("Name or Email or password empty!");
       
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('email', $email);
        
        //if there is result for this query the user already exsist
        if ($query = $this->db->get()) {
            // return an array
            return $query->row_array();
        } else {
            return false;
        }        
  }  
  
  //////////////////////////////////////////////////////////////////////////
  
    
  public function add_user($name,$email,$pass){
      
    if($this->is_exist($name,$email,$pass))
         return false;
    
            $data = array('name' =>$name,
                          'email'=>$email,
                          'password'=> md5($pass) );
               return $this->db->insert('user',$data);
    
  return true;
  }  
    
    
    
}