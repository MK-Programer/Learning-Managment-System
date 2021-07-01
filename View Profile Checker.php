<?php
      session_start();
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "lms";

      $conn = new mysqli($servername, $username, $password, $dbname);

      $sql = "SELECT * FROM user WHERE userid = '".$_SESSION['id']."'";
      $result = mysqli_query($conn, $sql);
      while($row = mysqli_fetch_row($result)){
      $userid = $row[0];
      $username = $row[1];
      $password = $row[2];
      $uname = $row[3];  
      $email = $row[6];    
      }    
    
      
       
      function getPosts(){
       $posts = array();
       $posts[0] = $_POST['uname'];
       $posts[1] = $_POST['name'];
       $posts[2] = $_POST['email'];
       $posts[3] = $_POST['current'];
       $posts[4] = $_POST['new'];      
       return $posts;
       }
      

      if(isset($_POST['edit1'])){
        $data = getPosts();  
        if(preg_match("^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$^", $_POST['name']) == 0){
        $_SESSION['errmsg'] = "Name should be characters only!"; 
        header('location: View Profile.php'); 
	    }
        else{
         $data[0] = $_POST['name'];
        }
        
        $e = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
        if(!filter_var($e,FILTER_VALIDATE_EMAIL))
        {
           $_SESSION['errmsg'] = "Not a valid email address!"; 
           header('location: View Profile.php');  
        }
        else{
           $data[1] = $e;
        }
        
        if (!preg_match("/^[a-zA-Z0-9_]*$/",$_POST['uname'])) {
           $_SESSION['errmsg'] = "Username should not contain space and special characters!"; 
           header('location: View Profile.php'); 
        }
        else
        {
           $searchQuery = "SELECT `username` FROM user WHERE username = '".$_POST['uname']."' AND userid <> '".$_SESSION['id']."'";
           $searchResult = mysqli_query($conn, $searchQuery); 
           if(mysqli_num_rows($searchResult) >= 1){
           $_SESSION['errmsg'] = "Invalid username!";
           header('location: View Profile.php');        
           }
           else{
           $data[2] = $_POST['uname'];     
           }
        }
          
        if(!isset($_SESSION['errmsg'])){
          $editQuery = "UPDATE `user` SET `username` = '$data[2]', `uname` = '$data[0]', `email` = '$data[1]' WHERE `userid` = '".$_SESSION['id']."'";
          mysqli_query($conn,$editQuery);      
          $_SESSION['msg'] = "Edited successful. You may login now!"; 
          header('location: View Profile.php');
          }
          else{
             header('location: View Profile.php');  
          }   
          
          
          
          
        }

             
        if(isset($_POST['edit2'])){
        $passwordHash = md5($_POST['current']);
        $newPassword = md5($_POST['new']);
    
        $uppercase = preg_match('@[A-Z]@', $_POST['new']);
        $lowercase = preg_match('@[a-z]@', $_POST['new']);
        $number    = preg_match('@[0-9]@', $_POST['new']);    
          
        $searchQuery = "SELECT `password` FROM user WHERE password = '$newPassword' AND userid <> '".$_SESSION['id']."' ";
        $searchResult = mysqli_query($conn, $searchQuery);    
        if( mysqli_num_rows($searchResult) >= 1)
        {
         $_SESSION['errmsg'] = "Already taken"; 
         header('location: View Profile.php');     
        }    
    
        if(!$uppercase || !$lowercase || !$number || strlen($_POST['new']) < 5){
          $_SESSION['errmsg'] = "Password must Contain at least 5 Characters!";
          header('location: View Profile.php');     
        } 
        else if($passwordHash != $password){
          $_SESSION['errmsg'] = "Wrong current password";
          header('location: View Profile.php');    
        }
        else{
            $data[3] = $newPassword;
        }  
        
        $searchQuery = "SELECT `username`, `password` FROM user WHERE username = '".$_POST['uname']."' AND password = '".$data[3]."'";
        $searchResult = mysqli_query($conn, $searchQuery);
        if(mysqli_num_rows($searchResult) >= 1){
          $_SESSION['errmsg'] = "Invalid username and password!"; 
          header('location: View Profile.php');     
        }
        else{    
          if(!isset($_SESSION['errmsg'])){
          $editQuery = "UPDATE `user` SET `password` = '$data[3]' WHERE `userid` = '".$_SESSION['id']."'";
          mysqli_query($conn,$editQuery);      
          $_SESSION['msg'] = "Edited successful. You may login now!"; 
          header('location: View Profile.php');
          }
          else{
             header('location: View Profile.php');  
          } 
        }
      }

      
?>