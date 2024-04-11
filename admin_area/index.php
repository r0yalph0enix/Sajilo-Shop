<?php

    session_start();

    if(!isset($_SESSION['user_email']))
    {
        echo "<script>window.open('login.php?not_admin=You are not Admin.','_self')</script>";
    }
    else {


?>

<!DOCTYPE>


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
        <div class = "col-md-12" align = "center">
          <div class = "button"><a href="index.php">ADMIN</a></div>
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

            <li><a href="#">Insert</a>
              <ul>
                   <li><a href='index.php?insert_product'><span>Insert New Product</span></a></li>
                   <li><a href='index.php?insert_cat'><span>Insert New Category</span></a></li>
                   <li><a href='index.php?insert_brand'><span>Insert New Brand</span></a></li>
                </ul>
            </li>
            <li><a href="#">View</a>
              <ul>
                   <li><a href='index.php?view_products'><span>View All Products</span></a></li>
                   <li><a href='index.php?view_cats'><span>View All Categories</span></a></li>
                   <li><a href='index.php?view_brands'><span>View All Brands</span></a></li>
                   <li><a href='index.php?view_customers'><span>View Customers</span></a></li>
                   <li><a href='index.php?view_orders'><span>View Orders</span></a></li>
                   <li><a href="index.php?view_payments"><span>View Payments</span></a></li>
                </ul>
            </li>
            <li><a href="logout.php"><span>Admin Logout</span></a></li>
					</ul>
				</div>
			</div>
		</div>

    <div class = "row" align = "center">
        <h2 style="color:white; text-align:center;"><?php echo @$_GET['logged_in']; ?></h2>
      <?php

          if(isset($_GET['insert_product']))
          {
              include("insert_product.php");

          }
          if(isset($_GET['view_products']))
          {
              include("view_products.php");
          }
          if(isset($_GET['edit_pro']))
          {
              include("edit_pro.php");
          }
          if(isset($_GET['delete_pro']))
          {
              include("delete_pro.php");
          }
          if(isset($_GET['insert_cat']))
          {
              include("insert_cat.php");
          }
          if(isset($_GET['view_cats']))
          {
              include("view_cats.php");
          }
          if(isset($_GET['edit_cat']))
          {
              include("edit_cat.php");
          }
          if(isset($_GET['view_customers']))
          {
              include("view_customers.php");
          }

      ?>
  </div>


</div>

</body>
</html>

<?php } ?>
