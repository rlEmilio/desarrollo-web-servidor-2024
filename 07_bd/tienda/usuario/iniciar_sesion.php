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
    $usuario = $_POST["usuario"];
    $contrasena = $_POST["contrasena"];


    $sql = "select * from usuarios where usuario = '$usuario'";
   
    $resultado = $_conexion -> query($sql);
  

    if($resultado -> num_rows == 0){
        $error_nombre = "El usuario no existe";
    }else{
        $info_usuario = $resultado -> fetch_assoc();
        $acceso_concedido = password_verify($contrasena, $info_usuario["contrasena"]);
        if(!$acceso_concedido){
            $error_contrasena = "Acceso denegado";
        }else{
            echo "<h2>Acceso concedido</h2>";

            //iniciamos sesion con el usuario introducido en el formulario y redirigimos al index
            session_start();
            $_SESSION["usuario"] = $usuario;
            $_SESSION['contrasena'] = $info_usuario["contrasena"];
            header("location: ../index.php");
            exit;
        }

    }
}


?>
    <div class="container">
       <br><br>
    <h1>Iniciar sesión</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Usuario</label>
                <input class="form-control" name="usuario" type="text">
                <?php if(isset($error_nombre)) echo "<span class='error'>$error_nombre</span>" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input class="form-control" name="contrasena" type="password">
                <?php if(isset($error_contrasena)) echo "<span class='error'>$error_contrasena</span>" ?>
            </div>
            <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="Iniciar sesión">
               
            </div>
        </form>
        <h3>O, si aún no tienes cuenta, registrate.</h3>
        <a class="btn btn-secondary" href="registro.php">Registrarse</a>
        <a class="btn btn-secondary" href="../index.php">Volver</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>