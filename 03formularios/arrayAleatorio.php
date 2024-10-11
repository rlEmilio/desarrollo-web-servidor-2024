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


<?php
$numeros = [1,5,3,9,3,15,3,6,2,7];

?>

<form action="" method="post">
    <label for="numero">Numero</label>
    <input type="text" name="numero">
    <input type="submit" value="Enviar">



</form>


<?php



if($_SERVER["REQUEST_METHOD"]=="POST"){
    /*
    El servidor ejecutará este código cuando reciba una solicitud post.
    */
 
$mayor=0;
$numero = $_POST["numero"];

for($i=0;$i<count($numeros);$i++){
    if($numeros[$i]>$mayor){
        $mayor=$numeros[$i];
    }
}


if($numero==$mayor){
    echo"<h1>Has acertado!!!</h1>";
}else{
    
    echo"<h1>Prueba otra vez!!!</h1>";
}
}

?>

    
</body>
</html>