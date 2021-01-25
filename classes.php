<?php 

class Product {
    function __construct($name, $price, $descr, $img){
        $this->name = $name;
        $this->price = $price;
        $this->descr = $descr;
        $this->img = $img;
    }



}

class Order {
    function __construct($date, $products){
        $this->date = $date;
        $this->products = $products;
    }

/*     function totalsum();
    function totalProducts(); */

}


?>