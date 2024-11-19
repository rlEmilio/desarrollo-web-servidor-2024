


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );    
    ?>

 <style>
        .error{
            color: red;
        }

 </style>
</head>
<body>
    
<?php

IF($_SERVER["REQUEST_METHOD"] == "POST"){

$tmp_titulo = $_POST["titulo"];
$tmp_genero = $_POST["genero"];
$tmp_descripcion = $_POST["descripcion"];
$tmp_fecha = $_POST["fecha_estreno"];
$tmp_duracion = $_POST["duracion"];


/*----TITULO----*/
if($tmp_titulo == ""){
    $error_titulo="El título no puede estar vacío";
}
else if(strlen($tmp_titulo)>100){
    $error_titulo="El título no puede tener mas de 100 carácteres";   
}
else{
$patron = "/^[a-zA-Z0-9\s]+$/";
    if(!preg_match($patron, $tmp_titulo)){
        $error_titulo="El título solo puede estar formado por letras, números y espacios"; 
    }else{
        $titulo = trim($tmp_titulo);
    }
}
 var_dump($titulo);

/*-----GENERO-----*/
if($tmp_genero == ""){
    $error_genero = "Selecciona un género";
}else{
    $generos = ["accion","comedia","drama","ciencia_ficcion","romance","documental"];
    if(!in_array($tmp_genero,$generos)){
        $error_genero = "Selecciona un género válido";
    }else{
        $genero = $tmp_genero;
    }
}

 

/*----DESCRIPCION----*/
if($tmp_descripcion!=""){
    if(strlen($tmp_descripcion)>500){
        $error_descripcion = "La descripción no puede superar los 500 carácteres";
    }
    else{
        $patron = "/^[a-zA-Z0-9\.\s\,]+$/";
        if(!preg_match($patron,$tmp_descripcion)){
            $error_descripcion = "La descripción solo puede estar formada por letras, números, espacios, puntos y comas";
        }else{
            $descripcion = $tmp_descripcion;
        }
    }
}



/*----FECHA DE ESTRENO----*/
if($tmp_fecha==""){
    $error_fecha = "Por favor, elija una fecha";
}else{
    $patron = "/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/";
    if(!preg_match($patron,$tmp_fecha)){
        $error_fecha = "La fecha debe estar en formato YYYY-MM-DD";
    }
    else{
        list($anoUser,$mesUser,$diaUser) = explode("-",$tmp_fecha);
        $anoActual = date("Y");
        $mesActual = date("m");
        $diaActual = date("d");

        if($anoUser <= 1900){
            $error_fecha = "La fecha debe ser posterior a 1900";

        }else if($anoUser > $anoActual){
            $error_fecha = "la fecha no puede ser mayor a la actual";
            
        }else if($anoUser == $anoActual){
            //comprobar mes
            if($mesUser > $mesActual){
                $error_fecha = "la fecha no puede ser mayor a la actual";
            }else if($mesUser == $mesActual){
                //comprobar dia
                if($diaUser > $diaActual){
                    $error_fecha = "la fecha no puede ser mayor a la actual";
                }else{
                    $fecha_estreno = $tmp_fecha;
                }

            }else{
                $fecha_estreno = $tmp_fecha;
            }

        }else{
            $fecha_estreno = $tmp_fecha;
        }

        
    }
}


/*-----DURACION-------*/
if($tmp_duracion==""){
    $error_duracion="La duración no puede estar vacía";
}
else{
    if(filter_var($tmp_duracion, FILTER_VALIDATE_INT)===false){
        $error_duracion = "la duración tiene que ser numérica expresada en minutos";
    }else{
        if($tmp_duracion < 1 || $tmp_duracion > 300){
            $error_duracion = "La duración tiene que estar entre 1 y 300 minutos";
        }else{
            $duracion = $tmp_duracion;
        }
    }
}


}


?>


<!-----FORMULARIO------->

<div class="container">
    <h2>Formulario de películas</h2>
    <br>

<form class="col-4" action="" method="post">

<!--TITULO -->
    <div class="mb-4">
        <label class="form-label" for="titulo">Título</label>
        <input class="form-control" type="text" name="titulo">
        <?php if(isset($error_titulo)) echo("<span class='error'>$error_titulo</span>") ?>
    </div>

<!--GENERO-->
    <div class="mb-4">
        <label class="form-label" for="genero">Género</label>
        <select class="form-select" name="genero" id="">
            <option value="accion">Acción</option>
            <option value="comedia">Comedia</option>
            <option value="drama">Drama</option>
            <option value="ciencia_ficcion">Ciencia Ficción</option>
            <option value="romance">Romance</option>
            <option value="documental">Documental</option>
        </select>
        <?php if(isset($error_genero)) echo("<span class='error'>$error_genero</span>") ?>
    </div>

<!--DESCRIPCION-->
    <div class="mb-4">
        <label class="form-label" for="descripcion">Descripción</label>
        <textarea class="form-control" placeholder="Escribe una descripción aquí" name="descripcion" id=""></textarea>
        <?php if(isset($error_descripcion)) echo("<span class='error'>$error_descripcion</span>") ?>
    </div>

<!--FECHA DE ESTRENO-->
    <div class="mb-4">
        <label class="form-label" for="fecha_estreno">Fecha de estreno</label>
        <input class="form-control" type="date" name="fecha_estreno">
        <?php if(isset($error_fecha)) echo("<span class='error'>$error_fecha</span>") ?>
    </div> 

<!--DURACION-->
    <div class="mb-4">
        <label class="form-label" for="duracion">Duración</label>
        <input class="form-control" type="number" name="duracion">
        <?php if(isset($error_duracion)) echo("<span class='error'>$error_duracion</span>") ?> 
    </div>


    <input class="form-submit" type="submit" value="Enviar">

</form>

</div>

<sstyleeyt src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>