<?php

class Products extends Dbh {


    public function  addProduct(string $name, string $image, float $price, int $cat){
        $sql = "insert into product(product_image, product_name, product_price, cat_id , show_product) values (?, ?, ?, ?, ?)";
        $params = array($image, $name, $price, $cat, true);
        $stmt = $this->connect()->prepare($sql);
        $result = $stmt->execute($params);
        if(!$result){
            die("connot add product");
        }

    }
    public function deleteProduct($id, $product_image){
        $sql1 = "select count(*) as 'num_prod' from ordered_product where product_id =  '$id'";
        $rs = $this->connect()->query($sql1);
        $num_oprod = $rs->fetchColumn();
        if($num_oprod == 0 ){
            $sql = "delete from product where product_id = '$id';";
            $this->connect()->query($sql);
            unlink("../".$product_image);
        }
        else{
            $sql2 ="UPDATE product SET show_product = false WHERE product_id = '$id' ;";
            $this->connect()->query($sql2);

        }
}

    
    public function getAllProducts(){
        $sql = "select *  from product  where show_product = true";
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
    public function getProductByCat($cat_id){
        $sql = "select u.* from product as u, category as c where c.cat_id = u.cat_id and u.show_product = true and c.cat_id = '$cat_id'";
        $stmt = $this->connect()->query($sql);
        $result = $stmt->fetchAll();
        return $result;

    }
 
}