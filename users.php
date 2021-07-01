<?php include 'Admin.php'; ?>
<html>    
 <head> 
  
 <link rel = "stylesheet" href = "insert.css">
 </head>
  <body>  
   <div class="body">
      <div class = "div3" style = 'margin-left: 250px;'>
    <h2> Users Data </h2>
    <table style = "border-collapse: collapse; width:100%; border:1px solid black;">
      <tr> 
          
          <th style = 'text-align: center; font-size:20px; border:1px solid black;'> Picture </th>
          <th style = 'text-align: center; font-size:20px; border:1px solid black;'> User Id </th>
          <th style = 'text-align: center; font-size:20px; border:1px solid black;'> Name </th>
          <th style = 'text-align: center; font-size:20px; border:1px solid black;'> User Name </th>
          <th style = 'text-align: center; font-size:20px; border:1px solid black;'> Email </th>
          <th style = 'text-align: center; font-size:20px; border:1px solid black;'> User Password </th>
      </tr>
    <?php
      $result = mysqli_query($conn, "SELECT * FROM user WHERE access = '2' ORDER BY userid ASC");
      while($res = mysqli_fetch_array($result))
      {
          print "<tr>";
           print "<td style = 'text-align: center; font-size:20px; border:1px solid black;'><img style = 'border-radius: 50%; width:50px; height: 50px;' src = img/".$res['photo']." style = border-radius: 50%;></td>";
          print "<td style = 'text-align: center; font-size:20px; border:1px solid black;'>".$res['userid']."</td>";
          print "<td style = 'text-align: center; font-size:20px; border:1px solid black;'>".$res['uname']."</td>";
          print "<td style = 'text-align: center; font-size:20px; border:1px solid black;'>".$res['username']."</td>";
          print "<td style = 'text-align: center; font-size:20px; border:1px solid black;'>".$res['email']."</td>";
          print "<td style = 'text-align: center; font-size:20px; border:1px solid black;'>".$res['password']."</td>";
          print "</tr>";
      }
    ?>
    </table>
    </div>      
      </div>
    </body>
</html>