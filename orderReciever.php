<?php 


if(isset($_SERVER["REQUEST_METHOD"])) {
    if($_SERVER["REQUEST_METHOD"] === "POST") {
        
        require "./classes.php";
 
        session_start();

        $cart = json_decode($_POST["cart"]);     
        $date = $_POST["date"]; 

        $newOrder = new Order($date, $cart);
        
        $_SESSION["order"] = $newOrder;
     
        

        echo json_encode($newOrder);
        
        
      /*   echo json_encode(unserialize($_SESSION["sign"])); */

    }
}



?>