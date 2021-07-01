 <?php  
 //action.php  
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "lms";
    
 $conn = new mysqli($servername, $username, $password, $dbname);
 $total = 0;
 session_start();  
 if($_POST["action"] == "add")  
 {  
      if(isset($_SESSION['shopping_cart']))  
      {  
           $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");  
           if(!in_array($_POST["id"], $item_array_id))  
           {  
                $count = count($_SESSION["shopping_cart"]);  
                $item_array = array(  
                     'item_id'               =>     $_POST["id"],  
                     'item_name'               =>     $_POST["name"],  
                     'item_price'          =>     $_POST["price"],   
                );  
                $_SESSION["shopping_cart"][$count] = $item_array;  
           }  
           else  
           {  
                echo '<script>alert("Item Already Added")</script>';  
           }  
      }  
      else  
      {  
           $item_array = array(  
                'item_id'               =>     $_POST["id"],  
                'item_name'               =>     $_POST["name"],  
                'item_price'          =>     $_POST["price"],  
           );  
           $_SESSION["shopping_cart"][0] = $item_array;  
      }  
      echo make_cart_table();  
 }  
 if($_POST["action"] == "delete")  
 {  
      foreach($_SESSION["shopping_cart"] as $keys => $values)  
      {  
           if($values['item_id'] == $_POST["id"])  
           {  
                unset($_SESSION["shopping_cart"][$keys]); 
                $deleteQuery = "DELETE FROM `cart` WHERE courseId = {$_POST['id']}";
                try
                {
                  $deleteResult = mysqli_query($conn, $deleteQuery);
                }catch(Exception $ex){
                   print "error delete" .$ex->getMessage();  
                }
                echo make_cart_table();  
           }  
      }  
 }  
 function make_cart_table()  
 {  
      $output = '';  
      if(!empty($_SESSION["shopping_cart"]))  
      {  
           $itemPrice = 0;  
           $total = 0;
           $output .= '  
                <h3>Order Details</h3>  
                <div class="table-responsive">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="40%">Item Name</th>   
                               <th width="20%">Price</th>  
                               <th width="20%">Action</th>  
                          </tr>  
           ';  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                $output .= '  
                     <tr>  
                          <td>'.$values["item_name"].'</td>   
                          <td>'.$values["item_price"].'</td>  
                          <td><a href="#" class="remove_product" id="'.$values["item_id"]. '"><span class="text-danger">Remove</span></a></td>  
                     </tr>  
                ';  
                $GLOBALS['itemPrice'] = $values["item_price"];
                $total = $total + $values["item_price"];  
           }  
           $output .= '  
                <tr>  
                     <td colspan="2" align="right">Total</td>  
                     <td>$ <span id="total_price">'.number_format($total, 2).'</span><input type = button onclick = fn() class = "btn btn-primary"  style = "margin-left: 20px;" value = "Check out">
					  
					</a></td>  
                </tr>  
           </table>  
           ';  
      }  
      return $output;  
 }  
 ?> 
 <html>
  <body>
   <script>
     function fn(){
        <?php 
         
         $searchQuery = "SELECT * FROM cart WHERE userId = {$_SESSION['id']}" ;
         $searchResult = mysqli_query($conn, $searchQuery);
    
         if($searchResult)
         {
           if(mysqli_num_rows($searchResult))
           {
             while($row = mysqli_fetch_array($searchResult))
             {
                 $courseId = $row['courseId'];
                 if($courseId == $_POST['id'] || $_POST['name'] == ""){
                 exit();
             }
             }
           }
         }
         else
         {
             print "result error";
         }
         $courseImg = "";
         $searchQuery = "SELECT courseImage FROM courses WHERE courseId = '{$_POST['id']}'" ;
         $searchResult = mysqli_query($conn, $searchQuery);
         if($searchResult)
         {
           if(mysqli_num_rows($searchResult))
           {
             while($row = mysqli_fetch_array($searchResult))
             {
                 $GLOBALS['courseImg'] = $row["courseImage"]; 
             } 
           }
          }
         $userName = "";
         $searchQuery = "SELECT username FROM user WHERE userid = '{$_SESSION['id']}'" ;
         $searchResult = mysqli_query($conn, $searchQuery);

          while($row = mysqli_fetch_array($searchResult))
             {
                 $userName = $row["username"]; 
             } 
         
         
         $insertQuery = "INSERT INTO `cart`(`userId`, `userName`, `courseId`, `courseName`, `price`, `imgPath` ) VALUES ('{$_SESSION['id']}', '{$userName}' ,'{$_POST['id']}', '{$_POST['name']}', '$itemPrice', '$courseImg')";
         try
         {
          $insertResult = mysqli_query($conn, $insertQuery);
        }catch(Exception $ex){
           print "error insert" .$ex->getMessage();  
        }
         ?>
     }
     /*when refresh the page unset the session of shopping cart*/   
     function unset_filter_session() {
     <?php 
       if ( empty( $_SERVER['HTTP_X_REQUESTED_WITH'] ) || 'XMLHttpRequest' !== $_SERVER['HTTP_X_REQUESTED_WITH'] ) {
        //Reset sessions on refresh page, if not doing AJAX request
        unset( $_SESSION['shopping_cart'] );
       }
         ?>
     }   
        
   </script>
  </body>
 </html>