<?php

  include 'Admin.php';
 $host = "localhost";
 $user = "root";
 $password = "";
 $database = "lms";
 
 
 try{
 $conn = mysqli_connect($host, $user, $password, $database);
 }catch(Exception $ex){
     print "error";
 }


if(isset($_POST['insert']))
 {
    
    $Video_Description=$_POST['Video_Description'];
    $Video_name=$_POST['Video_name'];
    $coursechoosen=$_POST['coursename'];
    $videoname=$_FILES['VideosSource']['name'];
    $tmp=$_FILES['VideosSource']['tmp_name'];

    $check=false;
    //
    
    //
    
     
    if(empty($Video_Description))
    {
        print "<script>alert ('empty Video Description') </script>";
      
    $check=true;
       }
    if(!filter_var($Video_Description,FILTER_SANITIZE_STRING)==TRUE)
        {
          print "<script>alert ('Video Description isn't valid') </script>";
    $check=true;    
    }
    if(empty($Video_name))
    {
        print "<script>alert ('empty Video Name') </script>";
      
    $check=true;
       }
    if(!filter_var($Video_name,FILTER_SANITIZE_STRING)==TRUE)
        {
          print "<script>alert ('Video Name isn't valid') </script>";
    $check=true;    
    }
    if(empty($Video_Description))
    {
        print "<script>alert ('empty Video Description') </script>";
      
    $check=true;
       }
    if(!filter_var($Video_Description,FILTER_SANITIZE_STRING)==TRUE)
        {
          print "<script>alert ('Video Description isn't valid') </script>";
    $check=true;    
    }
     
   /*  if($VideosSource != "MP4") {
  print "<script>alert ('Sorry, only MP4 files are allowed') </script>";
}*/
    if($check==false)
    {


                   move_uploaded_file($tmp,$coursechoosen."/".$videoname );

           
           
              $insertvideo="INSERT INTO `videos`( `Videos_name`, `videos_description`, `videos_path`,`course_Name`) VALUES ('$Video_name','$Video_Description','$videoname','$coursechoosen')";
            
              $putresult=mysqli_query($conn,$insertvideo);

               
               if($putresult)
                 {
                   print "<script>alert ('data inserted') </script>";
                 }
        else
        {
            
            print "<script>alert ('Error y poop') </script>";
            
        }
                    
               
       }
      
}

    
  if(isset($_POST['delete']))
 {
        $coursechoosen=$_POST['coursename'];
        $Video_name=$_POST['Video_name'];
        $check=false;
  
      if(empty($Video_name))
      {
          
          print "<script>alert ('Video name is empty') </script>";

          $check=true;
      }
      
      
      if($check==false)
       {
          
          $deleteQuery = "DELETE FROM `videos` WHERE `Videos_name`='$Video_name'";
         $getpath="SELECT  `videos_path` FROM `videos` WHERE `Videos_name`='$Video_name'";
       
          if($pathResult = mysqli_query($conn, $getpath))
          {
              
              if(unlink("Courses/Data Structure/Doc1.docs"))
          {
              print "<script>alert ('video deleted') </script>";

             
          }
      
          else
          {
           print "<script>alert ('video not deleted') </script>";
   
              
          }
              
              
          }
          else
          {
              
              
              
          }
          
          
          
      
          try
                {
                 $deleteResult = mysqli_query($conn, $deleteQuery);
     
                if($deleteResult)
                                  {
         
                                                                     print "<script>alert ('data deleted') </script>";
                                                                     }
                                                                      else
                                                                       {
                                                                       print "<script>alert ('data not deleted') </script>";
             
                                                                        }  
                                    
                }
         catch(Exception $ex)
                            {
             
                             print "error delete" .$ex->getMessage();  
                            
                            }
               
      }
           
          else
          {
                         print "<script>alert ('video name is not found') </script>";    
          }
            

              
  }

          

   





?>


<html>

<head>
    <title> MYSQL Entry </title>

    <link rel="stylesheet" href="insert.css">

</head>

<body>
    <div class="body">
        <div class="div3">
            <h2> Courses Data </h2>
            <table style = "border-collapse: collapse; width:100%; border:1px solid black;">
                <tr>
                    
                    <th style = 'text-align: center; font-size:20px; border:1px solid black;'> Course Name </th>
                    <th style = 'text-align: center; font-size:20px; border:1px solid black;'> Instructor Name </th>
                    <th style = 'text-align: center; font-size:20px; border:1px solid black;'> Course Price </th>
                </tr>
                <?php
      $result = mysqli_query($conn, "SELECT * FROM courses ORDER BY courseId ASC");
      while($res = mysqli_fetch_array($result))
      {
          print "<tr>";
         // print "<td>".$res['courseId']."</td>";
          print "<td style = 'text-align: center; font-size:20px; border:1px solid black;'>".$res['courseName']."</td>";
          print "<td style = 'text-align: center; font-size:20px; border:1px solid black;'>".$res['courseInstructor']."</td>";
          print "<td style = 'text-align: center; font-size:20px; border:1px solid black;'>".$res['coursePrice']. "$"."</td>";
          print "</tr>";
      }
    ?>
            </table>
        </div>
        <form action="Insert Update Delete Search Videos.php" method="post" enctype="multipart/form-data">
            <div class="div1">
                <label> upload your video </label> <br>
                <input type="file" name=VideosSource class="txtStyle"> <br> <br>
                <!--<label> Course-ID </label> <br> <input type="text" name="courseId" class="txtStyle"> <br> <br>-->

                <label> Video Name </label> <br> <input type="text" name="Video_name" class="txtStyle"> <br> <br>
                <label> Video Description </label> <br> <input type="text" name="Video_Description" class="txtStyle"> <br> <br>
                <div style="margin-left: 350px;font-size:20px;">
                    <?php

echo "CourseName <br>";
  $conn = mysqli_connect("localhost", "root", "", "lms");
  $sqlNat = "SELECT DISTINCT courseName FROM courses";
  $resultNat = mysqli_query($conn, $sqlNat);
  echo '<select name="coursename">';
  while ($row = $resultNat->fetch_assoc()){
    echo '<option value="'.$row["courseName"].'">'.$row["courseName"].'</option>';
    echo $row['courseName']."<br>";
}
echo "</select>"
?>
                </div>

                <div class="div2">
                    <input type="submit" name="insert" value="Add" class="btnStyle">
                    <input type="submit" name="delete" value="Delete" class="btnStyle1">

                </div>
            </div>


        </form>
    </div>
</body>

</html>
