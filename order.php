<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Old orders</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="oldOrders">

        <?php 

            session_start();

           $myVar = $_SESSION["order"]; 

           
 
        

            foreach($myVar as $entry){
                
                foreach($entry as $value){
                    print_r($value->name . "<br>" . $value->price . "<br>" . "<br>");
                    
                }
                   
            }




                
    
            
/*             foreach($myVar as $entry => $value){
                
                for($i = 0; $i < count($value); $i++){
                        
                    for($i = 0; $i < count($value[$i]); $i++) {
                       
                        echo $value[$i]->name;
                   
                    }


                }
           
            }   */
        
                    

                /*     for($i = 0; $i < count($b); $i++) {
                       
                        echo $b[$i];
                    } */
                
            



 
        
        ?>



    </div>



</body>
</html>





<!--print "<pre>";
print_r($myVar);
print "</pre>"; -->