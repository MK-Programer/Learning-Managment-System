<?php
	session_start();
	include('../conn.php');

	$sq=mysqli_query($conn,"select * from `user` where userid='".$_SESSION['id']."'");
	$srow=mysqli_fetch_array($sq);
		
	$user=$srow['username'];
?>