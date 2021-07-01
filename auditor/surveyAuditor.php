<style>
   
<?php include "Styles/surveyhr.css" ?> 
</style>
<div class="cc"><?php include "auditortwo.php"?></div>
<div class="register">

<form method="POST" action="">
    <div class="input-file">
    <input type="text" placeholder="Write Question Here" name="array[]"><span> +</span><br>
    <input type="submit" name="sub" value="Add Survey">
</div>

<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script>
    $(document).ready(function(){
        "use strict";
        $(".input-file").delegate("span", "click", function(){
       $("<br><input type='text' placeholder='Write Question Here' name='array[]'><span> +</span>").insertAfter($(this)); 
    });
    }); 
</script>
</form>
</div>

<?php 
 include "dB.php";

   if(isset($_POST['sub'])){
    foreach($_POST['array'] as $a){
        if($a == ''){
            echo '<script>alert("Error, Fill All requirments")</script>';
            return;
        }
    } 
      foreach($_POST['array'] as $a){
        $sql = mysqli_query($conn, "INSERT INTO Survey (email, question) VALUES ('$_SESSION[email]', '$a')");
    }
    echo '<script>alert("Done, Data Inserted successfully")</script>';

    header("refresh: 0.1");    
    return;
 } 


?>