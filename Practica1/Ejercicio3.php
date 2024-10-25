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
    
 
    <form action="" method="post">
    <label for="numero">Numero</label>
    <input type="number" name="numero"> 
    <!--le pongo number para que obligue a meter numeros (aunque reciba string) --> 
    <select name="opcion" id="">
        <option value="par">Comprobar Par</option>
        <option value="primo">Comprobar Primo</option>
    </select>
    <input type="submit" value="Enviar">
    </form>



<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
$_numero = $_POST["numero"];   //me traigo numero y opcion
$_opcion = $_POST["opcion"];

if($_opcion == "par"){
    if($_numero%2==0){
        echo "<p>El número es par</p>";
    }
    else{
        echo "<p>El número es impar</p>";
    }
}

if($_opcion == "primo"){
    
    $primo = true;
    //recorro los valores entre 1 y el numero sin contar los extremos
    //si cualquier division entre esos valores da como resto 0 quiere decir que el numero
    //tiene mas divisores además de si mismo y 1.
    for($i=2;$i<$_numero && $primo;$i++){   //le he metido una condicion para salir del bucle
        if($_numero%$i==0){ //si el numero NO es primo
            $primo = false;
        }            
    }

    if($primo){
        echo "<p>El número es primo</p>";
    }else{
        echo "<p></p>El número no es primo</p>";
    }
}
}

?>


</body>
</html>