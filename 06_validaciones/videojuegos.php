<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    $error_titulo = "";
    $error_descripcion = "";
    $error_consola = "";
    $error_fecha = "";
    
    ?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>

    <?php

    /*
    titulo entre 1 y 60 caracteres, letras o numeros

    consola (radio button) ps4, ps5, swicht, xbox series x, sbox series s, pc

    descripcion (text area) opcional y maximo 255 caracteres, solo admite letras y numeros o comas y puntos

    fecha de lanzamiento entre el 1 de enero de 1947 y dentro de 10 años

    */

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

     
        //------TITULO-------
        $tmp_titulo = $_POST["titulo"];

        if($tmp_titulo == ""){
            $error_titulo = "El título no puede estar vacio"; //si el titulo está vacio mostramos el error
        }else{
            //si el titulo tiene contenido creamos el patron y comparamos con el input
            //he añadido espacios en el patron
            $patron = "/^[a-zA-Z0-9\s]{1,60}$/";    
            if(!preg_match($patron, $tmp_titulo)){
            $error_titulo = "El título debe tener entre uno y sesenta carácteres, letras o números";  //si el patron no coincide = error
            }else{    
                $titulo = $tmp_titulo; //si el patron coincide guardamos el titulo
            }
        }


        //-----CONSOLA------
        //compruebo si se ha realizado el post (si hay alguna opcion marcada)
        if(!empty($_POST["consola"])){
            $consola = $_POST["consola"];   
        }else{
            $error_consola = "Elige una opción";
        }
          

               
          
        //-------DESCRIPCION-------
        //como es opcional, solo compruebo patron si la descripción no está vacía
        $tmp_descripcion =  $_POST["descripcion"];
        if($tmp_descripcion != ""){ 
            $patron = "/^[a-zA-Z0-9,.\n\s]{0,255}$/";
            
            if(!preg_match($patron, $tmp_descripcion)){
            $error_descripcion = "La descripción debe tener como máximo 255 carácteres, incluyendo letras, números, puntos y comas";  //si el patron no coincide = error
            }else{    
                $descripcion = $tmp_descripcion; //si el patron coincide guardamos la descripcion
            }
        }
     
        

        //------FECHA LANZAMIENTO------
        $tmp_fecha = $_POST["fecha"];

        if($tmp_fecha == ""){    //si la fecha está vacía = error
            $error_fecha = "La fecha no puede estar vacía";
        }else{
            $fecha_actual = date("Y-m-d");  
            list($ano_actual,$mes_actual,$dia_actual) = explode('-',$fecha_actual); //divido fecha actual
            list($ano_usuario,$mes_usuario,$dia_usuario) = explode('-',$tmp_fecha); //divido fecha usuario

            if($ano_usuario < 1947 || $ano_usuario > ($ano_actual+10)){
                $error_fecha = "El año de lanzamiento no puede ser menor a 1947 ni mayor a 10 años en el futuro";
            }else{
                $fecha = $tmp_fecha;
            }

        }
    }
    ?>

<h1>Formulario videojuegos</h1>

    <form action="" method="post">
        <label for="titulo">Titulo</label>
        <input type="text" name="titulo">
        <?php if(!isset($titulo)){
            echo $error_titulo;
        }  ?>
        <br><br>
        <label for="consola">Consola: </label>
        <input type="radio" name="consola" value="PC"> 
        PC
        <input type="radio" name="consola" value="ps4">
        Ps4
        <input type="radio" name="consola" value="ps5">
        Ps5
        <input type="radio" name="consola" value="seriesX">
        Xbox Series X
        <input type="radio" name="consola" value="seriesS">
        Xbox Series S
        <input type="radio" name="consola" value="switch">
        Nintento Switch
        <?php if(!isset($consola)){
            echo $error_consola;
        }  ?>
        <br><br>
        <label for="descripcion">Descripción</label>
        <textarea name="descripcion"></textarea>
        <?php if(!isset($descripcion)){
            echo $error_descripcion;
        }  ?>
        <br><br>
        <label for="fecha">Fecha lanzamiento</label>
        <input type="date" name="fecha">
        <?php if(!isset($fecha)){
            echo $error_fecha;
        }  ?>
        <br><br>
        <input type="submit" value="enviar">


    </form>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>