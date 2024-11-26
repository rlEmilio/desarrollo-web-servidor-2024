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

    </style>
</head>
<body>
    <div class="container">
        <?php
      

            $sql = "SELECT * FROM categoria ORDER BY categoria";
            $resultado = $_conexion -> query($sql);
            $categorias = [];

            //var_dump($resultado);

            while($fila = $resultado -> fetch_assoc()) {
                array_push($categorias, $fila["categoria"]);
            }
            //print_r($estudios);

            if($_SERVER["REQUEST_METHOD"] == "POST") {
                var_dump($_POST);
                $tmp_nombre = $_POST["nombre"];
                $tmp_precio = $_POST["precio"];
                $tmp_categoria = $_POST["categoria"];
                $stock = $_POST["stock"];
                $descripcion = $_POST["descripcion"];
               
                // $_FILES, QUE ES UN ARRAY DOBLE!!!
                $direccion_temporal = $_FILES["imagen"]["tmp_name"];
                $nombre_imagen = $_FILES["imagen"]["name"];
                move_uploaded_file($direccion_temporal, "../imagenes/$nombre_imagen");


                //--------VALIDACIONES-------  
                  //variable que suma los campos validados correctamente
                $contador = 0; 

                //------NOMBRE-------
                if($tmp_nombre == ""){
                    $error_nombre = "El nombre no puede estar vacío";
                }else{
                    if(strlen($tmp_nombre) < 1 || strlen($tmp_nombre) > 50 ){
                        $error_nombre = "La longitud tiene que estar entre 1 y 50";
                    }else{
                        $nombre = $tmp_nombre;
                        $contador++;
                    }
                }


                //-----PRECIO------
                if($tmp_precio == ""){
                    $error_precio = "El precio no puede estar vacío";
                }
                else {
                    if(filter_var($tmp_precio, FILTER_VALIDATE_FLOAT)===false){
                    $error_precio = "El valor debe ser un número entero o decimal";
                    }
                    else {
                        $patron = "/^[0-9]{1,6}(\.[0-9]{1,2})?$/";
                            if(!preg_match($patron, $tmp_precio)){
                                $error_precio = "Formato inválido, máximo de 6 cifras en la parte entera y 2 en la decimal. [111111.00]";
                            }
                        else{
                            $precio = $tmp_precio;
                            $contador++;
                        }
                    } 
                }
               

                //------CATEGORIA------
                if(empty($tmp_categoria)) { 
                   $categoria = 'Alimentacion';  //le pongo esta por defecto, que existe en la bd
                   $error_categoria = "Por favor, elija una categoría";
                } else {
                    $categoria = $tmp_categoria; 
                    $contador++;
                }



                var_dump($contador);
                var_dump($categoria);

               
                if($contador == 5){
                    $sql = "INSERT INTO producto 
                    (nombre, precio, categoria, stock, imagen, descripcion)
                    VALUES
                    ('$nombre', $precio, '$categoria', $stock, '../imagenes/$nombre_imagen', '$descripcion')            
                ";

                $_conexion -> query($sql);

            
                }

            
            
                
            }
        ?>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input class="form-control" name="nombre" type="text">
                <?php if(isset($error_nombre)) echo "<span class='error'>$error_nombre</span>" ?>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Categoria</label>
                <select class="form-select" name="categoria">
                    <option value="" selected  hidden>--- Elige una categoria ---</option>
                    <?php foreach($categorias as $categoria) { ?>
                        <option value="<?php echo $categoria ?>">
                            <?php echo $categoria ?>
                        </option>
                    <?php } ?>
                </select>
                <?php if(isset($error_categoria)) echo "<span class='error'>$error_categoria</span>" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Precio</label>
                <input class="form-control" name="precio" type="text">
                <?php if(isset($error_precio)) echo "<span class='error'>$error_precio</span>" ?>
            </div>
       
            <div class="mb-3">
                <label class="form-label">Stock</label>
                <input class="form-control" name="stock" type="text">
            </div>
            <div class="mb-3">
                <label class="form-label">Descripcion</label>
                <input class="form-control" name="descripcion" type="text">
            </div>
            <div class="mb-3">
                <label class="form-label">Imagen</label>
                <input class="form-control" name="imagen" type="file">
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