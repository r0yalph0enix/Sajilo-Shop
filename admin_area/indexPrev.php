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
                   <li class='has-sub'><a href='index.php?insert_product'><span>Insert New Product</span></a></li>
                   <li class='has-sub'><a href='index.php?insert_cat'><span>Insert New Category<</span></a></li>
                   <li class='has-sub'><a href='index.php?insert_brand'><span>Insert New Brand</span></a></li>
                </ul>
            </li>
            <li><a href="#">View</a>
              <ul>
                   <li class='has-sub'><a href='index.php?insert_product'><span>View All Products</span></a></li>
                   <li class='has-sub'><a href='index.php?insert_cat'><span>View All Categories<</span></a></li>
                   <li class='has-sub'><a href='index.php?insert_brand'><span>View All Brands</span></a></li>
                   <li class='has-sub'><a href='index.php?insert_brand'><span>View Customers</span></a></li>
                   <li class='has-sub'><a href='index.php?insert_brand'><span>View Orders</span></a></li>
                   <li class='has-sub'><a href="index.php?view_payments"><span>View Payments</span></a></li>
                </ul>
            </li>          
            <li><a href="logout.php"><span>Admin Logout</span></a></li>
  	  			
            <li><a href="index.php?view_products">View All Products</li>
  	  			<li><a href="index.php?insert_cat">Insert New Category</li>
  	  			<li><a href="index.php?view_cats">View All Categories</li>
  	  			<li><a href="index.php?insert_brand">Insert New Brand</li>
            <li><a href="index.php?view_brands">View All Brands</li>
            <li><a href="index.php?view_customers">View Customers</li>
            <li><a href="index.php?view_orders">View Orders</li>
            <li><a href="index.php?view_payments">View Payments</li>
            <li><a href="logout.php">Admin Logout</li>
					</ul>
				</div>
                <div id="left">
                    <?php

                        if(isset($_GET['insert_product']))
                        {
                            include("insert_product.php");

                        }
                        if(isset($_GET['view_products']))
                        {
                            include("view_products.php");
                        }
                        if(isset($_GET['insert_cat']))
                        {
                            include("insert_cat.php");
                        }

                    ?>
                </div>
			</div>
		</div>


</div>

</body>
</html>
