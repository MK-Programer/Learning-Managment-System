<?php
	include('../conn.php');
	session_start();
	if(isset($_POST['msg'])){		
		$msg=$_POST['msg'];
		$id=$_POST['id'];
		mysqli_query($conn,"insert into `chat` (chatroomid, message, userid, chat_date, who) values ('$id', '$msg' , '".$_SESSION['id']."', NOW(), '4')") or die(mysqli_error());
	}
?>