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
<body>
    

<form action=""  method="post">
    <input type="text" name="producto">
    <input type="submit" value="Enviar">
    </form>
<?php
$productos = [

    ["Nintendo Switch",300],
    ["Playstation 5 slim",450],
    ["Playstation 5 pro",800],
    ["Xbox series S",300],
    ["Xbox series X",400]
    

];




//añadimos stock
for($i=0;$i<count($productos);$i++){
    $productos[$i][2] = rand(0,5);
}



?>

<br><br>
<table>

<thead>
<Caption>Tabla de productos</Caption>
    <tr>
    <th>Nombre</th>
    <th>Precio</th>
    <th>Stock</th>
    </tr>
</thead>


    <tbody>
    <?php
    foreach($productos as $producto){
        list($nombre, $precio, $stock) = $producto;
        echo("<tr>");
        echo("<td>$nombre</td>");
        echo("<td>$precio</td>");
        echo("<td>$stock</td>");
        echo("</tr>");

    }

    ?>


    </tbody>
</table>
<br><br>


<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    /*
    El servidor ejecutará este código cuando reciba una solicitud post.
    */
    $_producto = $_POST["producto"];
    
   $i=0;
   $encontrado = false;

   while($i<count($productos) && !$encontrado){
    if($productos[$i][0]==$_producto){
        $encontrado=true;
        $fila_producto=$i;
    }
$i++;

   }

   if($encontrado){
    echo"Tenemos ". $productos[$fila_producto][2]." unidades del producto ".$_producto;
   }
   else if($productos[$fila_producto][2]==0){ 
    echo"No queda stock de este producto";
   }else{
    echo("El producto no existe");
   }
   
    
}
?>




</body>
</html>