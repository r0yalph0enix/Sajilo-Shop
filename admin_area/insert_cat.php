<form action="" method="POST" style="padding:80px;">

<b>Insert New Category: </b>
<input type="text" name="new_cat" required/>
<input type="submit" name="add_cat" value="Add Category" />


</form>

<?php

    include("includes/db.php");
    if(!isset($_SESSION['user_email']))
    {
        echo "<script>window.open('login.php?not_admin=You are not Admin.','_self')</script>";
    }
    else {

    if(isset($_POST['add_cat']))
    {
        $new_cat = $_POST['new_cat'];

        $insert_cat = "insert into categories (cat_title) values ('$new_cat')";

        $run_cat = mysqli_query($con,$insert_cat);

        if($run_cat)
        {
            echo "<script>alert('Category has been inserted !')</script>";
            echo "<script>window.open('index.php?insert_cat','_self')</script>";
        }
    }


?>

<?php } ?>
