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
          $id = $row[0];
          $username = $row[1];
          $name = $row[3];
          $password = trim($row[2]);
          $photo = $row[4];
          $email = $row[6];
      }    
    ?>

<html>
 <head>
  <title>Profile</title>
  <link rel = "stylesheet" href = "View%20Profile.css">          
 </head>
  <?php include "Menu Bar.html"; ?>
  <body>
   <div class="profile" style = 'height: 820px; margin-top: 120px;'>
    <?php print "<img src = 'img/$photo' style = 'border-radius: 50%; width: 160px; height: 160px; margin-left: 85px; padding-top: 0px; margin-buttom:200px;'>"?>;
		<input type = "file" name = "upload">
		<form action = "View Profile Checker.php" method = "post">
            <p>Name</p><input type="text" name = "name" placeholder = "Name" value = '<?php print "$name"; ?> '>
			<p>User Name</p><input type="text" name = "uname" placeholder = "User Name" value = '<?php print "$username"; ?> '>
			<p>Email</p><input type="text" name = "email" placeholder = "Email" value = '<?php print "$email"; ?>'> 
            <input type = "submit" value = "Edit" name = "edit1">
            </form>
             <form action = "View Profile Checker.php" method = "post">
            <p>Current Password</p><input type="text"  name = "current" placeholder = "Current Password">
            <p>New Password</p><input type="text"  name = "new" placeholder = "New Password"> <input type = "submit" value = "Edit" name = "edit2">
		</form>
        <center>
			<?php
				
				if(isset($_SESSION['msg'])){
					echo $_SESSION['msg'];
					unset($_SESSION['msg']);
				}
                else if(isset($_SESSION['errmsg'])){
                    echo $_SESSION['errmsg'];
					unset($_SESSION['errmsg']);
                }
			?>
			</center>
	</div>
      
  </body>
</html>