<?php

include "includes/class_autoloader.inc.php";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>card</title>
</head>
<body>
    
<?php include_once "navbar.php" ?>
    <div class="container pb-4">
<h3 class="text-center pt-2 pb-2 fw-bold">Categories</h3>
    <form action="contr.php" method="post">
        <div class="row g-2 justify-content-center pt-4">
            <div class="col-6">
            <div class="input-group mb-3">
                
  <input type="text" class="form-control" name="category" placeholder="Category" aria-label="Category" aria-describedby="basic-addon1">
</div>
            </div>
            <div class="col-2">
<button class="btn btn-success" name="add_cat" type="submit" id="addCategory">ajouter</button>
            </div>
        </div></form>
    </div>
    <div class="container">
    <h3>Categories Disponible</h3>
    <?php $catObj = new Categories();
    $cats = $catObj->getAllCat();
     foreach($cats as $cat ) { ?>
<form action="contr.php" method="post">
        <div class="row g-2 justify-content-center align-items-center pt-4 pb-2 border-bottom">
            <input type="hidden" name="cat_id" value="<?php echo $cat['cat_id'] ?>">
            <div class="col-6">
                <span> <?php echo $cat['cat_name'] ?></span>
            </div>
            <div class="col-2">
<button class="btn btn-danger" type="submit" name="remove_cat" id="removeCategory" >supprimer</button>
            </div>
        </div>
    </form>
    <?php } ?>
</div>
<div style="height: 100px;" class="row"></div>
<?php include_once'footer.php' ?> 