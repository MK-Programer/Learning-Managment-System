<?php   
 //index.php  
 session_start();  
 include 'conn.php';  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>LMS | Courses</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <style>  
               body{
                   background-image: url(img/hero-bg.png);
                   /* Center and scale the image nicely */
                   
                   background-repeat: no-repeat;
                   background-size: cover;
               }*/
               
               #dragable_product_order{
                   margin-top: 100px;
                   margin-left: 40px;
                   
                   
               }
               .product_drag_area{
                   margin-left:700px;
                   font-family: sans-serif;
                   font-size: 25px;
                   color: white;
               }
           </style>  
      </head>  
      <body>  
         
          <div class="container">
            
              
           <div class="row">
              <?php include "Menu Bar.html";?>
                
                <?php  
                $query = "SELECT * FROM courses ORDER BY courseId ASC";  
                $result = mysqli_query($conn, $query);  
                if(mysqli_num_rows($result) > 0)  
                {  
                     while($row = mysqli_fetch_array($result))  
                     {  
                ?>  
                <div class="col-md-3">  
                    <ul style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px; cursor:move" align="center">  
                        <img name  src="<?php echo "Course_Images/".$row["courseImage"]; ?>" data-id="<?php echo $row['courseId']; ?>" data-name="<?php echo $row['courseName']; ?>" data-price="<?php echo $row['coursePrice']; ?>" class="img-responsive product_drag" />  
                          <h4 class="text-info"><?php echo $row["courseName"]; ?></h4>  
                          <h4 class="text-danger"><?php echo $row["coursePrice"]; ?>$</h4>  
                     </ul>  
                </div>  
                <?php  
                     }  
                }  
                ?>  
                <div style="clear:both"></div>  
                  </div>
                <br />  
                
           </div>
            <div>  
             <div class="product_drag_area">Drop Product Here</div>  
            </div>   
          <div id="dragable_product_order" style = "color:white;">  
                </div> 
       
             <br /> 
          
      </body>  
 </html>  
 <script>  
 $(document).ready(function(data){  
      $('.product_drag_area').on('dragover', function(){  
           $(this).addClass('product_drag_over');  
           return false;  
      });  
      $('.product_drag_area').on('dragleave', function(){  
           $(this).removeClass('product_drag_over');  
           return false;  
      });  
      $('.product_drag').on('dragstart', function(e){  
           e.originalEvent.dataTransfer.setData("id", $(this).data("id"));  
           e.originalEvent.dataTransfer.setData("name", $(this).data("name"));  
           e.originalEvent.dataTransfer.setData("price", $(this).data("price"));  
      });  
      $('.product_drag_area').on('drop', function(e){  
           e.preventDefault();  
           $(this).removeClass('product_drag_over');  
           var id = e.originalEvent.dataTransfer.getData('id');  
           var name = e.originalEvent.dataTransfer.getData('name');  
           var price = e.originalEvent.dataTransfer.getData('price');  
           var action = "add";  
           $.ajax({  
                url:"action.php",  
                method:"POST",  
                data:{id:id, name:name, price:price, action:action},  
                success:function(data){  
                     $('#dragable_product_order').html(data);  
                }  
           })  
      });  
      $(document).on('click', '.remove_product', function(){  
           if(confirm("Are you sure you want to remove this product?"))  
           {  
                var id = $(this).attr("id");  
                var action="delete";  
                $.ajax({  
                     url:"action.php",  
                     method:"POST",  
                     data:{id:id, action:action},  
                     success:function(data){  
                          $('#dragable_product_order').html(data);  
                     }  
                });  
           }  
           else  
           {  
                return false;  
           }  
      });  
 });  
     $(document).ready(function(){
	load_data();
	function load_data(query)
	{
		$.ajax({
			url:"fetchcourses.php",
			method:"post",
			data:{query:query},
			success:function(data)
			{
				$('#result').html(data);
			}
		});
	}
	
	$('#search_text').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data(search);
		}
		else
		{
			load_data();			
		}
	});
});
 </script>  
