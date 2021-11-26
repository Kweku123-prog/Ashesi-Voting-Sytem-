<?php
session_start();
$name = $_REQUEST['txtName'];
$email   = $_REQUEST['txtEmail'];
$number = $_REQUEST['txtNumber'];
$branch =  $_REQUEST['txtbranch'];
$rollno =  $_REQUEST['txtRollNo'];
$enroll =  $_REQUEST['txtEnrollID'];





//database connection


//database connection
include('dbConnect.php');
$sql = "select email from candidate_3rd where email=:email";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":email",$email);
$stmt->execute();


	//validating your  email

	$row = $stmt->fetch();

    if($row['email']==$email){
        $_SESSION['error'] = "Email had already been used to Apply";
		header("location:insert_Candidate_3rd.php");
      
    }
    else{
		
        $sql = "INSERT into candidate_3rd(name,email,mobile,course,testimonial,studentid) values(:name,:email,:mobile,:course,:testimonial,:studentid)";
        $stmt = $pdo->prepare($sql);
       //saves users data in database
        $stmt->bindParam(":name",$name);
        $stmt->bindParam(":email",$email);
        $stmt->bindParam(":mobile",$number);
        $stmt->bindParam(":course",$branch);
        $stmt->bindParam(":testimonial",$rollno);
        $stmt->bindParam(":studentid",$enroll);

        $stmt->execute();
        header('location: pending.php');
	}
?>
