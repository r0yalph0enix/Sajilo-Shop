<!DOCTYPE>
<?php

session_start();

include("functions/functions.php");

//include_once "functions.php";


?>

<html>
 <head>
 	<meta charset="UTF-8">
	  <title>Sample document</title>
	  <link rel="stylesheet" href="css/style.css">
	  <link rel = "stylesheet" href = "css/bootstrap.min.css">
	  <link rel="stylesheet" href="css/brown.css">
	  <link rel="stylesheet" href="css/loginForm.css">
	  <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  </head>
  <body background = "image/bg3.jpg">
  	<div class = "container">
  		<div class = "row">
  			<div class = "col-md-5">

  			</div>
  			<div class = "col-md-7">
  				<img src = "image/heading2.png">
  			</div>
  		</div>
		<div class = "row">
			<div class = "col-lg-12">
				<hr>
			</div>
		</div>
  		<div class = "row" style "display:flex;">
  			<div class = "col-md-3">
  			</div>
  			<div class = "col-md-9">
	  			<div class = "button"><a href="index.php">Home</a></div>
	  			<!-- <div class = "button"><a href="customer_login.php">Sign In</div>
	  			<div class = "button"><a href="customer_register.php">Sign Up</div> -->

	  			<?php
                        session_start();

                        if(!isset($_SESSION['customer_email']))
                        {
                            //echo "<a href='checkout.php' style='color:grey;font-family: Courier New;font-size: 18px'>Login</a>";
                            echo "<div class = 'button'><a href='customer_login.php'>Log In</div>";
                        }
                        else {
                            # code...
                            echo "<div class = 'button'><a href='my_account.php'>My Account</div>";
                            echo "<div class = 'button'><a href='logout.php'>Log Out</div>";
                        }

                 ?>
	  			<div class = "button"><a href="index.php">About Us</div>
	  			<div class = "button"><a href="index.php">Contact Us</div>
  			</div>
  		</div>

  		<div class = "row">
			<div class = "col-lg-12">
				<hr>
			</div>
		</div>

		<div class = "row">
			<div class = "col-md-12">
				<div id='brown'>
					<ul>

						 <?php
                        include_once "functions/functions.php";
                         $db->getCats(); ?>

					</ul>
				</div>
			</div>
		</div>

		<?php
           if(isset($_GET['add_cart']))
	        {
	            //global $con;

	            $con = mysqli_connect("localhost","root","root","ecommerce");

	            $ip = $db->getIp();
	            //$ip = $_SERVER['REMOTE_ADDR'];

	            $pro_id = $_GET['add_cart'];

	            $check_pro = "select * from cart where ip_add='$ip' AND p_id='$pro_id'";

	            $run_check = mysqli_query($con,$check_pro);

	            if(mysqli_num_rows($run_check)>0)
	            {
	                echo "";
	            }
	            else
	            {
	                $insert_pro = "insert into cart (p_id,ip_add) values ('$pro_id','$ip')";
	                $run_pro = mysqli_query($con,$insert_pro);

	                echo "<script>window.open('details.php?pro_id=$pro_id','_self')</script>";
	                echo "<b>This is Ip: $ip</b>";
	                //echo "<script>window.open('myphp.php','_self')</script>";

	            }
	        }
        ?>

		<div class = "row">
			<div class = "col-md-12">
				<div id = "shopping_cart">
					<span style="float:right; font-size: 15px; line-height: 40px;padding: 5px;  ">
						Shopping Cart- Total Items: <?php
                       include_once "functions/functions.php";
                        $db->total_items(); ?> Total Price: <?php
                       include_once "functions/functions.php";
                        $db->total_price(); ?>
						<a href = "cart.php" style = "color:grey;font-family: Courier New;font-size: 18px;"><b>Go to Cart</b></a>

                        <?php
                        //session_start();

                        if(!isset($_SESSION['customer_email']))
                        {
                            echo "<a href='checkout.php' style='color:grey;font-family: Courier New;font-size: 18px'>Login</a>";
                        }
                        else {
                            # code...
                            echo "<a href='logout.php' style='color:grey;font-family: Courier New;font-size: 18px'>Logout</a>";
                        }

                        ?>

					</span>
				</div>

				<div id="form">
					<form method = "get" action = "results.php" enctype="multipart/form-data">
						<input type = "text" size="75" name = "user_query" placeholder="Search a Product" />
						<input type="submit" name = "search" value = "Search" />
					</form>
				</div>

			</div>
		</div>

		<div class = "content_wrapper">
			<div id = "content_area">
				<div id="products_box">
					<?php

						if(isset($_GET['pro_id'])) {

							$product_id = $_GET['pro_id'];

							$con = mysqli_connect("localhost","root","root","ecommerce");

							$get_pro = "select * from products where product_id = '$product_id' ";

			                $run_pro = mysqli_query($con,$get_pro);

			                while($row_pro=mysqli_fetch_array($run_pro))
			                {

			                    $pro_id = $row_pro['product_id'];
			                    $pro_title  = $row_pro['product_title'];
			                    $pro_price = $row_pro['product_price'];
			                    $pro_image = $row_pro['product_image'];
			                    $pro_desc = $row_pro['product_desc'];

			                    echo "

			                        <div id='single_product'>

			                            <h3>$pro_title</h3>
			                            <img src='admin_area/product_images/$pro_image'/>

				                            <p><b> Price : $ $pro_price </b> </p>
				                            <p>$pro_desc</p>;

			                            <a href='index.php' style='float:left;'>Go Back</a>
			                            <a href='details.php?pro_id=$pro_id&add_cart=$pro_id'><button style='float:right'>Add to Cart </button></a>

			                        </div>

			                    ";
			                }
			            }
		            ?>
		        </div>
	        </div>
        </div>

	</body>
</html>
