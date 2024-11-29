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
        
        require('./util/conexion.php');
    ?>
   
</head>
<body>
   
<?php

        $sql = "SELECT * FROM producto";
        $resultado = $_conexion -> query($sql);
        
?>

<div class="container">
    <br><br>
<h1>Listado de productos</h1>
<br><br>
<table class="table table-dark table-striped">
            <thead class="table-info">
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Categoria</th>
                    <th>Stock</th>
                    <th>Descripción</th>
                    <th>Imagen</th>
                   
                </tr>
            </thead>
            <tbody>
                <?php
                    while($fila = $resultado -> fetch_assoc()) {
                        // ["titulo"=>"Frieren","nombre_estudio"="Pierrot"...]
                        var_dump($fila["imagen"]);
                        echo "<tr>";
                        echo "<td>" . $fila["nombre"] . "</td>";
                        echo "<td>" . $fila["precio"] . "</td>";
                        echo "<td>" . $fila["categoria"] . "</td>";
                        echo "<td>" . $fila["stock"] . "</td>";
                        echo "<td style='min-width:300px'>" . $fila["descripcion"] . "</td>";
                       
                        ?>
                        <td>
                    <!--cambio la ruta de imagen de ../ a ./ -->
                            <img width="100px" heigth="100px" src="<?php echo str_replace("../","./",$fila["imagen"]) ?>">
                        </td>
                        <?php
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>