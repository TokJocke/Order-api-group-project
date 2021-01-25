<?php 


if(isset($_SERVER["REQUEST_METHOD"])) {
    if($_SERVER["REQUEST_METHOD"] === "POST") {
        
        require "./classes.php";
 
        $cart = $_POST["cart"];     
        $date = $_POST["date"]; 


      
        $newOrder = new Order($date, $cart);

        echo json_encode($newOrder);

    }
}



?>