<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 ); 
        
        require('../util/conexion.php');
    ?>


<style>
      
      .error{
          color:red;
      }

      .container{
          max-width: 500px;
      }

  </style>
</head>
<body>

<?php
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tmp_usuario = $_POST["usuario"];
    $tmp_contrasena = $_POST["contrasena"];

    $contador=0;

    //-----VALIDACIONES------
    if($tmp_usuario == ""){
        $error_nombre = "El usuario no puede estar vacío";
    }else{
        if(strlen($tmp_usuario)<3 || strlen($tmp_usuario)>15){
            $error_nombre = "El usuario debe tener entre 3 y 15 carácteres";
        }else{
            $patron = "/^[a-zA-Z0-9]+$/";
            if(!preg_match($patron,$tmp_usuario)){
                $error_nombre = "El usuario solo puede contener letras y números";
            }
            else{

            //aqui voy a comprobar si el usuario ya existe
            $sql = "select * from usuario where usuario = '$tmp_usuario'";
            $resultado = $_conexion -> query($sql);
            var_dump($resultado);
            if($resultado -> num_rows > 0 ){
                $error_nombre = "El usuario ya existe, por favor, escoja otro";
            }
            else{
                $usuario = $tmp_usuario;
                $contador++; 
                
            }
        }

    }


    }

  
    if($contador==2){
        $contrasena_cifrada = password_hash($contrasena, PASSWORD_DEFAULT);
        $sql = "insert into usuario values
        ('$usuario','$contrasena_cifrada')";
        $_conexion -> query($sql);
    }

   }

?>
    <div class="container">
       <br><br>
    <h1>Formulario de registro</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Usuario</label>
                <input class="form-control" name="usuario" type="text">
                <?php if(isset($error_nombre)) echo "<span class='error'>$error_nombre</span>" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input class="form-control" name="contrasena" type="password">
            </div>
           
            <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="Registrarse">
               
            </div>
        </form>
        <h3>O, si ya tienes cuenta, inicia sesón</h3>
        <a class="btn btn-secondary" href="iniciar_sesion.php">Iniciar sesión</a>
        <a class="btn btn-secondary" href="../index.php">Volver</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html> 