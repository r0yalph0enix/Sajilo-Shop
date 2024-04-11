<!DOCTYPE>
<?php
//include("functions/functions.php");
session_start();

include_once "functions.php";
include("includes/db.php");


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
	  			<div class = "button"><a href="SignIn.html">Sign In</div>
	  			<div class = "button"><a href="SignUp.html">Sign Up</div>
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
						<a href = "cart.php" style = "color: #ffcccc;font-family: Courier New;font-size: 18px;;"><b>Go to Cart</b></a>
					</span>
				</div>
			</div>
		</div>

        <div class = "content_wrapper">
			<div id = "content_area">
				<div id = "products_box">


                    <form action="customer_register.php" method="post" enctype="multipart/form-data"/>
                        <table align = "center" width = "750" >
                            <tr align="center">
                                <td colspan="6"><h2>Create an account</h2></td>
                            </tr>

                            <tr>
                                <td align="right">Customer Name:</td>
                                <td><input type="text" name="c_name" required/></td>
                            </tr>

                            <tr>
                                <td align="right">Customer Email:</td>
                                <td><input type="text" name="c_email" required/></td>
                            </tr>

                            <tr>
                                <td align="right">Customer Password</td>
                                <td><input type="password" name="c_pass" required/></td>
                            </tr>

                            <tr>
                                <td align="right">Customer Image</td>
                                <td><input type="file" name="c_image" required/></td>
                            </tr>

                            <tr>
                                <td align="right">Customer Address:</td>
                                <td><input type="text" name="c_address" required/></td>
                            </tr>

                            <tr>
                                <td align="right">Customer Contact</td>
                                <td><input type="text" name="c_contact" required/></td>
                            </tr>

                            <tr align="center">
                                <td align="center"><input type="submit" name="register" value="Create Account"/></td>
                            </tr>

                        </table>
                    </form>

	            </div>
	        </div>
	    </div>


</body>
</html>

<?php

    if(isset($_POST['register']))
    {
        session_start();
        $con = mysqli_connect("localhost","root","root","ecommerce");

        $ip=$db->getIp();

        $c_name = $_POST['c_name'];
        $c_email = $_POST['c_email'];
        $c_pass = $_POST['c_pass'];
        $c_image = $_FILES['c_image']['name'];
        $c_image_tmp = $_FILES['c_image']['tmp_name'];
        $c_address = $_POST['c_address'];
        $c_contact = $_POST['c_contact'];

        move_uploaded_file($c_image_tmp,"customer/customer_images/$c_image");

        $insert_c = "insert into customers (customer_ip,customer_name,customer_email,customer_pass,customer_address,customer_contact,customer_image) values ('$ip','$c_name','$c_email','$c_pass','$c_address','$c_contact','$c_image')";

        $run_c = mysqli_query($con,$insert_c);

        /*if($run_c)
        {
            echo "<script>alert('Registration Successful!')</script>";
        }*/

        $sel_cart = "select * from cart where ip_add='$ip'";
        $run_cart = mysqli_query($con,$sel_cart);
        $check_cart = mysqli_num_rows($run_cart);

        if(!$check_cart)
        {
            $_SESSION['customer_email'] = $c_email;

            echo "<script>alert('Account has been created successfully. Thank You.')</script>";
            echo "<script>window.open('customer/my_account.php','_self')</script>";
        }
        else {
            # code...
            $_SESSION['customer_email'] = $c_email;

            echo "<script>alert('Account has been created successfully. Thank You.')</script>";
            echo "<script>window.open('checkout.php','_self')</script>";
        }

    }

?>
