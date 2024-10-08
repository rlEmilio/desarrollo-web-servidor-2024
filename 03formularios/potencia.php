<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form action="" method="post">
<input type="text" name="numero1"> 
<input type="text" name="numero2">
<input type="submit" value="Enviar">


</form>

<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    /*
    El servidor ejecutará este código cuando reciba una solicitud post.
    */
    $numero1 = (int)$_POST["numero1"];
    $numero2 = (int)$_POST["numero2"];
    var_dump($numero1);    
    var_dump($numero2);
    $resultado=1;
   
   if($numero2 == 0){
    $resultado=1;
   }else{
    for($i=0;$i<$numero2;$i++){
        $resultado*=$numero1;

       
    }
   }

   
    echo("El resultado de $numero1 ^ $numero2 es: ".$resultado);
}

?>


</body>
</html>