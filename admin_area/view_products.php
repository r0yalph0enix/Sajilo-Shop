<table width="795" align="center" >

    <tr align="center">
        <td colspan="6"><h2 style="color:white;">View All Products Here</h2></td>
    </tr>
    <tr align="center">
        <th style="color:white;">Serial no.</th>
        <th style="color:white;">Title</th>
        <th style="color:white;">Image</th>
        <th style="color:white;">Price</th>
        <th style="color:white;">Edit</th>
        <th style="color:white;">Delete</th>
    </tr>
    <?php

    include("includes/db.php");
    //$con = mysqli_connect("localhost","root","root","ecommerce");
    if(!isset($_SESSION['user_email']))
    {
        echo "<script>window.open('login.php?not_admin=You are not Admin.','_self')</script>";
    }
    else {


    $get_pro = "select * from products";

    $run_pro = mysqli_query($con,$get_pro);

    $i=0;

    while($row_pro=mysqli_fetch_array($run_pro))
    {
        $pro_id = $row_pro['product_id'];
        $pro_title  = $row_pro['product_title'];
        $pro_price = $row_pro['product_price'];
        $pro_image = $row_pro['product_image'];
        $i++;


    ?>
    <tr align="center" >
        <td style="color:white;"><?php echo $i ?></td>
        <td style="color:white;"><?php echo $pro_title; ?></td>
        <td><img src="product_images/<?php echo $pro_image; ?>" width="60" height="60"/></td>
        <td style="color:white;"><?php echo $pro_price; ?></td>
        <td style="color:white;"><a href="index.php?edit_pro=<?php echo $pro_id; ?>">Edit</a></td>
        <td style="color:white;"><a href="index.php?delete_pro=<?php echo $pro_id; ?>">Delete</a></td>
    </tr>
    <?php } ?>
</table>

<?php } ?>
