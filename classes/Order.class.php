<?php



class Order extends Dbh{

    

   public function createOrder($totalPrice = 0) {
$createOrderQuery = "INSERT INTO `customer_order` (total_price) VALUES ('$totalPrice');";
        $this->connect()->query($createOrderQuery);
        $getLastInserted = "SELECT order_id FROM  customer_order
ORDER BY order_id DESC
LIMIT 1";

        $stmt = $this->connect()->query($getLastInserted);
        $product = $stmt->fetch();
        return $product["order_id"];
   }
   public function updateTotalPrice($order_id, $totalPrice){
        $createOrderQuery = "update customer_order set total_price = '$totalPrice' where order_id = '$order_id';";
        $this->connect()->query($createOrderQuery);
   }
   public function getTotalPrice($order_id){
        $createOrderQuery = "select total_price from customer_order  where order_id = '$order_id';";
        $stmt = $this->connect()->query($createOrderQuery);
        $order = $stmt->fetch();
        return  $order["total_price"];
   }
}