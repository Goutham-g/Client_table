<?php
	include('conn.php');
 
	$id=$_GET['id'];
 
	$fname = $_POST['fname'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $webaddress = $_POST['webaddress'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $assigned = $_POST['assigned'];
 
	$insert=mysqli_query($connection,"update user set name='$fname', contact=' $contact', email='$email', webaddress ='$webaddress' ,category='$category',description='$description',assigned='$assigned' where userid='$id'");
	
    header('location:index.php');
 
?>