<!DOCTYPE html>
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
	  			<?php
                        session_start();

                        if(!isset($_SESSION['customer_email']))
                        {
                            //echo "<a href='checkout.php' style='color:grey;font-family: Courier New;font-size: 18px'>Login</a>";
                            echo "<div class = 'button'><a href='SignIn.php'>Log In</div>";
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

		<div class="row">
	    	<div id="login-form">
	         	<h2>Welcome! Sign In Here</h2>
	         	<form method="post">
		           	<table align="center" border="0">
		         		<tr>
		               		<td><input type="text" name="email" placeholder="Enter Email" required /></td>
		         		</tr>
		         		<tr>
		         			<td><input type="password" name="pass" placeholder="Enter Password" required /></td>
		         		</tr>
						<p class="sig">
							<tr>
								<!-- <td><button class="button button2">Submit</button></td> -->
								<td><button type="submit" name="login">Submit</button></td>
							</tr>
							<tr>

								<td><h3><a href="SignUp.html">Sign Up Here</a></h3><td>
							</tr>
							<tr>
								<td><h4><a href="forgotpw.php">Forgot Password ? Click here</a></h4></td>
							</tr>
						</p>
					</table>
				</form>
			</div>
		</div>

	</div>

	<?php

    if(isset($_POST['login']))
    {
        $c_email = $_POST['email'];
        $c_pass = $_POST['pass'];

        $sel_c = "select * from customers where customer_pass='$c_pass' AND customer_email='$c_email'";

        $run_c = mysqli_query($con,$sel_c);

        $check_customer = mysqli_num_rows($run_c);

        if(!$check_customer)
        {
            echo "<script>alert('Password or email is incorrect. Please try again.')</script>";
            exit();
        }

        $ip=$db->getIp();

        $sel_cart = "select * from cart where ip_add='$ip'";
        $run_cart = mysqli_query($con,$sel_cart);
        $check_cart = mysqli_num_rows($run_cart);

        if($check_customer>0 AND $check_cart==0)
        {
            $_SESSION['customer_email'] = $c_email;

            echo "<script>alert('You logged in successfully. Thank You.')</script>";
            echo "<script>window.open('my_account.php','_self')</script>";
        }
        else {
            # code...
            $_SESSION['customer_email'] = $c_email;

            echo "<script>alert('You logged in successfully. Thank You.')</script>";
            echo "<script>window.open('checkout.php','_self')</script>";
        }
    }


    ?>

</body>


</html>
