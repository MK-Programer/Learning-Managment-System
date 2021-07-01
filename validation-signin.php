<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
	include('conn.php');
	session_start();
	function check_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $d = "SELECT photo FROM user WHERE uname='".$_POST["uname"]."'";
		$_SESSION["image"]=$row["image"]; 
            
		$username=check_input($_POST['username']);
		
		if (!preg_match("/^[a-zA-Z0-9_]*$/",$username)) {
			$_SESSION['msg'] = "Username should not contain space and special characters!"; 
			header('location: index.php');
		}
		else{
			
		$fusername=$username;
		
		$password = check_input($_POST["password"]);
		$fpassword=md5($password);
		
		$query=mysqli_query($conn,"select * from `user` where username='$fusername' and password='$fpassword'");
		
		if(mysqli_num_rows($query)==0){
			$_SESSION['msg'] = "Login Failed, Invalid Input!";
			header('location: Signin.php');
		}
		else{
			
			$row=mysqli_fetch_array($query);
			if ($row['access']==1){
                $_SESSION['id']=$row['userid'];
                $_SESSION['uname']=$row['uname'];
				?>
				<script>
					window.location.href='Insert Update Delete Search Admin.php';
				</script>
				<?php
			}
			else if ($row['access']==2) {
				$_SESSION['id']=$row['userid'];
                $_SESSION['uname']=$row['uname'];
				?>
				<script>
					window.location.href='home page.php';
				</script>
				<?php
			}
            else if ($row["access"]==3) {
				$_SESSION['id']=$row['userid'];
                $_SESSION['uname']=$row['uname'];
				?>
				<script>
					window.location.href="hr/Hr Home Page.php";
				</script>
				<?php
			}
            else if ($row["access"]==4) {
				$_SESSION['id']=$row['userid'];
                $_SESSION['uname']=$row['uname'];
				?>
				<script>
					window.location.href="auditor/";
				</script>
				<?php
			}
            
          
		}
		
		}
	}
?>