<?php
include_once "includes/class_autoloader.inc.php";
include_once "includes/func.inc.php";

// for categories 


    $cat = new Categories();
    $product = new Products();
    $orderedProduct= new OrderedProduct();
    $order = new Order();
if(isset($_POST["add_cat"])){
    $cat_name = $_POST["category"];
    $cat->addCat($cat_name);
    header("Location: category.php");

}
if(isset($_POST["remove_cat"])){
    $cat_id = $_POST['cat_id'];
    $cat->removeCat($cat_id);
    header("Location: category.php");


}
if(isset($_POST["add_product"])){
    $product_image = $_FILES["product_image"];
    $product_name = $_POST["product_name"];
    $product_price =(float)$_POST["product_price"];
    $cat_id = $_POST["cats"];
    $file = uploadFile($product_image);

    $product->addProduct($product_name, $file, $product_price , $cat_id);
    header("Location: product.php");

    
}
if(isset($_POST["remove_product"])){
    $product_id = $_POST["remove_product"];
    $product_name = $_POST["product_name"];
    $product_image = $_POST["product_image"];
    $product->deleteProduct($product_id, $product_image);
   // header("Location: product.php");
}
if(isset($_POST["order_product"])){
    $product_id = $_POST["order_product"]["id"];
    $qte = $_POST["order_product"]["qte"];
  $order_id = 0; 
//setcookie('order_id', $order_id, time() - (86400*30), "/");
    if(isset($_COOKIE["order_id"])){
        $order_id = $_COOKIE["order_id"];
    }
    else{

        $order_id = $order->createOrder();
setcookie('order_id', $order_id, time() + (86400*30), "/");
    }
    
    $orderedProduct->orderProduct($product_id,  $qte, $order_id);
    header("Location: index.php");
}
if(isset($_POST["productCat"])){
    if ($_POST["productCat"] == "all") {

    echo json_encode($product->getAllProducts());
    }
    else{

    $cat_id = $_POST["productCat"];
    echo json_encode($product->getProductByCat($cat_id));
    }
            
}
if(isset($_POST["confirm_order"])){
    $orderedProductObj = new OrderedProduct();
      $t  = $_POST["total_price"];
      
      $totalPrice = array_sum($t);

    if(isset($_COOKIE["order_id"])){
        $order_id = $_COOKIE["order_id"];
       $order->updateTotalPrice($order_id, $totalPrice);
       $orderedProducts = $orderedProductObj->getAllOrderedProducts($_COOKIE["order_id"]);
        if(!empty($orderedProducts)){
            setcookie('order_id', $order_id, time() - (86400*30), "/");
        }
        
    }
    header("Location: index.php");
            
}
// abort commande

if(isset($_POST["abort_order"])){
    
    
      

    if(isset($_COOKIE["order_id"])){
        $orderedProduct->deleteOrderedProductByOrderId($_COOKIE["order_id"]);
       setcookie('order_id', $order_id, time() - (86400*30), "/");
       setcookie('num_product', "", time() - (86400*30), "/");
        
        header("Location: index.php");
    }
   header("Location: index.php");
            
}


// end
if(isset($_POST["categories"])){
    $arr = json_decode($_POST["categories"]);

   echo json_encode($arr);
}
if(isset($_POST["getAllCategories"])){
    echo json_encode($cat->getAllCat());
}
if(isset($_POST["getProductByCat"])){
    echo json_encode($cat->getAllCat());
}
if(isset($_POST["call-server"])){
    $coordination = $_POST["type"].":".$_POST["code"];
    $msg = $_POST["msg"];
    $callObj = new ClientCall();
    $call = $callObj->makeCall($coordination, $msg);
    header("Location: client.php?server-call=success");
}
if(isset($_POST["call"])){
    $callObj = new ClientCall();
    $call = $callObj->all();
echo json_encode($call);
}
if(isset($_POST["confirm_call"])){
    
    $callObj = new ClientCall();
    $call = $callObj->delete($_POST["confirm_call"]);
}
if(isset($_POST["num_calls"])){
    $callObj = new ClientCall();
    $call = $callObj->nb();
    echo json_encode($call);
}