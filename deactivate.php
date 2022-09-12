<?php
require('connection.php');
session_start(); 
	if (isset($_GET['id'])){
		$id = $_GET['id'];
		$sql="UPDATE `user` SET`status`=0 WHERE id='$id'";
		$result = mysqli_query($conn,$sql);
        // print_r($result);die;
	}
	header("location: user.php");
?>
