<?php
include_once "includes/class_autoloader.inc.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Produits</title>
</head>
<body>
    <?php include_once "navbar.php" ?>

<div class="container">
<h3 class="p-2">Ajouter Un Produit</h3>
<form class="border pb-3 rounded" action="contr.php" method="post" enctype="multipart/form-data">
<div class="container">
    <label class="mt-4" for="product_name">Nom du Produit :</label>
<input class="form-control" name="product_name" id="product_name" type="text" placeholder="Nom du produit" aria-label="nom du produit">

    <label class="mt-3" for="product_price">Prix du Produit :</label>
<div class="input-group mb-3">
  <input type="text" name="product_price" id="product_price" class="form-control" aria-label="price in dhs">
  <span class="input-group-text">DHs</span>
</div>
    <label  for="product_price">Category :</label>
<select class="form-select" aria-label="categories" name="cats">
  <option selected>
    Categories
</option>
    <?php $catObj = new Categories(); 
    $cats = $catObj->getAllCat();
     foreach($cats as $cat ) { ?>

  <option value="<?php echo $cat['cat_id'] ?>"><?php echo $cat['cat_name'] ?></option>
    <?php } ?>
</select>
<div class="mt-2 mb-3">
  <label for="formFile" class="form-label">Inserer une image</label>
  <input class="form-control" name="product_image" type="file" id="formFile">
</div>
</div>
<center>
    <button class="btn btn-success w-50 mt-4" name="add_product" type="submit">Ajouter</button>
</center>
</form>
    
<div class="container ">
<h3 class="text-center pt-2 pb-2 fw-bold">Supprimer un produit</h3>
    
   <div id="categories">
<button id="catBtn" data-id="all" class="btn btn-outline-primary rounded-pill mt-2">Tous</button>
    <?php foreach ($cats as $cat ) { ?>
<button id="catBtn" data-id="<?php echo $cat['cat_id'] ?>"  class="btn btn-primary rounded-pill mt-2"><?php echo $cat['cat_name'] ?></button>
    <?php } ?>
   </div> 
   








<div style="margin-bottom: 40px;" ></div>

<div id="products" class="container d-flex flex-column p-0" >
  
</div>




</div>


<div style="margin-bottom: 120px;" ></div>
    <?php include_once "navbar.php" ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
      <script src="js/product.js"></script> 
</body>
</html>