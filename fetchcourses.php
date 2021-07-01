<html>
<head>
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
      <?php
        <?php
$connect = mysqli_connect("localhost", "root", "", "lms");
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
	SELECT * FROM courses 
	WHERE courseName LIKE '%".$search."%'
	";
}
else
{
	$query = "
	SELECT * FROM cart ORDER BY userId ASC";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<div id=myModal class=modal>

       <!-- Modal content -->
       <div class=modal-content>
        <span class=close>&times;</span>
         <table class = table table-hover>
      <tr> 
          <th> Contact Id </th>
          <th> User Email </th>
          <th> Subject </th>
          <th> Content </th>
      </tr>
      '
    <?php
      $result = mysqli_query($conn, "SELECT * FROM courses ORDER BY courseId ASC");
      while($res = mysqli_fetch_array($result))
      {
          print "<tr>";
          print "<td>".$res['contact_id']."</td>";
          print "<td>".$res['user_email']."</td>";
          print "<td>".$res['subject']."</td>";
          print "<td>".$res['content']."</td>";
          print "</tr>";
      }

    $output .='    
    </table>
        </div>

       </div>    
';
	echo $output;
}
else
{
	echo 'Data Not Found';
}
?>
        
        
        ?>
    </body>


</html>