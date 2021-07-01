<?php
 include 'Admin.php';
 $host = "localhost";
 $user = "root";
 $password = "";
 $database = "lms";
 
 $contact_id = "";
 $user_email = "";
 $subject = "";
 $content = "";
 
 try{
 $conn = mysqli_connect($host, $user, $password, $database);
 }catch(Exception $ex){
     print "error";
 }


// insert
 if(isset($_POST['insert']))
 {
   $user_email = $_POST['user_email'];
   $subject = $_POST['subject'];
   $content = $_POST['content'];

   $insertQuery = "INSERT INTO `tblcontact`(`user_email`, `user_name`, `subject`,`content`) VALUES ('$user_email', 'Admin', '$subject','$content')";
     try
  {
     $insertResult = mysqli_query($conn, $insertQuery);
     
     if($insertResult)
     {
         if(mysqli_affected_rows($conn) > 0){
            
             print "<script>alert ('data  inserted') </script>";
         }else{
            
             print "<script>alert ('data not inserted') </script>";
         }
     }
 }catch(Exception $ex){
       print "error insert" .$ex->getMessage();  
     }
         
         
     
         }




if(isset($_POST['search']))
 {
    $user_email=$_POST['user_email'];
      $searchQuery = "SELECT * FROM tblcontact WHERE user_email = '$user_email'";
      $searchResult = mysqli_query($conn, $searchQuery);
    
     if($searchResult)
     {
         if(mysqli_num_rows($searchResult))
         {
             while($row = mysqli_fetch_array($searchResult))
             {
                 $user_name = $row['user_name'];
                 $user_email = $row['user_email'];
                 $subject = $row['subject'];
                 $content = $row['content'];
                 
             }
         }
         else
         {
          print "<script>alert ('no data for this id') </script>";
                
         }
     }
     else
     {
      print "<script>alert ('result error') </script>";
     }
    }
?>


<html>
 <head> 
 <title> MAIL </title>
 
  <link rel="stylesheet" href="insert.css">

    </head>
  <body>  
  <div class="body">
      <div class = "div3">
    <h2> Email </h2>
    <table style = "border-collapse: collapse; width:100%; border:1px solid black;">
      <tr> 
          <th style = 'text-align: center; font-size:20px; border:1px solid black;'> Contact Id </th>
          <th style = 'text-align: center; font-size:20px; border:1px solid black;'> User Email </th>
          <th style = 'text-align: center; font-size:20px; border:1px solid black;'> Subject </th>
          <th style = 'text-align: center; font-size:20px; border:1px solid black;'> Content </th>
      </tr>
    <?php
      $result = mysqli_query($conn, "SELECT * FROM tblcontact WHERE user_name <> 'Admin' ORDER BY contact_id ASC");
      while($res = mysqli_fetch_array($result))
      {
          print "<tr>";
          print "<td style = 'text-align: center; font-size:20px; border:1px solid black;'>".$res['contact_id']."</td>";
          print "<td style = 'text-align: center; font-size:20px; border:1px solid black;'>".$res['user_email']."</td>";
          print "<td style = 'text-align: center; font-size:20px; border:1px solid black;'>".$res['subject']."</td>";
          print "<td style = 'text-align: center; font-size:20px; border:1px solid black;'>".$res['content']."</td>";
          print "</tr>";
      }
    ?>
    </table>
    </div>      
   <form action = "mail.php" method = "post" enctype = "multipart/form-data">
     <div class = "div1">
    
         <br> 
     <label> Name </label> <br> <input type = "text" name = "user_name" class = "txtStyle"  value = "<?php print $user_name; ?>" readonly> <br> <br>
     <label> Email </label> <br> <input type = "text" name = "user_email" class = "txtStyle" value = "<?php print $user_email; ?>"> <br> <br>     
     <label> Subject </label> <br> <input type = "text" name = "subject" class = "txtStyle" value = "<?php print $subject; ?>"> <br> <br>
     <label> Content </label> <br> <input type = "text" name = "content" class = "txtStyle" value = "<?php print $content; ?>"> <br> <br>     
         
        
     <div class = "div2">
     <input type = "submit" name = "insert" value = "Send" class = "btnStyle" >
     <input type = "submit" name = "search" value = "Find" class = "btnStyle">
     </div>
     </div>
   </form>   
      </div>
      </body>
</html>