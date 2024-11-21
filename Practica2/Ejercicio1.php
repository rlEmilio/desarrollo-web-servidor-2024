
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


//LOS ERRORES NO SE MUESTRAN A PARTIR DEL GÉNERO, NO SE POR QUÉ.


IF($_SERVER["REQUEST_METHOD"] == "POST"){

    $tmp_nombre = $_POST["nombre"];
    $tmp_peso = $_POST["peso"];
    if(!isset($_POST["genero"])){
        $genero = "Desconocido";
    }else{
        $tmp_genero = $_POST["genero"];
    }

    $tmp_tipo = $_POST["tipo"];
    $tmp_fecha = $_POST["fecha"];
    $tmp_descripcion = $_POST["descripcion"];


    /*---NOMBRE-----*/
    if($tmp_nombre == ""){
        $error_nombre="El nombre no puede estar vacío";
    }
    else if(strlen($tmp_nombre)<3 || strlen($tmp_nombre)>30){
        $error_nombre="El nombre tiene que tener entre 3 y 30 carácteres";   
    }
    else{
    $patron = "/^[a-zA-ZáéíóúÁÉÍÓÚñ\s]+$/";
        if(!preg_match($patron, $tmp_nombre)){
            $error_nombre="El nombre solo puede tener letras (Con o sin tilde y ñ)"; 
        }else{
            $nombre = trim($tmp_nombre);
        }
    }


    /*-----PESO-----*/
    if($tmp_peso==""){
        $error_peso="El peso no puede estar vacío";
    }
    else{
        if(filter_var($tmp_peso, FILTER_VALIDATE_FLOAT)===false){
            $error_peso = "El peso debe ser numérico";
        }else{
            if($tmp_peso < 0.1 || $tmp_peso > 999.99){
                $error_peso = "El peso tiene que estar entre 0,1 y 999,99";
            }else{
                $peso = $tmp_peso;
            }
        }
    }
   
    

    /*----GENERO----*/

    $arrayGenero = ["hembra", "macho"];
    if(!in_array($tmp_genero,$arrayGenero)){
        $error_genero = "Por favor, elige una opción válida";
    }else{
        $genero = $tmp_genero;
    }
 

  

    /*----TIPO----*/
    if($tmp_tipo == ""){
        $error_tipo = "Selecciona un tipo";
    }else{
        $tipos = ["agua","fuego","volador","planta","electrico"];
        if(!in_array($tmp_tipo,$tipos)){
            $error_tipo = "Selecciona un tipo válido";
        }else{
            $tipo = $tmp_tipo;
        }
    }



    /*----FECHA DE CAPTURA----*/

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

            if($anoUser < ($anoActual -30)){
                $error_fecha = "La fecha no debe ser posterior a 30 años en el pasado";

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
                        $fecha = $tmp_fecha;
                    }

                }else{
                    $fecha = $tmp_fecha;
                }

            }else{
                $fecha = $tmp_fecha;
            }
        }
    }



    /*----DESCRIPCION----*/
    if($tmp_descripcion!=""){
        if(strlen($tmp_descripcion)>200){
            $error_descripcion = "La descripción no puede superar los 200 carácteres";
        }
        else{
            $patron = "/^[a-zA-ZáéíóúÁÉÍÓÚñ\s]+$/";
            if(!preg_match($patron,$tmp_descripcion)){
                $error_descripcion = "la descripción solo puede tener letras (Con o sin tilde y ñ";
            }else{
                $descripcion = $tmp_descripcion;
            }
        }
    }
}


?>


<!-----FORMULARIO------->

<div class="container">
    <h2>Formulario de Pokemons</h2>
    <br>

<form class="col-4" action="" method="post">

<!--NOMBRE -->
    <div class="mb-4">
        <label class="form-label" for="nombre">Nombre</label>
        <input class="form-control" type="text" name="nombre">
        <?php if(isset($error_nombre)) echo("<span class='error'>$error_nombre</span>") ?>
    </div>

<!--PESO-->
    <div class="mb-4">
        <label class="form-label" for="peso">Peso</label>
        <input class="form-control" type="text" name="peso">
        <?php if(isset($error_peso)) echo("<span class='error'>$error_peso</span>") ?>
    </div>

<!--GENERO-->
    <div class="mb-4">
        <label class="form-label" for="genero">Género</label>
        <input class="form-check-input" type="radio" name="genero" value="hembra">
        <label class="form-check-label">Hembra</label>
        <input class="form-check-input" type="radio" name="genero" value="macho">
        <label class="form-check-label">Macho</label>
       
        <?php if(isset($error_genero)) echo("<span class='error'>$error_genero</span>") ?>
    </div>

<!--TIPO-->
    <div class="mb-4">
        <label class="form-label" for="tipo">Tipo</label>
        <select class="form-control" name="tipo" id="">
        <option value="agua">Agua</option>
        <option value="fuego">Fuego</option>
        <option value="volador">Volador</option>
        <option value="planta">Planta</option>
        <option value="electrico">Eléctrico</option>

        </select>
        <?php if(isset($error_tipo)) echo("<span class='error'>$error_tipo</span>") ?>
    </div> 

<!--FECHA DE CAPTURA-->
    <div class="mb-4">
        <label class="form-label" for="fecha">Fecha de captura</label>
        <input class="form-control" type="date" name="fecha">
        <?php if(isset($error_fecha)) echo("<span class='error'>$error_fecha</span>") ?> 
    </div>


<!--DESCRIPCION-->
<div class="mb-4">
        <label class="form-label" for="descripcion">Descripcion</label>
        <textarea class="form-control" name="descripcion" id=""></textarea>
        <?php if(isset($error_descripcion)) echo("<span class='error'>$error_descripcion</span>") ?> 
    </div>



    <input class="form-submit" type="submit" value="Enviar">

</form>

</div>

<sstyleeyt src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>