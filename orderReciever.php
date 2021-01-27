<?php 


if(isset($_SERVER["REQUEST_METHOD"])) {
    if($_SERVER["REQUEST_METHOD"] === "POST") {
        
      require "./classes.php";

      session_start();

      $cart = json_decode($_POST["cart"]);     
      $date = $_POST["date"]; 

      

      $orderItemList = [];

      foreach($cart as $cartItem) {


        $name = $cartItem["product"]["name"];
        $price = $cartItem["product"]["price"];
        $descr = $cartItem["product"]["descr"];
        $img = $cartItem["product"]["img"];

        $product = new Product($name, $price, $descr, $img);

        $orderItem = new OrderItem($product, $cartItem["quantity"]);

        array_push($orderItemList, $orderItem);
      }


      
      $newOrder = new Order($date, $orderItemList);
      

      $orderList = unserialize($_SESSION["orders"]);
      array_push($orderList, $newOrder);
      $_SESSION["orders"] = serialize($orderList);
    
      

      echo json_encode($orderList);
        
        
      /*   echo json_encode(unserialize($_SESSION["sign"])); */

    } else if($_SERVER["REQUEST_METHOD"] === "GET") {
      
      
      
      echo json_encode(unserialize($_SESSION["orders"]));
    }
}



?>