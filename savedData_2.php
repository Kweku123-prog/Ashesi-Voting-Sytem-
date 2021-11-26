<?php
session_start();
$name = $_REQUEST['txtName'];
$email   = $_REQUEST['txtEmail'];
$number = $_REQUEST['txtNumber'];
$candi = $_REQUEST['txtCand'];

$Branch =  $_REQUEST['txtBranch'];





//database connection
include('dbConnect.php');
$sql = "select email from users_2nd where email=:email";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":email",$email);
$stmt->execute();
//saves users data in database

	//validating uer email

	$row = $stmt->fetch();
	if($row['email']==$email){
        
        $_SESSION['error'] = "Email had already been used to Appy";
		header("location:confirmation_2.php");
	}else{
		
        $sql = "INSERT into users_2nd(name,email,course,number,candidate) values(:name,:email,:course,:number,:candidate)";

        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(":name",$name);
        $stmt->bindParam(":email",$email);
        $stmt->bindParam(":course",$Branch);
        $stmt->bindParam(":number",$number);
        $stmt->bindParam(":candidate",$candi);


        $stmt->execute();
		
		header('location:successfully.php');
	}




?>
