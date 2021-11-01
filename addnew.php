<?php
include("conn.php");



global $connection;

 if(isset($_POST['insertdata']))
{

    $fname = $_POST['fname'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $webaddress = $_POST['webaddress'];
    $category = $_POST['category'];
    $description = $_POST['description'];
	$assigned = $_POST['assignedUser'];
    // $assigneduser = $_POST['assigneduser'];

    $query = "INSERT INTO user (name,contact,email,webaddress,category,description,assigned ) 
    VALUES ('$fname','$contact','$email','$webaddress','$category','$description','$assigned')";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script> alert("Data Saved"); </script>';
        header('Location:index.php');
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
   
}

?>