<?php
session_start();
include_once("include/connection.php");
if(isset($_POST['login_button'])) {
    $user_email = trim($_POST['login_email']);
    $user_password = trim($_POST['login_pass']);
    $sql = "SELECT  * FROM `account` WHERE emailid='$user_email'";
    $resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
    $row = mysqli_fetch_assoc($resultset);
    if($row['password']==$user_password){

    echo "success";
    $_SESSION['user_session'] = $row['emailid'];
   

    } else {
    echo "email or password does not exist."; // wrong details
    }
    }
?>