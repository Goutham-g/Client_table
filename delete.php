<?php
	include('conn.php');
	$id=$_GET['id'];
	mysqli_query($connection,"delete from user where userid='$id'");
	header('location:index.php');
 
?>