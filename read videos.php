<?php
 include("conn.php");
?>
 <!doctype html>
  <html>
    <head>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
      <style>
       body{
          background-image: url(img.jpg);
          background-repeat: no-repeat;
          background-size: cover;  
          
          }  
         
     </style>
    </head>
    <body style = "margin-top:150px;">
     <?php include "Menu Bar.html";?>
     <br />             
       <?php  
$courseName = "";
$query = "SELECT courseName FROM courses WHERE courseName = '".$_GET['name']."'";  
$result = mysqli_query($conn, $query);  
if(mysqli_num_rows($result) > 0)  
{  
     while($row = mysqli_fetch_array($result))  
     {
         $courseName = $row['courseName']; 
     } 
    }    
?>
<?php
         $query = "SELECT * FROM videos WHERE course_Name = '".$_GET['name']."'";  
         $result = mysqli_query($conn, $query);  
         if(mysqli_num_rows($result) > 0){  
            while($row = mysqli_fetch_assoc($result)){  
             $name = $row['videos_path'];
             $description = $row['videos_description'];
             print "<div class=col-md-3>";   
             print "<div style=border:1px solid #333;  background-color:#f1f1f1; border-radius:5px; padding:250px; align=center>";
             print "<iframe src= '$courseName/$name' ></iframe>" ; 
             print "<h3 style = color:red;> $description </h3> ";    
             print "</div>";  
             print "</div>";            
            }
        }
     ?>
    </body>
</html>
