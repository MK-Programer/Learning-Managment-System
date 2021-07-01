<?php

  include 'Admin.php';
 
 $host = "localhost";
 $user = "root";
 $password = "";
 $database = "lms";
 
 $userid = "";
 $username = "";
 $password = "";

 
 try{
 $conn = mysqli_connect($host, $user, $password, $database);
 }catch(Exception $ex){
     print "error";
 }

 
 // search
 if(isset($_POST['search']))
 {
    $userid=$_POST['userid'];

    $check=false;
    if(empty($userid))
    {
       print "<script>alert ('empty Admin Id') </script>";
    $check=true;
        }
     if(!filter_var($userid,FILTER_VALIDATE_INT)==TRUE)
        {
          print "<script>alert ('Admin Id entered isn't valid') </script>";
     $check=true;   
     } 
     if($check==false)
     {
      $searchQuery = "SELECT * FROM user WHERE userid = $userid AND access = 1 ";
    $searchResult = mysqli_query($conn, $searchQuery);
    
     if($searchResult)
     {
         if(mysqli_num_rows($searchResult))
         {
             while($row = mysqli_fetch_array($searchResult))
             {
                 $userid = $row['userid'];
                 $username = $row['username'];
                 $password = $row['password'];
             }
         }
         else
         {
                 print "<script>alert ('no data for this id') </script>";
         }
     }
     else
     {
         print "<script>alert ('result error  ') </script>";
     }
 }
     }
    

 // insert
 if(isset($_POST['insert']))
 {
    $userid=$_POST['userid'];
    $username=$_POST['username'];
    $password=$_POST['password'];

    $check=false;

    if(empty($username))
    {
        print "<script>alert ('empty AdminName') </script>";
      
    $check=true;
       }
    if(!filter_var($username,FILTER_SANITIZE_STRING)==TRUE)
        {
          print "<script>alert ('AdminName entered isn't valid') </script>";

    $check=true;    
    }
     if(empty($password))
    {
        print "<script>alert ('empty Password') </script>";
      
    $check=true;
       }
    if(!filter_var($password,FILTER_SANITIZE_STRING)==TRUE)
        {
          print "<script>alert ('password entered isn't valid') </script>";
    $check=true;    
    }
    if($check==true)
    {
      $searchQuery = "SELECT `username` FROM user WHERE username = '".$_POST['username']."'";
         $searchResult = mysqli_query($conn, $searchQuery); 
         if(mysqli_num_rows($searchResult) >= 1){
           print "<script>alert ('Invalid Admin Name') </script>";
           $check=true;
         }
         else{
          $username=$_POST['username'];
         }
    }
    if($check==false)
    {
      $fpassword = md5($password); 
      $insertQuery = "INSERT INTO `user`(`username`, `password`, `access`) VALUES ('$username', '$password', '1')";
      $insertResult = mysqli_query($conn, $insertQuery);
     try
  {
     
     
     if($insertResult)
     {  
         if(mysqli_affected_rows($conn) > 0){
             print "<script>alert ('data inserted') </script>";
         }else{
             print "<script>alert ('data not inserted') </script>";
         }
     }
 }catch(Exception $ex){
       print "error insert" .$ex->getMessage();  
     }
 }
    }
     

 // delete
 if(isset($_POST['delete']))
 {
         $userid=$_POST['userid'];
    $username=$_POST['username'];
    $password=$_POST['password'];

    $check=false;
    if(empty($userid))
    {
       print "<script>alert ('empty AdminID') </script>";
    $check=true;
        }
     if(!filter_var($userid,FILTER_VALIDATE_INT)==TRUE)
        {
          print "<script>alert ('AdminID entered isn't valid') </script>";
     $check=true;   
     } 
    if($check==false)
    {
      $deleteQuery = "DELETE FROM `user` WHERE userid = $userid AND userid <> 1 AND access = '1'";
     try
  {
     $deleteResult = mysqli_query($conn, $deleteQuery);
     
     if($deleteResult)
     {
         if(mysqli_affected_rows($conn) > 0){
             
             print "<script>alert ('data deleted') </script>";
         }else{
             
             print "<script>alert ('data not deleted') </script>";
         }
     }
 }catch(Exception $ex){
       print "error delete" .$ex->getMessage();  
     }
 }
    }
     

  // update
 if(isset($_POST['update']))
 {
    $userid=$_POST['userid'];
    $username=$_POST['username'];
    $password=$_POST['password'];


    $check=false;
    if(empty($password))
    {
        print "<script>alert ('empty Password') </script>";
      
    $check=true;
       }
    if(!filter_var($password,FILTER_SANITIZE_STRING)==TRUE)
        {
          print "<script>alert ('Password isn't valid') </script>";
    $check=true;    
    }
    if(empty($username))
    {
       print "<script>alert ('empty AdminName') </script>";
    $check=true;
    }
     if(!filter_var($username,FILTER_SANITIZE_STRING)==TRUE)
        {
          
     $check=true;   
     }
        if(empty($userid))
    {
       print "<script>alert ('empty AdminID') </script>";
    $check=true;
        }
     if(!filter_var($userid,FILTER_VALIDATE_INT)==TRUE)
        {
          print "<script>alert ('AdminID entered isn't valid') </script>";

     $check=true;   
     } 
    if($check==false)
    {
      $updateQuery = "UPDATE `user` SET `username` = '$username', `password` = '$password' WHERE `userid` = $userid AND access = '1'";
     try
  {
     $updateResult = mysqli_query($conn, $updateQuery);
     
     if($updateResult)
     {
         if(mysqli_affected_rows($conn) > 0){
          
             print "<script>alert ('data updated') </script>";
         }else{
             
             print "<script>alert ('data not updated') </script>";
         }
     }
 }catch(Exception $ex){
       print "error update" .$ex->getMessage();  
     }
 }
    }
     
?>


<html>
 <head> 
  <title> MYSQL Entry </title>

    
 <link rel = "stylesheet" href = "insert.css">
    </head>
  <body style = 'background-image:url(img/admin.jpeg); background-repeat: no-repeat; background-size:cover;'>  
   <div class="body">
      <div class = "div3">
    <h2> Admin Data </h2>
    <table style = "border-collapse: collapse; width:100%; border:1px solid black;">
      <tr> 
          <th style = 'text-align: center; font-size:20px; border:1px solid black;'> User Id </th>
          <th style = 'text-align: center; font-size:20px; border:1px solid black;'> User Name </th>
          <th style = 'text-align: center; font-size:20px; border:1px solid black;'> User Password </th>
      </tr>
    <?php
      $result = mysqli_query($conn, "SELECT * FROM user WHERE access = '1' ORDER BY userid ASC");
      while($res = mysqli_fetch_array($result))
      {
          print "<tr>";
          print "<td style = 'text-align: center; font-size:20px; border:1px solid black;'>".$res['userid']."</td>";
          print "<td style = 'text-align: center; font-size:20px; border:1px solid black;'>".$res['username']."</td>";
          print "<td style = 'text-align: center; font-size:20px; border:1px solid black;'>".$res['password']."</td>";
          print "</tr>";
      }
    ?>
    </table>
    </div>      
  
      
      <form action = "Insert Update Delete Search Admin.php" method = "post" enctype = "multipart/form-data">
     <div class = "div1">
     <label> Admin Id </label> <br> <input type = "text" name = "userid" class = "txtStyle" value = "<?php print $userid; ?>"> <br> <br>
     <label> Admin Name </label> <br> <input type = "text" name = "username" class = "txtStyle"  value = "<?php print $username; ?>"> <br> <br>
     <label> Admin Password </label> <br> <input type = "text" name = "password" class = "txtStyle"  value = "<?php print $password; ?>"> <br> <br>         
     <div class = "div2">
     <input type = "submit" name = "insert" value = "Add" class = "btnStyle" >
     <input type = "submit" name = "update" value = "Update" class = "btnStyle">
     <input type = "submit" name = "delete" value = "Delete" class = "btnStyle1">
     <input type = "submit" name = "search" value = "Find" class = "btnStyle">
     </div>
     </div>
   </form>   
      </div>
       </body>
</html>