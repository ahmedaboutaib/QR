<?php



class OrderedProduct extends Dbh {

  public  function orderProduct($product_id, $qte, $order_id){

    $addProductQuery = "INSERT INTO ordered_product(product_id, order_id, qte) VALUES ('$product_id', '$order_id', '$qte');";
    $stmt =  $this->connect()->query($addProductQuery);
    if(!$stmt){
        die("hi");
    }

    // Close the database connection
}

public function getAllOrderedProducts($order_id){
 $sql = "select  u.*  , sum(qte) as 'qte' 
         from product as u , ordered_product as op, customer_order as co 
         where u.product_id = op.product_id and op.order_id = co.order_id 
         and  u.show_product = true and co.order_id = '$order_id' group by u.product_id;
 ";
            $stmt = $this->connect()->query($sql);
        if($stmt){
            $result = $stmt->fetchAll();
            return $result;

        }else{
           //query failed, get the error
           $error = $this->connect()->errorInfo();
           //log or display the error
           die( print_r( $error));
        }
}
public function deleteOrderedProductByOrderId($order_id){
 $sql = "delete from ordered_product where order_id = '$order_id';";
        $stmt = $this->connect()->query($sql);

}
    }
