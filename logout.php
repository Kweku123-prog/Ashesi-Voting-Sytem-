<?php
//log out user
session_start();
session_destroy();

header("location:admin_login.php");
?>