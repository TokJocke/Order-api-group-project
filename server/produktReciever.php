<?php 


if(isset($_SERVER["REQUEST_METHOD"])) {
    if($_SERVER["REQUEST_METHOD"] === "GET") {

      
   
         require "./server/classes.php";
        
         
        
        $dxracer = new Product("dxracer", "3000", "kör jätte bra", "bild");
        $secretlab = new Product("secretlab", "5000", "kör jätte bra", "bild");
        $hermanMiller = new Product("hermanMiller", "14000", "kör jätte bra", "bild");
        
        $allProducts = array($dxracer, $secretlab, $hermanMiller);
         
        /* $testOrder = array(array("product" => $hermanMiller, "quantity" => 3), array()); */

        

        echo json_encode($allProducts);
  
    
 

    }
}

?>