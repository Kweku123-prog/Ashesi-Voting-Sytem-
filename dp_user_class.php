<?php
//connect to database class
require 'db_class.php';

class User extends db_connection{
    // register user
   

    // verify user email
    public function verify_email($email){
        $sql = "SELECT * FROM `users` WHERE `email`='$email'";
        return $this->db_query($sql);
    }
}