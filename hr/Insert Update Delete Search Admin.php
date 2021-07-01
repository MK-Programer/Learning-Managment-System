<?php
 
 include ("Hr Home Page.php");
 
 
 $host = "localhost";
 $user = "root";
 $password = "";
 $database = "lms";
 
 $userid = "";
 $username = "";
 $penalty = "";
 
 try{
 $conn = mysqli_connect($host, $user, $password, $database);
 }catch(Exception $ex){
     print "error";
 }

 function getPosts(){
     $posts = array();
     $posts[0] = $_POST['userid'];
     $posts[1] = $_POST['username'];
     $posts[2] = $_POST['penalty'];
     return $posts;
 }
 
 // search
 if(isset($_POST['search']))
 {
    $data = getposts();
    $searchQuery = "SELECT * FROM user WHERE userid = $data[0] AND access = 1 ";
    $searchResult = mysqli_query($conn, $searchQuery);
    
     if($searchResult)
     {
         if(mysqli_num_rows($searchResult))
         {
             while($row = mysqli_fetch_array($searchResult))
             {
                 $userid = $row['userid'];
                 $username = $row['username'];
                 $penalty = $row['penalty'];
             }
         }
         else
         {
                 print "no data for this id";
         }
     }
     else
     {
             print "result error";
     }
 }

  // update
 if(isset($_POST['update']))
 {
     $data = getPosts();
     $updateQuery = "UPDATE `user` SET  `penalty` = '$data[2]' WHERE `userid` = $data[0] AND access = '1'";
     try
  {
     $updateResult = mysqli_query($conn, $updateQuery);
     
     if($updateResult)
     {
         if(mysqli_affected_rows($conn) > 0){
             print "data updated";
         }else{
             print "data not updated";
         }
     }
 }catch(Exception $ex){
       print "error update" .$ex->getMessage();  
     }
 }

 if(isset($_POST['pan'])){
    $data = getPosts();
    $data[2] =$data[2]+1;
    $updateQuery = "UPDATE `user` SET `penalty` = '$data[2]' WHERE `userid` = $data[0]";
    $updateResult = mysqli_query($conn, $updateQuery);

}

?>


<html>
 <head> 
    <style>
        body{
        font-size: 10px;
	    font-family: 'Montserrat', sans-serif;
        background: url(../img2.jpeg) ;
        background-repeat: no-repeat;
        background-size: cover;    
        color:#FFFCFB;
        }
        
        .div1{
         left: 0px;    
         top:0px; 
         height:0px;
        }
        
        label{
         padding-left:150px;
         font-size: 25px;
         color:white;      
        }
        
        .txtStyle{
         text-align:left;
         margin-left:150px;
         width: 30%;
         height: 30px;
         border-radius:  10px;
         background: white;
	     outline: none;
	     height: 40px;
	     color: black;
	     font-size: 20px;    
        }
        
        .div2{
            margin-left: 150px;
        }
        
        .div3{
          height:0px;
          margin-top:140px;
          margin-left:900px;
          padding-left:50px;
        }
        
        .btnStyle{
          background:#00a2ed;
          font-size: 15px;    
          width:150px;
          height:30px;
          border-radius: 15px 15px;
        }
        
        .btnStyle:hover{
          cursor: pointer;
          background-color:#63bbf2;
        }
        
        .btnStyle1{
          background:#fd0e35; 
          width:100px; height:25px;
          border-radius: 15px 15px;
        }
        
        .btnStyle1:hover{
           cursor: pointer; 
            background-color: #ff4040;
        }
        
    </style>
  </head>
  <body>  
    <div class = "div3">
    <h2 style = "font-size:20px;"> Admin Data </h2>
    <table style = "border-collapse: collapse; width:100%; border:1px solid black;">
      <tr> 
          <th style = 'text-align: center; font-size:20px; border:1px solid black;'> User Id </th>
          <th style = 'text-align: center; font-size:20px; border:1px solid black;'> User Name </th>
          <th style = 'text-align: center; font-size:20px; border:1px solid black;'> penalty </th>
      </tr>
    <?php
      $result = mysqli_query($conn, "SELECT * FROM user WHERE access = '1' ORDER BY userid ASC");
      while($res = mysqli_fetch_array($result))
      {
          print "<tr class = grey>";
          print "<td style = 'text-align: center; font-size:20px; border:1px solid black;'>".$res['userid']."</td>";
          print "<td style = 'text-align: center; font-size:20px; border:1px solid black;'>".$res['username']."</td>";
          print "<td style = 'text-align: center; font-size:20px; border:1px solid black;'>".$res['penalty']."</td>";
          print "</tr>"; 
      }      
    ?>
    </table>
    </div>      
   <form action = "Insert Update Delete Search Admin.php" method = "post" enctype = "multipart/form-data">
     <div class = "div1">
     <label> Admin Id </label> <br> <input type = "text" name = "userid" class = "txtStyle" value = "<?php print $userid; ?>"> <br> <br>
     <label> Admin User Name </label> <br> <input type = "text" name = "username" class = "txtStyle"  value = "<?php print $username; ?>" readonly> <br> <br>
     <label>Penalities </label> <br> <input type = "text" name = "penalty" class = "txtStyle"  value = "<?php print $penalty; ?>"> <br> <br>                 
     <div class = "div2">
     <input type = "submit" name = "search" value = "Find" class = "btnStyle">
     <input type = "submit" name = "pan" value = "Pan" class = "btnStyle">
     <input type = "submit" name = "update" value = "Update" class = "btnStyle">     
     </div>
     </div>
   </form>   
  </body>
</html>