<!DOCTYPE html>
<html>
<head>
	<title>PHP Simple Chat System using AJAX</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<link rel="stylesheet" href="logindesgin.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="box">
	<div class="well">
		<h2><center> Please Login</center></h2>
		<hr>
		<form method="POST" action="validation-signin.php">
		Username: <input type="text" name="username" class="form-control" required>	
		Password: <input type="password" name="password" class="form-control" required> 
		<input type="submit" value = "Submit" class="btn btn-primary"></button> No account? <a href="signup.php"> Sign up</a>
		</form>
			<center>
			<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE); 
				session_start();
				if(isset($_SESSION['msg'])){
					echo $_SESSION['msg'];
					unset($_SESSION['msg']);
				}
			?>
			</center>
		</div>
	</div>
</div>
</body>
</html>