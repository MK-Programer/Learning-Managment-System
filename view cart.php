<?php include 'Admin.php'; ?>
<html>    
 <head> 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
 <link rel = "stylesheet" href = "insert.css">
 </head>
  <body>  
   <div class="body">
      <div class = "div3" style = 'margin-left: 250px;'>
    <h2> Users Data </h2>
    <table class = "table table-bordered">
      <tr> 
          
          <th> User Id </th>
          <th> User Name </th>
          <th> Course Name </th>
          <th> Course Price </th>
      </tr>
    <?php
        $username = "";
      $result = mysqli_query($conn, "SELECT * FROM cart");
      while($res = mysqli_fetch_array($result))
      {
          print "<tr>";
          print "<td>".$res['userId']."</td>";
          
          $searchQuery = "SELECT username FROM user WHERE userid = '".$res['userId']."'";
          $searchResult = mysqli_query($conn, $searchQuery);
           
          while($row = mysqli_fetch_array($searchResult))
             {
                 $username = $row['username'];
               
             }
          print "<td>".$username."</td>";
          print "<td>".$res['courseName']."</td>";
          print "<td>".$res['price']."</td>";
          print "</tr>";
      }
    ?>
    </table>
    </div>      
      </div>
    </body>
</html>