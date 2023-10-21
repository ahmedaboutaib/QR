<?php
include_once "includes/class_autoloader.inc.php";
include_once "includes/func.inc.php";

// for categories 


    $cat = new Categories();
    $product = new Products();
    $orderedProduct= new OrderedProduct();
    $order = new Order();



if(isset($_POST["cat_id"])){
    $cat_id =  $_POST["cat_id"];
    echo json_encode($product->getProductByCat($cat_id));

}