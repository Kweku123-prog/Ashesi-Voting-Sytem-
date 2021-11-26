<?php
//connect to controller
require 'db_user_cont.php';

// keep track of errors
$errors = array();
// check if the button has been clicked

    // grab form data
  
   


$name = $_POST['txtName'];
$email   = $_POST['txtEmail'];
$message = $_POST['txtMessage'];

    // validate data
    // check if fields are empty
if(empty($name)){
        array_push($errors, "name is requried");
        header("location:contact_form.php");
        
    }
if(empty($email)){
        array_push($errors, "email is requried");
        header("location:contact_form.php");
       
    }
if(empty($message)){
        array_push($errors, "message is requried");
        header("location:contact_form.php");
      
   

    // check if email already exists
$verify_email = verify_email_fxn($email);
if(!$verify_email){
        array_push($errors, "email already exists");
      
    }

    // check if fields are of appropriate length
  ////  if(strlen($username) > 100){
     //   array_push($errors, "username must be shorter than 100 characters");
   // }
  ///  if(strlen($email) > 100){
     ///   array_push($errors, "email must be shorter than 100 characters");
   /// }

    // check if passwords are the same
   

    // validate email with regex
$regex = "/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix";
    // set an error if not a valid email address
if(!preg_match($regex, $email)){
        array_push($errors, "enter a valid email address");
     
}

    // image validation
   




    // if form is fine
   
    }
else{
       
        header("location:successfully.php");
    }
    // upload image
    // record new user into the database
