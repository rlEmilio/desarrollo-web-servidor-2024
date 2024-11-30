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
   
    $tmp_contrasena = $_POST["contrasena"];

    $contador=0;

    //-----VALIDACIONES------

    session_start();
    var_dump($_SESSION['usuario']);

        //------CONTRASEÑA-----
        if($tmp_contrasena == ""){
            $error_contrasena = "La contraseña no puede estar vacía";
        }else{
            if(strlen($tmp_contrasena) < 8 || strlen($tmp_contrasena) > 15){
                $error_contrasena = "La contraseña tiene que tener entre 8 y 15 carácteres";
            }else{
                $patron = "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,15}$/";
                if(!preg_match($patron, $tmp_contrasena)){
                    $error_contrasena = "La contraseña tiene que tener al menos una letra mayúscula,
                     una minúscula, un número; y puede contener carácteres especiales.";
                }else{

                    //comprobar si se repite   
                    $existe = password_verify($tmp_contrasena, $_SESSION['contrasena']);
                    var_dump($existe);
                    if($existe){
                        $error_contrasena = "La contraseña ya existe, por favor, elija una nueva";
                    }else{
                        $contrasena_hasheada = password_hash($tmp_contrasena, PASSWORD_DEFAULT);
                        $contador++;
                    }

                   
                }
            }
        }
     

  
    if($contador==1){
        var_dump($contrasena_hasheada);

        if ($contador == 1) {
            $sql = "update usuarios set contrasena = '$contrasena_hasheada' where usuario = '".$_SESSION['usuario']."'";
            $_conexion -> query($sql);

        }
        
    }

   }

?>
    <div class="container">
       <br><br>
    <h1>Cambiar credenciales</h1>
        <form action="" method="post" enctype="multipart/form-data">
            
            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input class="form-control" name="contrasena" type="password">
                <?php if(isset($error_contrasena)) echo "<span class='error'>$error_contrasena</span>" ?>
            </div>
           
            <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="Modificar">
                <a class="btn btn-secondary" href="../index.php">Volver</a>
               
            </div>
        </form>
  
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html> 