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
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $_tmp_usuario = $_POST["usuario"];
            $_tmp_nombre = $_POST["nombre"];
            $_tmp_apellidos = $_POST["apellidos"];
            $_tmp_nacimiento = $_POST["nacimiento"];

$error_usuario;
$error_nombre;
$error_fecha;
$patron;

            if($_tmp_usuario == ""){
                $error_usuario = "El usuario no puede estar vacío";
            }
            else{
                $patron = "/^[a-zA-Z0-9_]{4,12}$/";
                echo preg_match($patron, $_tmp_usuario);
                if(!preg_match($patron, $_tmp_usuario)){
                    $error_usuario = "El usuario debe tener 4 a 12 caracteres y
                    contener letras, números o barrabaja";
                }else{
                    $usuario = $_tmp_usuario;
                }
            }



            if($_tmp_nombre == ""){
                $error_nombre = "El nombre no puede estar vacío";

            }else{
                if(strlen($_tmp_nombre) < 2 || strlen($_tmp_nombre) > 30){
                    $error_nombre = "El nombre tiene que tener entre 2 y 30 carácteres";
                }else{
                    $patron ="/^[a-zA-Z\ áéíóúÁÉÍÓÚ]$/";
                    if(!preg_match($patron, $_tmp_nombre)){
                        $error_nombre = "El nombre solo puede contener letras o espacios en blanco";
                    }else{
                        $nombre = $_tmp_nombre;
                    }
                    
                }
            }


            if($_tmp_nacimiento == '') {
                $error_fecha = "La fecha de nacimiento es obligatoria";
            } else {
                $patron = "/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/";
                if(!preg_match($patron,$_tmp_nacimiento)) {
                    $error_fecha = "El formato de la fecha es incorrecto";
                } else {
                    $fecha_actual = date("Y-m-d");  //  2024 25 10
                    list($ano_actual,$mes_actual,$dia_actual) = explode('-',$fecha_actual);

                    list($ano_usuario,$mes_usuario,$dia_usuario) = explode('-',$_tmp_nacimiento);
                    echo $ano_usuario;

                    if($ano_actual - $ano_usuario > 120) {
                        echo "hola";
                        if($mes_actual < $mes_usuario ){
                            echo "adios";
                            if($dia_actual <= $dia_usuario ){ //si ya ha cumplido
                                echo "<h2>Eres un momia</h2>";
                            }
                        }
                    }
                    else{
                        $fecha = $_tmp_nacimiento;
                    }
                    
                }
            }
        }



        /*echo preg_match('/^[a-z A-Z]/', $_tmp_nombre);
            
            if(preg_match('/^[a-z A-Z]/' ,$_tmp_nombre)===1){
                echo "<h2>true</h2>";
            }
            else{
                echo "<h2>false</h2>";
            }*/

        

    ?>

    <form action="" method="post">
        <label for="usuario">Usuario</label>
        <input type="text" name="usuario">
        <?php if(!isset($usuario)){
            echo $error_usuario;
        }  ?>
       
        <br><br>
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre">
        <?php if(!isset($nombre)){
            echo $error_nombre;
        }  ?>
        <br><br>
        <label for="apellidos">Apellidos</label>
        <input type="text" name="apellidos">
        <br><br>

        <input type="date" name="nacimiento">
        <?php if(!isset($fecha)){
            echo $error_fecha;
        }  ?>
        <br><br>

        <input type="submit" value="registrarse">

    </form>

    

 

</body>
</html>