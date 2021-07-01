<?php
	include('conn.php');
	session_start();
	
	if (isset($_POST['signup'])) {
     
     if(preg_match("^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z])$^", $_POST['name']) == 0){
        $_SESSION['sign_msg'] = "Name should be characters only!"; 
        header('location: signup.php'); 
	 }
     else{
         $data[0] = $_POST['name'];
     }    
        
     
     $e = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
     if(!filter_var($e,FILTER_VALIDATE_EMAIL))
     {
         $_SESSION['sign_msg'] = "Not a valid email address!"; 
         header('location: signup.php'); 
     }
     else{
         $data[1] = $e;
     }    
          
     if (!preg_match("/^[a-zA-Z0-9_]*$/",$_POST['username'])) {
         $_SESSION['sign_msg'] = "Username should not contain space and special characters!"; 
         header('location: signup.php');
     }
     else
     {
         $searchQuery = "SELECT `username` FROM user WHERE username = '".$_POST['username']."'";
         $searchResult = mysqli_query($conn, $searchQuery); 
         if(mysqli_num_rows($searchResult) >= 1){
           $_SESSION['sign_msg'] = "Invalid username!";  
         }
         else{
           $data[2] = $_POST['username'];     
         }
     }
     
    
     $fpassword=md5($_POST['password']);
     $uppercase = preg_match('@[A-Z]@', $_POST['password']);
     $lowercase = preg_match('@[a-z]@', $_POST['password']);
     $number    = preg_match('@[0-9]@', $_POST['password']);    
     if (!$uppercase || !$lowercase || !$number || strlen($_POST['password']) < 5) {
         $_SESSION['sign_msg'] = "Password must Contain at least 5 Characters!"; 
         header('location: signup.php');
     }
     else{
         $searchQuery = "SELECT `password` FROM user WHERE password = '".$fpassword."' ";
         $searchResult = mysqli_query($conn, $searchQuery); 
         if(mysqli_num_rows($searchResult) >= 1){
           $_SESSION['sign_msg'] = "Invalid password!"; 
           header('location: signup.php');     
         }
         else{
             $data[3] = $fpassword;
         }
     }
     
     $searchQuery = "SELECT `username`, `password` FROM user WHERE username = '".$username."' AND password = '$fpassword'";
     $searchResult = mysqli_query($conn, $searchQuery);
     if(mysqli_num_rows($searchResult) >= 1){
       $_SESSION['sign_msg'] = "Invalid username and password!"; 
       header('location: signup.php');     
     }
     else{
       if(!isset($_SESSION['sign_msg'])){    
     $upload_pic=$_FILES['upload_pic']['name'];
          $tmp=$_FILES['upload_pic']['tmp_name'];
          move_uploaded_file($tmp,"img/".$upload_pic );

           
           mysqli_query($conn,"insert into `user` (photo, uname, username, password, access, email, penalty) VALUES  ('$upload_pic','$data[0]', '$data[2]', '$data[3]', '2', '$data[1]',  '0')");
     $_SESSION['msg'] = "Sign up successful. You may login now!"; 
     header('location: Signin.php');
     }
     else{
       header('location: signup.php');  
     }     
         
     }
     
    }
?>