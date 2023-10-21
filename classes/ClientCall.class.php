<?php



class ClientCall extends Dbh{

    

   public function makeCall($coordination, $message=null) {

        $callQuery = "INSERT INTO `client_calls` (coordination, message) VALUES (?, ?);";
        $stmt = $this->connect()->prepare($callQuery);
        $stmt->execute([$coordination, $message]);
        
   }
   public function delete($callId){

        $sql = "delete from client_calls where call_id = '$callId';";
        $stmt = $this->connect()->query($sql);
   }
    public function all(){
        $sql = "SELECT * FROM client_calls order BY call_id";
            $stmt = $this->connect()->query($sql);
        if($stmt){
            $result = $stmt->fetchAll();
            return $result;

        }
        else{
           //query failed, get the error
           $error = $this->connect()->errorInfo();
           //log or display the error
           die( print_r( $error));
        }

   } 
public function nb(){
        $sql = "SELECT *  FROM client_calls";
            $stmt = $this->connect()->query($sql);
        if($stmt){
            $result = $stmt->rowCount();
            return $result;

        }
        else{
           //query failed, get the error
           $error = $this->connect()->errorInfo();
           //log or display the error
           die( print_r( $error));
        }

   } 
}