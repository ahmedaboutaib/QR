<?php
include_once "includes/class_autoloader.inc.php";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="css/main.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <title>test</title>
</head>
<body>
    <?php include_once "navbar.php" ?>
    <div class="container">
    <h1>categories</h1>
    <form action="index.php" method="post">
    <button name="all" type="submit" class="btn m-1 btn-primary">All</button>
    <?php $catObj = new Categories();
    $cats = $catObj->getAllCat();
     foreach($cats as $cat ) { ?>
     
    <button value="<?php echo $cat['cat_id'] ?>" name="cat_id" type="submit" class="btn m-1 btn-primary"><?php echo $cat['cat_name'] ?></button>
    <?php } ?></form>
    </div>
    <div class="container mt-3 d-flex flex-column justify-content-center">
        
    <h1>produits</h1>
    <?php
     if(!isset($_POST["cat_id"]) || isset($_POST["all"])){$prodObj = new Products(); 
    $prods = $prodObj->getAllProducts();
     foreach($prods as $prod ) { ?>
<form action="contr.php" method="post">
        <div  class="row  border-bottom pb-2 pt-2 ">
            <div class="col-auto" style="width:188px">
                <img src="<?php echo $prod['product_image'] ?>" height="100px" wdith="150px" class="rounded" alt="" srcset="">
            </div>
            <div style="max-width:50%;" class="col-auto d-flex flex-column justify-content-between ">
                <div style="font-size: 0.9rem" class=" d-inline-block text-truncate fw-bold">
<?php echo $prod['product_name'] ?>
                </div>
                <div class="fw-bold"><span><?php echo $prod['product_price'] ?> </span>DHs</div>

                <input type="hidden" name="product_id" value="<?php echo $prod['product_id'] ?>">
                <div class="d-flex flex-end gap-2">
                <div class="form-outline" style="width: 5rem;">
    <input type="number" id="form1" class="form-control" name="qte" value="1" placeholder="Qte" />

</div>
                    <button type="submit" name="order_product" class="btn btn-warning"><img width="20px" src="img/shopping-cart.png" alt="" srcset=""></button>

                </div>

                </div>
            </div></form>
            <?php }}else{ $prodObj = new Products(); 
           $order_id = $_POST["cat_id"];
    $prods = $prodObj->getProductByCat($order_id);
     ?>
ijsmijfmjezofi
        <div class="row">
  <?php foreach($prods as $prod ) {?>
    <div class="col-sm-6 col-md-12">
      <form action="contr.php" method="post">
        <div class="card">
          <img src="<?php echo $prod['product_image'] ?>" class="card-img-top">
          <div class="card-body">
            <h5 class="card-title"><?php echo $prod['product_name'] ?></h5>
            <p class="card-text">Price: <?php echo $prod['product_price'] ?> DHs</p>
            <input type="hidden" name="product_id" value="<?php echo $prod['product_id'] ?>">
            <div class="form-group">
              <label for="qty">Quantity:</label>
              <input type="number" id="qty" name="qty" class="form-control" value="1" min="1">
            </div>
            <button type="submit" name="order_product" class="btn btn-primary">Add to Cart</button>
          </div>
        </div>
      </form>
    </div>
  <?php } }?>
</div>
                
  <?php include_once"footer.php" ?>