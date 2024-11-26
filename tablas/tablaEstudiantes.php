<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="estilos.css">
</head>
<body>


<?php
$estudiantes = array(

    "Estela" => 10,
    "Jorge" => 3,
    "Manu" => 5,
    "Emilio" => 8,
    "Angel" => 2



);

arsort($estudiantes);
?>

<h3>Estudiantes</h3>
<table>
<thead>
    <th>Alumno</th>
    <th>Nota</th>
    <th>Estado</th>

</thead>

<tbody>
    <?php
    foreach($estudiantes as $alumno => $nota){
        if($nota < 5){
            echo "<tr class='suspenso'>";
        }else if($nota < 7){
            echo "<tr class='aprobado'>";
        }else if($nota < 9){
            echo "<tr class='notable'>";
        }else{
            echo "<tr class='sobresaliente'>";
        }

        echo"<td>$alumno</td>";
        echo"<td>$nota</td>";
            if($nota < 5){
                echo"<td>Suspenso</td>";
            }else if($nota < 7){
                echo"<td>Aprobado</td>";
            }else if($nota < 9){
                echo"<td>Notable</td>";
            }else{
                echo"<td>Sobresaliente</td>";
            }
            
            echo"</tr>";

    }



    ?>

</tbody>
</table>

    
</body>
</html>