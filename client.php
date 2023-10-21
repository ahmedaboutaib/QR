<?php
include_once "includes/class_autoloader.inc.php";
$catObj = new Categories();
    $cats = $catObj->getAllCat();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="css/main.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
   <title>QR</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="d-flex flex-column align-items-center">
<?php if(isset($_GET["server-call"])){?>
    <div class="alert alert-success alert-dismissible fade show position-absolute " style="top: 50%;
    transform: translateY(-40% );" role="alert">
  <strong>Le serveur est en route pour vous</strong>, votre appel a été reçu avec succès.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
    
<?php } ?>
    <div class="container ">
<h3 class="text-center pt-2 pb-2 fw-bold">Nos Produits</h3>
    
   <div id="categories">
<button id="catBtn" data-id="all" class="btn btn-outline-primary rounded-pill mt-2">Tous</button>
    <?php foreach ($cats as $cat ) { ?>
<button id="catBtn" data-id="<?php echo $cat['cat_id'] ?>"  class="btn btn-primary rounded-pill mt-2"><?php echo $cat['cat_name'] ?></button>
    <?php } ?>
   </div> 
   








<div style="margin-bottom: 40px;" ></div>

<div id="client-side-products" class="container d-flex flex-column p-0" >
  
</div>




</div>


</div>
<div style="margin-bottom: 120px;" ></div>
     <?php include_once "client-navbar.php" ?>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
     <script src="js/client.js"></script>
       
</body>
</html>