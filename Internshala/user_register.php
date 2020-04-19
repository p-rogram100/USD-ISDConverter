<?php
include_once('include/connection.php');
date_default_timezone_set('Asia/Kolkata');
$currentTime =date("y-m-d,h:i:sa");
$us_name = $_POST['user_name'];
   
$us_email_id = $_POST['user_email_id'];

$us_password = $_POST['user_password'];


 $user_check_query = "SELECT * FROM account WHERE emailid='$us_email_id' ";
  $result = mysqli_query($conn, $user_check_query);
  

  if(mysqli_num_rows($result)>0)
  {echo"register";

  }
  else
  {
    if($_FILES['file']['name']!='')
    { $file_name_ks=$_FILES['file']['name'];
     $extension = (explode(".",$file_name_ks));
     $extension1=end($extension);
     $allowed_type= array("jpg","png","jpeg");
     if(in_array($extension1,$allowed_type))
     {
    
        $new_name= rand().".".$extension1;
        $path='profile_image/'.$new_name;
        if(move_uploaded_file($_FILES['file']['tmp_name'],$path))
        {
            $query="INSERT INTO account (`emailid`, `name`, `password`, `profile_photo`, `account_creation_date`)  VALUES ('$us_email_id',  '$us_name', '$us_password','$new_name', '".$currentTime."');";
           $statement=$conn->prepare($query);
           $statement->execute(); 
           echo'inserted';
        }
     }
    
    }
    
    
  }
 ?>


