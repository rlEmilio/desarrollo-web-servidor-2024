<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    ?>
</head>


<!--EJERCICIO 2: Realiza un formulario que reciba 3 números: a, b y c. Se mostrarán en una lista los múltiplos de c que se encuentren entre a y b.

Por ejemplo, si a = 3, b = 10, c = 2

Los múltiplos de 2 entre 3 y 10 son: 4, 6, 8 y 10-->
<body>

<h2>Múltiplos de c entre a y b</h2>

<form action="" method="post">
<label for="a">a</label>
<input type="number" name="a">
<label for="b">b</label>
<input type="number" name="b">
<label for="c">c</label>
<input type="number" name="c">
<input type="submit" value="Enviar">


</form>


<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    /*
    El servidor ejecutará este código cuando reciba una solicitud post.
    */
 $_numero1 = $_POST["a"];
 $_numero2 = $_POST["b"];
 $_numero3 = $_POST["c"];
 
 $resultado=" ";


   for($i=$_numero1;$i<$_numero2;$i++){
    if($i%$_numero3==0){
        
        if($i == $_numero2-1){
            $resultado = $resultado.$i;
        }
       else{
        $resultado = $resultado.$i.", ";
       }
    }
   }

   echo"<br>Los muĺtiplos del número ".$_numero3." son: ".$resultado;

}

?>

    
</body>
</html>