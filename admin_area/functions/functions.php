<?php

class dbhelper
{
    private $con;

    /*$con = mysqli_connect("localhost","root","root","ecommerce");
    if(mysqli_connect_errno())
    {
        echo "Failed to connect to MySql: " . mysqli_connect_errno();
    }*/

    function getIp()
    {
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];

        if(filter_var($client, FILTER_VALIDATE_IP))
        {
            $ip = $client;
        }
        elseif(filter_var($forward, FILTER_VALIDATE_IP))
        {
            $ip = $forward;
        }
        else
        {
            $ip = $remote;
        }

        return $ip;
    }


    function cart()
    {

        if(isset($_GET['cat']))
        {
            $cat_id=$_GET['cat'];
        }

        if(isset($_GET['add_cart']))
        {
            //global $con;

            $con = mysqli_connect("localhost","root","root","ecommerce");

            $ip = $this->getIp();
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

                echo "<script>window.open('showProduct.php?cat=$cat_id','_self')</script>";
                echo "<b>This is Ip: $ip</b>";
                //echo "<script>window.open('myphp.php','_self')</script>";

            }
        }
    }

    function total_items()
    {
        if(isset($_GET['add_cart']))
        {
            //global $con;

            $con = mysqli_connect("localhost","root","root","ecommerce");

            $ip = $this->getIp();

            $get_items = "select * from cart where ip_add='$ip'";

            $run_items = mysqli_query($con,$get_items);

            $count_items = mysqli_num_rows($run_items);
        }
        else
        {
            //global $con;

            $con = mysqli_connect("localhost","root","root","ecommerce");

            $ip = $this->getIp();

            $get_items = "select * from cart where ip_add='$ip'";

            $run_items = mysqli_query($con,$get_items);

            $count_items = mysqli_num_rows($run_items);

        }

        //echo $count_items."<br>";
        echo $count_items;
    }

    function total_price()
    {
        $total = 0;

        //global $con;

        $con = mysqli_connect("localhost","root","root","ecommerce");

        $ip = $this->getIp();

        $sel_price = "select * from cart where ip_add='$ip'";

        $run_price = mysqli_query($con,$sel_price);

        while($p_price = mysqli_fetch_array($run_price))
        {
            $pro_id = $p_price['p_id'];

            

            $pro_qty = $p_price['qty'];

            $pro_price = "select * from products where product_id='$pro_id'";

            $run_pro_price = mysqli_query($con,$pro_price);

            //while($pp_price = mysqli_fetch_array($run_pro_price))
            //{
                $pp_price = mysqli_fetch_array($run_pro_price);

                $product_price = $pp_price['product_price'];
                //$product_price = array($pp_price['product_price']);

                $product_title = $pp_price['product_title'];

                $product_image = $pp_price['product_image'];

                $single_price = $pp_price['product_price'];

                //$values = array_sum($product_price);

                $temp_tot = $single_price * $pro_qty;

                $total+=$temp_tot;
            //}
        }

        echo "$" . $total."<br>";
    }



    // Getting the categories

    function getCats()
    {
        //global $con;

        $con = mysqli_connect("localhost","root","root","ecommerce");

        $get_cats = "select * from categories";

        $run_cats = mysqli_query($con,$get_cats);

        //echo "The Categories are: <br><br>";

        while($row_cats = mysqli_fetch_array($run_cats))
        {
            $cat_id = $row_cats['cat_id'];
            $cat_title = $row_cats['cat_title'];

            echo "<li> <a href='showProduct.php?cat=$cat_id'>$cat_title</a></li>";

            //echo $cat_title;
            //echo "<br>";

            //echo "bleh";


        }
        echo "<br>";

    }

    // Getting the brands

    function getBrands()
    {
        //global $con;

        $con = mysqli_connect("localhost","root","root","ecommerce");

        $get_brands = "select * from brands";

        $run_brands = mysqli_query($con,$get_brands);

        echo "The Brands are: <br><br>";


        while($row_brands = mysqli_fetch_array($run_brands))
        {
            $brand_id = $row_brands['brand_id'];
            $brand_title = $row_brands['brand_title'];

            //echo "<li> <a href='index.php?brand=$brand_id'>$brand_title"</a></li>;

            echo $brand_title;
            echo "<br>";

            //echo "bleh";


        }

    }

    //getting products randomly

    function getPro()
    {
        if(!isset($_GET['cat']))
        {
            if(!isset($_GET['brand']))
            {
                //global $con;

                $con = mysqli_connect("localhost","root","root","ecommerce");


                $get_pro = "select * from products order by RAND() LIMIT 0,6";

                $run_pro = mysqli_query($con,$get_pro);

                while($row_pro=mysqli_fetch_array($run_pro))
                {
                    $pro_id = $row_pro['product_id'];
                    $pro_cat = $row_pro['product_cat'];
                    $pro_brand = $row_pro['product_brand'];
                    $pro_title  = $row_pro['product_title'];
                    $pro_price = $row_pro['product_price'];
                    $pro_image = $row_pro['product_image'];

                    echo "

                        <div id='single id'>

                            <h3>$pro_title</h3>
                            <img src='admin_area/product_images/$pro_image' width='180' height='180'/>
                            <p><b> Price : $ $pro_price </b> </p>
                            <a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
                            <a href='myphp.php?add_cart=$pro_id'> <button style='float:right'>Add to Cart </button></a>

                        </div>

                    ";
                }
            }

        }


    }

    //getting category products

    function getCatPro()
    {
        if(isset($_GET['cat']))
        {
            $cat_id=$_GET['cat'];

            //global $con;

            $con = mysqli_connect("localhost","root","root","ecommerce");


            $get_cat_pro = "select * from products where product_cat='$cat_id'";

            $run_cat_pro = mysqli_query($con,$get_cat_pro);

            $count_cats = mysqli_num_rows($run_cat_pro);

            if(!$count_cats)
            {
                echo "<h2><style='padding:20px;>There is no product in this category</h2>";
                exit();
            }

            while($row_cat_pro=mysqli_fetch_array($run_cat_pro))
            {
                $pro_id = $row_cat_pro['product_id'];
                $pro_cat = $row_cat_pro['product_cat'];
                $pro_brand = $row_cat_pro['product_brand'];
                $pro_title  = $row_cat_pro['product_title'];
                $pro_price = $row_cat_pro['product_price'];
                $pro_image = $row_cat_pro['product_image'];

				echo "

                    <div id='single id'>

                        <h3>$pro_title</h3>
                        <img src='admin_area/product_images/$pro_image' width='180' height='180'/>
                        <p><b> Price : $ $pro_price </b> </p>
                        <a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
                        <a href='showProduct.php?cat=$cat_id&add_cart=$pro_id'> <button style='float:right'>Add to Cart </button></a>

                    </div>

                ";
                //<a href='#?pro_id=$pro_id'> <button style='float:right'>Add to Cart </button></a>

            }

        }
    }

    //getting brand products

    function getBrandPro()
    {
        if(isset($_GET['brand']))
        {
            $brand_id=$_GET['brand'];

            //global $con;

            $con = mysqli_connect("localhost","root","root","ecommerce");


            $get_brand_pro = "select * from products where product_brand='$brand_id'";

            $run_brand_pro = mysqli_query($con,$get_brand_pro);

            $count_brands = mysqli_num_rows($run_brand_pro);

            if(!$count_brands)
            {
                echo "<h2><style='padding:20px;>There is no product in this brand.</h2>";
                exit();
            }

            while($row_brand_pro=mysqli_fetch_array($run_brand_pro))
            {
                $pro_id = $row_brand_pro['product_id'];
                $pro_cat = $row_brand_pro['product_cat'];
                $pro_brand = $row_brand_pro['product_brand'];
                $pro_title  = $row_brand_pro['product_title'];
                $pro_price = $row_brand_pro['product_price'];
                $pro_image = $row_brand_pro['product_image'];

                echo "

                    <div id='single id'>

                        <h3>$pro_title</h3>
                        <img src='admin_area/product_images/$pro_image' width='180' height='180'/>
                        <p><b> $ $pro_price </b> </p>
                        <a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
                        <a href='index.php?pro_id=$pro_id'> <button style='float:right'>Add to Cart </button></a>

                    </div>

                ";

            }

        }
    }

}


$db = new dbhelper();


 ?>
