<!DOCTYPE html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<link rel="stylesheet" href="signup-css.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="box">
	<div>
		<h2><center><span class="glyphicon glyphicon-user"></span> Sign Up</center></h2>
		<hr>
		<form method="POST" action="register-validation.php" enctype="multipart/form-data">

     
        upload a pictue:
        <input type="file" name="upload_pic" required>            
            
        Name: <input type="text" name="name" class="form-control" required>

            
            
        Email: <input type="text" name="email" class="form-control" required> 
		
		Username: <input type="text" name="username" class="form-control" required>
	
		Password: <input type="password" name="password" class="form-control" required> 

	
		
		<input type="submit" name = "signup" value = "Submit" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> <a href="index.php"> Back to Login</a>
		</form>
			<center>
			<?php
				session_start();
				if(isset($_SESSION['sign_msg'])){
					echo $_SESSION['sign_msg'];
					unset($_SESSION['sign_msg']);
				}
			?>
			</center>
		</div>
	
</div>
</body>
</html>