 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>Settings</title>
    <style>
      a{
        text-decoration:none;
      }
      
    </style>
 </head>
 <body>
    
<h3 class="text-center pt-2 pb-2 fw-bold ">Utilités</h3>
 <div class="container col px-4">
  <div class="row gap-2">
 <div class="card col">
  <div class="card-body">
    <a href="./product.php" class="d-flex flex-column align-items-center">

                <img src="img/shipping.png"  width="90px" alt="" srcset="">
                <div>produits</div>
    </a>
  </div>
</div>
 <div class="card col">
  <div class="card-body">
    <a href="./category.php" class="d-flex flex-column align-items-center">

                <img src="img/application.png"  width="90px" alt="" srcset="">
                <div>categories</div>
    </a>
  </div></div>
</div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<?php include_once('navbar.php'); ?>
 </body>
 </html>