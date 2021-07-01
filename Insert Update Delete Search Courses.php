<?php

  include 'Admin.php';
 $host = "localhost";
 $user = "root";
 $password = "";
 $database = "lms";
 
 $courseId = "";
 $courseName = "";
 $instructorName = "";
 $coursePrice = "";
 $courseImage="";
 $Name="";
 try{
 $conn = mysqli_connect($host, $user, $password, $database);
 }catch(Exception $ex){
     print "error";
 }


// insert
 if(isset($_POST['insert']))
 {
 
   $courseId = $_POST['courseId'];
   $courseName = $_POST['courseName'];
   $instructorName = $_POST['instructorName'];
   $coursePrice = $_POST['coursePrice'];

     
     $check=false;
     
       if(empty($_POST["courseName"]))
    {
        print "<script>alert ('empty course Name') </script>";
      
    $check=true;
       }
    if(!filter_var($courseName,FILTER_SANITIZE_STRING)==TRUE)
        {
          print "<script>alert ('Course entered isn't valid') </script>";
    $check=true;    
    }
    if(empty($instructorName))
    {
       print "<script>alert ('empty instructor Name') </script>";
    $check=true;
    }
     if(!filter_var($instructorName,FILTER_SANITIZE_STRING)==TRUE)
        {
          print "<script>alert ('instructorName entered isn't valid') </script>";
     $check=true;   
     }
        if(empty($coursePrice))
    {
       print "<script>alert ('empty coursePrice') </script>";
    $check=true;
        }
     if(!filter_var($coursePrice,FILTER_VALIDATE_INT)==TRUE)
        {
          print "<script>alert ('coursePrice entered isn't valid') </script>";
     $check=true;   
     } 
     /*if(empty($courseImage))
     {
      print "<script>alert ('No Image Choosen') </script>";
      $check=true;
     }*/
     /*if($courseImage != "jpg" && $courseImage != "png" && $$courseImage != "jpeg"
&& $courseImage != "gif" ) {
  print "<script>alert ('Sorry, only JPG, JPEG, PNG & GIF files are allowed') </script>";
}*/
     
     if($check==false)
         {    
     
         
         $filename=$_FILES['courseImage']['name'];
         $tmp=$_FILES['courseImage']['tmp_name'];
        move_uploaded_file($tmp,"Course_Images/".$filename);
         mkdir("$courseName");
    

     $insertQuery = "INSERT INTO `courses`(`courseName`, `courseInstructor`, `coursePrice`,`courseImage`) VALUES ('$courseName', '$instructorName', '$coursePrice','$filename')";
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
         
 }

// delete
if(isset($_POST['delete']))
 {
   $courseId = $_POST['courseId'];

   $check=false;
   if(empty($courseId))
    {
       print "<script>alert ('empty course Id') </script>";
    $check=true;
        }
     if(!filter_var($courseId,FILTER_VALIDATE_INT)==TRUE)
        {
          print "<script>alert ('course Id entered isn't valid') </script>";
     $check=true;   
     } 
       if($check==false)
       {
        $deleteQuery = "DELETE FROM `courses` WHERE courseId = $courseId";
     try
  {
   
         
         
         
         
         $getcoursename="SELECT  `courseName`FROM `courses` WHERE `courseId`=$courseId";
         
         
         
         
         
         
               $searchQuery = "SELECT `courseName` FROM courses WHERE courseId = $courseId";
      $searchResult = mysqli_query($conn, $searchQuery);
    
     if($searchResult)
     {
         if(mysqli_num_rows($searchResult))
         {
             while($row = mysqli_fetch_array($searchResult))
             {
                 $courseName = $row['courseName'];
                
             }
         rmdir( $courseName);
         }
         else
         {
          print "<script>alert ('no data for this id') </script>";
                
         }
     }
         
                
         $deleteResult = mysqli_query($conn, $deleteQuery);
     
     if($deleteResult)
     {
         if(mysqli_affected_rows($conn) > 0){
             print "data deleted";
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


if(isset($_POST['search']))
 {
    $courseId=$_POST['courseId'];

    $check=false;
    if(empty($courseId))
    {
       print "<script>alert ('empty course Id') </script>";
    $check=true;
        }
     if(!filter_var($courseId,FILTER_VALIDATE_INT)==TRUE)
        {
          print "<script>alert ('course Id entered isn't valid') </script>";
     $check=true;   
     } 
     if($check==false)
     {
      $searchQuery = "SELECT * FROM courses WHERE courseId = $courseId";
      $searchResult = mysqli_query($conn, $searchQuery);
    
     if($searchResult)
     {
         if(mysqli_num_rows($searchResult))
         {
             while($row = mysqli_fetch_array($searchResult))
             {
                 $courseId = $row['courseId'];
                 $courseName = $row['courseName'];
                 $instructorName = $row['courseInstructor'];
                 $coursePrice = $row['coursePrice'];
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
     }




















if(isset($_POST['update']))
 {
       $courseId = $_POST['courseId'];
       $courseName = $_POST['courseName'];
       $instructorName = $_POST['instructorName'];
       $coursePrice = $_POST['coursePrice'];


       $check=false;
       if(empty($_POST["courseName"]))
    {
        print "<script>alert ('empty course Name') </script>";
      
    $check=true;
       }
    if(!filter_var($courseName,FILTER_SANITIZE_STRING)==TRUE)
        {
          print "<script>alert ('course Name isn't valid') </script>";
    $check=true;    
    }
    if(empty($instructorName))
    {
       print "<script>alert ('empty instructor Name') </script>";
    $check=true;
    }
     if(!filter_var($instructorName,FILTER_SANITIZE_STRING)==TRUE)
        {
          
     $check=true;   
     }
        if(empty($coursePrice))
    {
       print "<script>alert ('empty coursePrice') </script>";
    $check=true;
        }
     if(!filter_var($coursePrice,FILTER_VALIDATE_INT)==TRUE)
        {
          print "<script>alert ('coursePrice entered isn't valid') </script>";

     $check=true;   
     } 

     if($check==false)
     {
      
         
         
         /////////////////////////////////////
         
         
         
         
         
          $searchQuery = "SELECT `courseName` FROM courses WHERE courseId = $courseId";
      $searchResult = mysqli_query($conn, $searchQuery);
    
     if($searchResult)
     {
         if(mysqli_num_rows($searchResult))
         {
             while($row = mysqli_fetch_array($searchResult))
             {
                 $Name = $row['courseName'];
                
             }
         
          if(rename( $Name, $_POST['courseName'])) 
     {  
    //    print "<script><alert> ('Successfully Renamed $old_name to $new_name')</script>" ; 
     } 
     else
     { 
         print "<script><alert>('A File With The Same Name Already Exists')</script>" ; 
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
         
         
         
         
         ///////////////////////////////////////////
         
         $updateQuery = "UPDATE `courses` SET `courseName` = '$courseName', `courseInstructor` = '$instructorName', `coursePrice` = '$coursePrice' WHERE `courseId` = $courseId";
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

   
  // update

     
?>


<html>
 <head> 
 <title> MYSQL Entry </title>
 
  <link rel="stylesheet" href="insert.css">
     
     
    </head>
  <body>  
  <div class="body">
      <div class = "div3">
    <h2> Courses Data </h2>
    <table style = "border-collapse: collapse; width:100%; border:1px solid black;">
      <tr> 
          <th style = 'text-align: center; font-size:20px; border:1px solid black;'> Course Id </th>
          <th style = 'text-align: center; font-size:20px; border:1px solid black;'> Course Name </th>
          <th style = 'text-align: center; font-size:20px; border:1px solid black;'> Instructor Name </th>
          <th style = 'text-align: center; font-size:20px; border:1px solid black;'> Course Price </th>
      </tr>
    <?php
      $result = mysqli_query($conn, "SELECT * FROM courses ORDER BY courseId ASC");
      while($res = mysqli_fetch_array($result))
      {
          print "<tr>";
          print "<td style = 'text-align: center; font-size:20px; border:1px solid black;'>".$res['courseId']."</td>";
          print "<td style = 'text-align: center; font-size:20px; border:1px solid black;'>".$res['courseName']."</td>";
          print "<td style = 'text-align: center; font-size:20px; border:1px solid black;'>".$res['courseInstructor']."</td>";
          print "<td style = 'text-align: center; font-size:20px; border:1px solid black;'>".$res['coursePrice']. "$"."</td>";
          print "</tr>";
      }
    ?>
    </table>
    </div>
      <div class="edit">
   <form action = "Insert Update Delete Search Courses.php" method = "post" enctype = "multipart/form-data">
     <div class = "div1">
      <label> upload picture </label> <br> 
         <input type = "file" name = courseImage class = "txtStyle" value = "<?php print $courseImage. "$"; ?>" > <br> <br> 
         <label> Course Id </label> <br> <input type = "text" name = "courseId" class = "txtStyle" value = "<?php print $courseId; ?>"> <br> <br>
     <label> Course Name </label> <br> <input type = "text" name = "courseName" class = "txtStyle"  value = "<?php print $courseName; ?>"> <br> <br>
     <label> Instructor Name </label> <br> <input type = "text" name = "instructorName" class = "txtStyle" value = "<?php print $instructorName; ?>"> <br> <br>     
     <label> Course Price </label> <br> <input type = "text" name = "coursePrice" class = "txtStyle" value = "<?php print $coursePrice. "$"; ?>"> <br> <br> 
         
        
     <div class = "div2">
     <input type = "submit" name = "insert" value = "Add" class = "btnStyle" >
     <input type = "submit" name = "update" value = "Update" class = "btnStyle">
     <input type = "submit" name = "delete" value = "Delete" class = "btnStyle1">
     <input type = "submit" name = "search" value = "Find" class = "btnStyle">
     </div>
     </div>
   </form>   
      </div>
      </div>
      </body>
</html>