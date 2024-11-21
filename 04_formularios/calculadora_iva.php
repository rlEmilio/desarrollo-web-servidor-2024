<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );


    define("GENERAL", 1.21);

    define("REDUCIDO", 1.1);

    define("SUPERREDUCIDO", 1.04);
    ?>
</head>
<body>



<form action="" method="post">
    <label for="precio">Precio del producto</label>
    <input type="number" name="precio">
    <br>  <br>
    <label for="iva">Selecciona el tipo de iva</label>
    <select name="iva" id="iva">
        <option value="general">General</option>
        <option value="reducido">Reducido</option>
        <option value="superreducido">Superreducido</option>
    </select>
    <input type="submit" value="Calcular PVP">

</form>


<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    /*
    El servidor ejecutará este código cuando reciba una solicitud post.
    */


    $_precio = $_POST["precio"];
    $_iva = $_POST["iva"];


    $pvp = 0;
   if($_iva == "general"){
    $pvp = $_precio * GENERAL;
   }else if($_iva == "reducido"){
    $pvp = $_precio * REDUCIDO;
   }
   else{
    $pvp = $_precio * SUPERREDUCIDO;
   }


   echo $_iva;

   echo "<br>El precio de venta al público es: ".$pvp   ;
}
?>
    
</body>
</html>