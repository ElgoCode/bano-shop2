<?php
include "./includes/header.php";
?>


<?php
    // cheack if the user is logged in
    // cheack if the item and price and img are set 
    if(isset($_SESSION["user"]) && isset($_GET["item"]) && isset($_GET["price"]) && isset($_GET["img"])){
        // make variables for each one of them
        $user_id = $_SESSION["user_id"];
        $item = $_GET['item'];
        $price = $_GET['price'];
        $location = $_GET['location'];
        // so we can get back to the same page that we where in
        $img =$location.'/'. $_GET['img'].".png";
        // insert data into database basket table
        $query = "INSERT INTO basket ( user_id ,item_id,price,img,items_number) VALUES('$user_id','$item','$price','$img','1')";

        if (mysqli_query($conn, $query)) {
            header('Location: '."/mysite"."/".$location.".php");
        } 
        else {
            header('Location: '."/mysite/login.php");
        }
    }
    else {
        header('Location: '."/mysite/login.php");
    }
?>






<?php
include "./includes/footer.php";
?>