<!DOCTYPE>
<?php

session_start();

include("var/www/html/ecommerce/functions/functions.php");

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

                            $user = $_SESSION['customer_email'];
                            $get_image = "select * from customer where customer_email = '$user'";

                            $run_img = mysqli_query($con,$get_img);

                            $row_img = mysqli_fetch_array($run_img);

                            $c_image = $row_img['customer_image'];

                            echo "<img src='customer_image/$c_image' width='150' height='150'/>";

                        ?>

						<li><a href="my_account.php?my_orders">My Orders</a></li>
                        <li><a href="my_account.php?edit_account">Edit Account</a></li>
                        <li><a href="my_account.php?change_pass">Change Password</a></li>
                        <li><a href="my_account.php?delete_account">Delete Account</a></li>

					</ul>
				</div>
			</div>
		</div>

		<?php
           include_once "/var/www/html/ecommerce/functions/functions.php";
           $db->cart();
        ?>

		<div class = "row">
			<div class = "col-md-12">
				<div id = "shopping_cart">
					<span style="float:right; font-size: 15px; line-height: 40px;padding: 5px;  ">
                        <?php
                            if(isset($_SESSION['customer_email']))
                            {
                                echo "<b>Welcome: </b>" . $_SESSION['customer_email'];
                            }

                        ?>

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
			</div>
		</div>


</body>
</html>
