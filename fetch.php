<?php
$connect = mysqli_connect("localhost", "root", "", "lms");
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
	SELECT * FROM cart 
	WHERE userId LIKE '%".$search."%' ||
        userName LIKE '%".$search."%' ||
        courseName LIKE '%".$search."%' ||
        price LIKE '%".$search."%'
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
	$output .= '<div class="table-responsive">
					<table class="table table bordered">
						<tr>
							<th> User Id </th>
                                                        <th> User Name </th>
                                                        <th> Course Name </th>
                                                        <th> Course Price </th>
						</tr>';
	while($res = mysqli_fetch_array($result))
	{
          $searchQuery = "SELECT username FROM user WHERE userid = '".$res['userId']."'";
          $searchResult = mysqli_query($connect, $searchQuery);
          while($row = mysqli_fetch_array($searchResult))
             {
                 $username = $row['username'];
               
             }
		$output .= '
			<tr>
				<td>'.$res['userId'].'</td>
				<td>'.$username.'</td>
				<td>'.$res['courseName'].'</td>
				<td>'.$res['price'].' $</td>
			</tr>
		';
	}
	echo $output;
}
else
{
	echo 'Data Not Found';
}
?>