<?php   
 //index.php  
 session_start();  
 include 'conn.php'; 
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>LMS | Courses</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <style>  
               body{
                   background-image: url(img/hero-bg.png);
                   /* Center and scale the image nicely */
                   background-repeat: no-repeat;
                   background-size: cover;
               }
               .text-info{
                  
                   font-size: 18px;
               }
               .text-info:hover{
                   text-decoration: none;
               }
               
               
           </style>  
      </head>  
      <body>  
           <br />  
         
          <div class="container" style = "margin-top:20px;">  
            <div class = "row">  
              <?php include "Menu Bar.html";?>
                
                <?php  
                $query = "SELECT * FROM cart WHERE userId = '".$_SESSION['id']."'";  
                $result = mysqli_query($conn, $query);  
                if(mysqli_num_rows($result) > 0)  
                {  
                     while($row = mysqli_fetch_array($result))  
                     {  
                ?>  
                <div class="col-md-4">  
                    <ul style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px; align=center">  
                        <img src="<?php echo 'Course_Images/'.$row['imgPath']; ?>" data-id="<?php echo $row['courseId']; ?>" data-name="<?php echo $row['courseName']; ?>" data-price="<?php echo $row['coursePrice']; ?>" class="img-responsive product_drag" alt = "" />  
                        <a class="text-info" href="read videos.php?name=<?php echo $row['courseName'] ?>"><?php echo $row['courseName'] ;?></a> 
                     </ul>  
                </div>  
                <?php  
                     }  
                }  
                ?>  
                
                <br />  
              </div>  
           </div>
            
       
             <br />  
      </body>  
 </html>  
 
