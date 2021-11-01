<?php
	include('conn.php');
 	global $connection;

	 if(isset($_POST['userid']))
	{
		$id=$_POST['userid']; 
		$name = $_POST['name'];
		$contact = $_POST['contact'];
		$email = $_POST['email'];
		$webaddress = $_POST['webaddress'];
		$category = $_POST['category'];
		$description = $_POST['description'];
		// $assignedUser=$_POST['assignedUser'];
		// ,assigned='$assignedUser'

		$sql = "update user set name='$name', contact=' $contact', email='$email', webaddress ='$webaddress' ,category='$category',description='$description' where userid='$id'";
		$result = mysqli_query($connection,$sql );
		// header('location:index.php');
	}
	
 
?>