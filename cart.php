<!DOCTYPE HTML>

<?php

session_start();
include("functions/functions.php");

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

						 <?php $db->getCats(); ?>

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
						Shopping Cart- Total Items: <?php $db->total_items(); ?> Total Price: <?php $db->total_price(); ?>
						<a href = "index.php" style = "color: grey;font-family: Courier New;font-size: 18px;;"><b>Back to Shop</b></a>

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
			</div>
		</div>

		<div class = "content_wrapper">
			<div id = "content_area">
				<div id = "products_box">

					<form action = "" method = "post" enctype = "multipart/form-data">
						<table align = "center" width = "700" bgcolor="skyblue">

							<tr align="center">
								<th>Remove</th>
								<th>Product(s)</th>
								<th>Quantity</th>
								<th>Total Price</th>
							</tr>

							<?php

								$ind = 0;

								$total = 0;

						        global $con;

						        $con = mysqli_connect("localhost","root","root","ecommerce");

						        $ip = $db->getIp();

						        $sel_price = "select * from cart where ip_add='$ip'";

						        $run_price = mysqli_query($con,$sel_price);

						        while($p_price = mysqli_fetch_array($run_price))
						        {
						            $pro_id = $p_price['p_id'];

						            $pro_qty = $p_price['qty'];
						            $_SESSION[$ind++] = $pro_id;

						            $pro_price = "select * from products where product_id='$pro_id'";

						            $run_pro_price = mysqli_query($con,$pro_price);

						            while($pp_price = mysqli_fetch_array($run_pro_price))
						            {
						                $product_price = array($pp_price['product_price']);

						                $product_title = $pp_price['product_title'];

						                $product_image = $pp_price['product_image'];

						                $single_price = $pp_price['product_price'];

						                $values = array_sum($product_price);

						                $temp_tot = $single_price * $pro_qty;

						                $total+=$temp_tot;

							?>

							<tr align="center">
								<td><input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>"/></td>
								<td> <?php echo $product_title; ?><br>
								<img src="admin_area/product_images/<?php echo $product_image; ?>" width = "60" height = "60"/>
								</td>
								<td><input type = "text" size = "4" name = "qty[]" value = "<?php echo $pro_qty ?>" /></td>
								

								<td><?php echo "$" .  $single_price; ?></td>
							</tr>

						<?php } } ?>

						<tr><td colspan = "4"><hr></td></tr>


						<tr >
							<td colspan = "3" align = "right"><b>Sub Total: </b></td>
							
							<td><?php $db->total_price();?> </td>

						</tr>

						<tr align="center">
							<td colspan="2"><input type="submit" name="update_cart" value="Update Cart" /></td>
							<td><input type="submit" name="continue" value="Continue Shopping" /></td>
							<td><a href="checkout.php" style="text-decoration: none; color : black; ">Checkout</a></td>							
						</tr>

						</table>
					</form>

					<?php
						//function updatecart() {

					        //global $con;

					        $con = mysqli_connect("localhost","root","root","ecommerce");

					        $ip = $db->getIp();

							if(isset($_POST['update_cart'])) {

								foreach ($_POST['remove'] as $remove_id) {
									# code...

									$delete_product = "delete from cart where p_id = '$remove_id' AND ip_add = '$ip'";
									$run_delete = mysqli_query($con, $delete_product);

									if($run_delete) {

										echo "<script>window.open('cart.php','_self')</script>";										
									}									

								}
								echo "quantites: ";
								$x = 0;
								foreach ($_POST['qty'] as $qty) {
									# code...							
									echo "<br>";
									echo $qty."<br>";										
									echo $_SESSION[$x]."<br>";
									$p = $_SESSION[$x];

									$update_qty = "update cart set qty = '$qty' where p_id = '$p' AND ip_add = '$ip'	";							
									$run_qty = mysqli_query($con, $update_qty);	
									$x++;									
								}								
									
								echo "<script>window.open('cart.php','_self')</script>";							
							}
												

							if(isset($_POST['continue'])) {
								echo "<script>window.open('index.php','_self')</script>";
							}

							//echo @$up_cart = updatecart();
						//}	

					?>


	            </div>
	        </div>
	    </div>

</body>
</html>
