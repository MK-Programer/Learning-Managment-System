<?php
session_start();
if(isset($_POST["send"])){
	$email = $_POST["userEmail"];
	$subject = $_POST["subject"];
	$content = $_POST["content"];

	$conn = mysqli_connect("localhost", "root", "", "lms") or die("Connection Error: " . mysqli_error($conn));
	
	if(isset($_SESSION['err_msg'])) 
    {
         mysqli_query($conn, "INSERT INTO tblcontact (user_name, user_email,subject,content) VALUES ('User', '" . $email. "','" . $subject. "','" . $content. "')");
         header('location: contact-view.php');
	}
}
require_once "contact-view.php";
?>