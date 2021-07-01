<?php error_reporting(E_ERROR | E_WARNING | E_PARSE);
session_start();
?>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="Admin.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>

<body style = 'background-image:url(img/admin.jpeg); background-repeat: no-repeat; background-size:cover; position: fixed; width: 100%;'>
	
	<input type="checkbox" id="check">
<!--header begin-->
	<header style = 'margin-top: 0px;'>
		<label for="check">
			<i class="fas fa-bars" id="sidebar_btn"></i>
		</label>
        <div>
        <center>
			<?php 
			$username=$_SESSION['uname'];
		$conn = mysqli_connect("localhost", "root", "", "lms");
		$sql="SELECT * FROM user WHERE uname= '".$_SESSION['uname']."'";
   		$result = mysqli_query($conn, $sql);
   while($row=mysqli_fetch_row($result))
	{
		$photo=$row[4];
   	  echo"<div class=profile_image>";
   	  echo "<img src='img/$photo' width=50 height=50 style = 'border-radius: 50%; margin-left: -1000px; margin-top:-25px;'>";
      echo"</div>";
   }
   
   ?>
		</center>
        </div>
		<div class="right_area" style = 'margin-top: -15px;'>
     
        
            <a href="logout.php" class="logout_btn" style = "margin-top:-20px;">LogOut</a>
		</div>
		<!--header end-->
	</header>
	<div class="sidebar" style = 'margin-top: 0px;'>
		<a href="Insert%20Update%20Delete%20Search%20Admin.php"><i class="fas fa-plus"></i><span>Addministrators</span></a>
        <a href="Insert%20Update%20Delete%20Search%20Courses.php"><i class="fas fa-plus"></i><span>Courses</span></a>
		<a href="Insert%20Update%20Delete%20Search%20Videos.php"><i class="far fa-eye"></i><span>Videos</span></a>
        <a href="mail.php"><i class="far fa-comment"></i><span>Mail</span></a>
        <a href="admin/"><i class="fas fa-comment"></i><span>Chat</span></a>
        <a href="users.php"><i class="far fa-eye"></i><span>view users</span></a>
        <a href="live%20search.php"><i class="far fa-eye"></i><span>view cart</span></a>
	</div>

	<div class="content"></div>
</body>
</html>