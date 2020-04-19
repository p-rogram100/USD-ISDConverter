<?php
$host = "localhost";
$user  = "root";
$password =  "";
$dbname = "intern_assig";

$conn = mysqli_connect($host, $user, $password, $dbname) or die("Connection failed:".mysqli_connect_error());
 //check connection stablish or not

if(mysqli_connect_errno())
{
    printf("Connect failed: %s \n",mysqli_connect_error());
   
}

?>