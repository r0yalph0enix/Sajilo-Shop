<!DOCTYPE>
<?php

session_start();

//include("functions/functions.php");

include_once "functions.php";


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
           include_once "functions/functions.php";
           $db->cart();
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
                        session_start();

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

		<div style = "border-style: hidden;border-color:white;">
			<h1>Top Categories</h>
	  		<div class = "row" style "display:flex;">
	  			<div class = "col-md-3 itm img-responsive">
	  				<a href="test.html"></a>
		  			<img src = "image/key2.jpg">
	  			</div>
	  			<div class = "col-md-3 itm img-responsive">
	  				<a href="test.html"></a>
	  				<img src = "image/guit.jpg">
	  			</div>
	  		</div>

	  		<div class = "row" style "display:flex;">
	  			<div class = "col-md-2"></div>
	  			<div class = "col-md-3 itm img-responsive">
	  				<a href="test.html"></a>
		  			<img src = "image/drm.png">
	  			</div>
	  			<div class = "col-md-3 itm img-responsive">
	  				<a href="test.html"></a>
	  				<img src = "image/mp.jpg">
	  			</div>
	  		</div>

	  		<div class = "row" style "display:flex;">
	  			<div class = "col-md-3 itm img-responsive">
	  				<a href="test.html"></a>
		  			<img src = "image/record.jpg">
	  			</div>
	  			<div class = "col-md-3 itm img-responsive">
	  				<a href="test.html"></a>
	  				<img src = "image/dj.jpg">
	  			</div>
	  		</div>

	  	</div>


</body>
</html>
