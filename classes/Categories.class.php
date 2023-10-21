<?php


class Categories extends Dbh{

    public function addCat($name){
        $sql = "insert into category(cat_name) values (?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$name]);
        if(!$stmt){
           //query failed, get the error
           $error = $this->connect()->errorInfo();
           //log or display the error
           die(  print_r($error));
        }
}
    public function removeCat($id){
        $sql = "delete from category where cat_id = '$id'";
        $stmt = $this->connect()->query($sql);
           if(!$stmt){
           //query failed, get the error
           $error = $this->connect()->errorInfo();
           //log or display the error
           die(  print_r($error));
        }
    }
    public function getAllCat(){
        $sql = "select *  from category ";
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
    public function getCatId(){}

}