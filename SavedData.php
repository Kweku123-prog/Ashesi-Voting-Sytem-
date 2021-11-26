<?php
session_start();
$name = $_REQUEST['txtName'];
$email   = $_REQUEST['txtEmail'];
$number = $_REQUEST['txtNumber'];
$candi = $_REQUEST['txtCand'];

$Branch =  $_REQUEST['txtBranch'];





//database connection
include('dbConnect.php');
$sql = "select email from users where email=:email";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":email",$email);
$stmt->execute();
//saves users data in database

	//validating  your  email

	$row = $stmt->fetch();
	if($row['email']==$email){
        $_SESSION['error'] = "Email had already been used to Vote ";
		header("location:confirmation.php");
        

	}else{

        $sql = "INSERT into users(name,email,course,number,candidate) values(:name,:email,:course,:number,:candidate)";

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