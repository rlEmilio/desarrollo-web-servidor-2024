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
        .container{
            max-width: 500px;
        }

      
      
      .error{
          color:red;
      }


    </style>
</head>
<body>
    <div class="container">
        <?php
        

      
           

            if($_SERVER["REQUEST_METHOD"] == "POST") {
                var_dump($_POST);
                $tmp_categoria = $_POST["categoria"];
                $tmp_descripcion = $_POST["descripcion"];
                

                //VALIDACIONES

                $contador=0;

 

                //---------CATEGORIA--------

                if(empty($tmp_categoria)){
                    $error_categoria = "la categoria no puede estar vacía";
                }else{
                    if(strlen($tmp_categoria)>30){
                        $error_categoria = "la categoria no puede superar los 30 carácteres";
                    }else{
                        //aqui voy a comprobar si la categoria ya existe
                        $sql = "select * from categoria where categoria = '$tmp_categoria'";
                        $resultado = $_conexion -> query($sql);
                        if($resultado -> num_rows > 0 ){
                            $error_categoria = "La categoría ya existe, elige otro nombre";
                        }else{
                            $categoria = $tmp_categoria;
                            $contador++;
                        }

                    }
                }

                //------DESCRIPCION---------    
                if(empty($tmp_descripcion)){
                    $error_descripcion = "la descripción no puede estar vacía";
                }else{
                    if(strlen($tmp_descripcion) > 255){
                        $error_descripcion = "La descripción no puede ser mayor a 255 carácteres";
                    }else{
                        $descripcion = $tmp_descripcion;
                        $contador++;

                    }
                }


               if($contador==2){
                $sql = "INSERT INTO categoria 
                (categoria, descripcion)
                VALUES
                ('$categoria', '$descripcion')            
            ";

            $_conexion -> query($sql);

               }
              
              

                
            }
        ?>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Categoria</label>
                <input class="form-control" name="categoria" type="text">
                <?php if(isset($error_categoria)) echo "<span class='error'>$error_categoria</span>" ?>
            </div>
           
            <div class="mb-3">
                <label class="form-label">Descripcion</label>
                <input class="form-control" name="descripcion" type="text">
                <?php if(isset($error_descripcion)) echo "<span class='error'>$error_descripcion</span>" ?>
            </div>
          
            <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="Crear">
                <a class="btn btn-secondary" href="index.php">Volver</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>