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
   
    
    
</head>
<body>
    <div class="container">
        <h1>Categorias</h1>
        <?php
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $categoria= $_POST["categoria"];

                $sql = "DELETE FROM categoria WHERE categoria = '$categoria'";
                $_conexion -> query($sql);
            }

            $sql = "SELECT * FROM categoria";
            $resultado = $_conexion -> query($sql);
        ?>
         <br>
        <a class="btn btn-secondary" href="nueva_categoria.php">Nueva Categoria</a><br><br>
        
        <table class="table table-dark table-striped">
            <thead class="table-info">
                <tr>
                    <th>Categoria</th>
                    <th>Descripcion</th>
                   
                </tr>
            </thead>
            <tbody>
                <?php
                    while($fila = $resultado -> fetch_assoc()) {
                        // ["titulo"=>"Frieren","nombre_estudio"="Pierrot"...]
                        echo "<tr>";
                        echo "<td>" . $fila["categoria"] . "</td>";
                        echo "<td style='min-width:300px'>" . $fila["descripcion"] . "</td>";
                       
                        ?>
                      
                        <td>
                            <a class="btn btn-primary" 
                               href="editar_categoria.php?categoria=<?php echo $fila["categoria"] ?>">Editar</a>
                        </td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="categoria" value="<?php echo $fila["categoria"] ?>">
                                <input class="btn btn-danger" type="submit" value="Borrar">
                            </form>
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