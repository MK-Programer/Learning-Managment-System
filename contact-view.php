<?php 
error_reporting(E_ERROR | E_WARNING | E_PARSE); 
session_start();
include 'conn.php';
 $searchQuery = "SELECT `email` FROM user WHERE userid = '".$_SESSION['id']."'";
 $searchResult = mysqli_query($conn, $searchQuery); 

 $email = "";
 while($row = mysqli_fetch_array($searchResult))
 { 
    $email = $row['email'];
 }
         
?>
<html>
 <head>
 <title>Contact Us Form</title>	
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
  <style>
   .modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
text-align: right;
  color: #aaaaaa;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}   
  </style>     
 </head>
  <body>
      <?php include "Menu Bar.html";?>  
      
    <div class="container-contact-100" style = "margin-left:350px; margin-top:100px;">
     <div class="contact100-map" id="google_map" data-map-x="40.722047" data-map-y="-73.986422" data-pin="images/icons/map-marker.png" data-scrollwhell="0" data-draggable="1"></div>  
     <input type="button" onclick="view()" id = "myBtn"  Value="View Messages" class="contact100-form-btn"> 
      <div id="myModal" class="modal">

       <!-- Modal content -->
       <div class="modal-content">
        <span class="close">&times;</span>
         <table class = "table table-hover">
      <tr> 
          <th> Contact Id </th>
          <th> User Email </th>
          <th> Subject </th>
          <th> Content </th>
      </tr>
    <?php
      $result = mysqli_query($conn, "SELECT * FROM tblcontact WHERE user_email = '$email'   ORDER BY contact_id ASC");
      while($res = mysqli_fetch_array($result))
      {
          print "<tr>";
          print "<td>".$res['contact_id']."</td>";
          print "<td>".$res['user_email']."</td>";
          print "<td>".$res['subject']."</td>";
          print "<td>".$res['content']."</td>";
          print "</tr>";
      }
    ?>
    </table>
        </div>

       </div>    
      <div class="wrap-contact100">
			<span class="contact100-form-symbol">
				<img src="images/icons/symbol-01.png" alt="SYMBOL-MAIL">
			</span>
        <form name="frmContact" id="" frmContact"" method="post"
            action="email-conn.php" enctype="multipart/form-data" class="contact100-form validate-form flex-sb flex-w"
            onsubmit="return validateContactForm()">
            
            <span class="contact100-form-title">Drop Us A Message</span>
            
            <div class="wrap-input100  validate-input" data-validate = "Email is required : e@a.z">
             <input type="text" class="input100"  name="userEmail" id="userEmail" placeholder="Email Address" value = <?php print $email;?> readonly/>
             <span class="focus-input100"></span>    
            </div>
            
            <div class="wrap-input100">
             <input type="text" class="input100" name="subject" id="subject" placeholder="Subject / optional" />
             <span class="focus-input100"></span>    
            </div>
            
            <div  class="wrap-input100 validate-input" data-validate = "Message is required">>
             <textarea name="content" id="content" class="input100" cols="60" rows="6" placeholder="Write Us A Message" required></textarea>
             <span class="focus-input100"></span>    
            </div>
            <div class="container-contact700-form-btn">
                <input type="submit" name="send" class="contact100-form-btn"
                    value="Send" />

               <div id="statusMessage"> 
                        <?php
                        if (isset($_SESSION['err_msg'])) {
                            ?>
                          <p> <?php echo ''; ?></p>
                     <?php
                        }
                         else{
                          ?>
                          <p> <?php echo $_SESSION['err_msg']; ?></p>
                    
                   <?php
                             unset($_SESSION['err_msg']);
                         }
                            
                        ?>
                    </div>
            </div>
        </form>
        </div>  
    </div>
   <div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes"></script>
	<script src="js/map-custom.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-23581568-13');
        var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
	</script>
      
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"
        type="text/javascript"></script>
    <script type="text/javascript">
</script>
</body>
</html>