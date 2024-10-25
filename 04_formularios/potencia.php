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
<input type="hidden" name="accion" value="formulario_potencia">
<input type="submit" value="Enviar">


</form>

<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    /*
    El servidor ejecutará este código cuando reciba una solicitud post.
    */

    if($_POST["accion"]=="formulario_potencia"){
        $tmp_base = $_POST["numero1"];
        $tmp_exponente = $_POST["numero2"];
        $base=0;
        $exponente=0;
        
        if(filter_var($tmp_base, FILTER_VALIDATE_INT) !== FALSE){
            $base = $tmp_base;
        }else{
            echo"no es un número<br>";
        }
            
        if(filter_var($tmp_exponente, FILTER_VALIDATE_INT) !== FALSE){
           if($tmp_exponente>0){
            $exponente=$tmp_exponente;
           }else{
            echo "el exponente debe ser mayor a 0<br>";
           }
        }else{
            echo "no es un número<br>";
        }
            $resultado=1;
           
           
            for($i=0;$i<$exponente;$i++){
                $resultado*=$base;
        
               
            }

    }
    

   
    echo("El resultado de $base ^ $exponente es: ".$resultado);
}

?>


</body>
</html>