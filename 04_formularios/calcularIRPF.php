<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    require("../05_funciones/irpf.php");
    ?>

</head>
<body>


<form action="" method="post">
<label for="salario">Salario</label>
<input type="text" name="salario" id="">
<input type="submit" value="Enviar">

</form>






<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    /*
    El servidor ejecutará este código cuando reciba una solicitud post.
    */

$_salario_tmp = $_POST["salario"];
$salario=0;
if(filter_var($_salario_tmp, FILTER_VALIDATE_FLOAT) !== FALSE){
    if($_salario_tmp > 0){
        $salario=$_salario_tmp;
    }else{
        echo "Introduce un numero mayor a 0<br>";
    }

}else{
    echo "Introduce un valor numérico<br>";
}



echo("El salario después de impuestos es: ". IRPF($salario) );




//40000 => 29400
//70000 => 47598 



/*match (true) {
      $_salario <=12450 =>  $IRPF = $_salario*0.19,
      $_salario >12450 && $_salario <= 20199 =>  $IRPF = $_salario*0.24,
      $_salario >=20200 && $_salario <= 35199 => $IRPF = $_salario*0.30,
      $_salario >=35200 && $_salario <= 59999 =>  $IRPF = $_salario*0.37,
      $_salario >=60000 && $_salario <= 299999 =>  $IRPF = $_salario*0.45,
      $_salario >=300000  =>  $IRPF = $_salario*0.47
};*/
}
?>



    
</body>
</html>