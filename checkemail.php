<?php
include("conn.php");
global $connection;
$email='';

if(isset($_POST['email']))
{
    $email = $_POST['email'];
    $row = "SELECT * FROM user WHERE email='$email' ";
    $checkEmail = mysqli_query($connection,$row );
    
 if(  mysqli_num_rows ( $checkEmail ) > 0)
    {
     echo '<b class="text-danger"> Email already exist. Try another one. </b>';
    }
else
    {
     echo '<b class="text-success"> This email is  Avalilable. </b>';
    }



}

  



?>