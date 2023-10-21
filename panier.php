<?php
include_once "includes/class_autoloader.inc.php";
$t = 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>card</title>
</head>

<body>
<?php include_once "navbar.php" ?>
    <div class="container  d-flex flex-column align-items-center">

<h3 class="text-center pt-2 pb-2 fw-bold ">Panier</h3>
        <form action="contr.php" method="post">
       <?php  $orderedProductObj = new OrderedProduct();
       if(!isset($_COOKIE["order_id"]) ){ $orderedProducts = Array(); echo '<h1 style="color: grey;">Le Panier est vide !</h1>'; }
       else{
       $orderedProducts = $orderedProductObj->getAllOrderedProducts($_COOKIE["order_id"]);
       }
       foreach ($orderedProducts as $op) {
       ?>
    
 

        <div  class="row  border-bottom pb-2 pt-2 ">
            <div class="col-auto" style="width:170px">
                <img src="<?php echo $op['product_image'] ?>" height="100px" wdith="150px" class="rounded" alt="" srcset="">
            </div>
            <div  style="max-width:50%;" class="col-auto d-flex flex-column justify-content-between ">
                <div style="font-size: 0.9rem" class=" d-inline-block text-truncate fw-bold">
                    <?php echo $op['product_name'] ?>
                </div>
                <div class="fw-bold"><span><?php echo $op['product_price']?></span> DHs</div>
                <input type="hidden" value="<?php echo $op['product_price']*$op['qte'] ?>" name="total_price[]">
                <div class="fw"><?php echo "Qte :" .$op['qte'] ?></div>
                <div class="d-flex justify-content-around gap-2">
              <!--  <button name="incqte"  class="btn btn-success">+</button>-->
                <div class="form-outline" style="width: 2.5rem;">

</div>

<?php $t +=  $op['product_price']*$op['qte'];  ?>
                    
                  <!--  <button name="decqte" class="btn btn-danger">-</button> -->

</div>
                </div>
            </div>
              
            <?php } ?><?php if(!empty($orderedProducts)) { ?> <div class="fw-bold">Prix Total : <?php echo $t ?></div>
            <div class="w-100 d-flex justify-content-center pt-4 gap-2" >
            <button id="confirmOrder" class="btn btn-primary w-50"  type="submit" name="confirm_order">confirmer</button>
            <button id="confirmOrder" class="btn btn-outline-danger w-50"  type="submit" name="abort_order">Annuler</button>
            <?php }?>
            </div>
            </form>
            <div style="margin-bottom: 120px;" ></div>
        </div>
    

 <?php include_once "footer.php" ?>