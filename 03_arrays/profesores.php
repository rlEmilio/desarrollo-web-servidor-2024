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


$profesores = array(

    "Alejandra" => "Servidor",
    "Jaime" => "Cliente",
    "Jose" => "Interfaces",
    "Virginia" => "Inglés",
    
    
    
    );
    ?>


<table>
    <thead>
        <tr>
        <caption>Asignaturas ordenadas</caption>
            <th>Profesores</th>
            <th>Asignaturas</th>
        </tr>

    </thead>

<tbody>
<?php

foreach($profesores as $clave => $ele){?>
   <tr>

    <td>
        <?php
        echo ("$clave");
        ?>
    </td>
    <td>
        <?php
        echo ("$ele");
        ?>
    </td>
   </tr>
</tbody>

   <?php

   
}?>


<?php

arsort($profesores);


?>


<table>
<br><br>
    <thead>
        <caption>Asignaturas ordenadas</caption>
        <tr>
            <th>Profesores</th>
            <th>Asignaturas</th>
        </tr>

    </thead>

<tbody>
<?php

foreach($profesores as $clave => $ele){?>
   <tr>

    <td>
        <?php
        echo ("$clave");
        ?>
    </td>
    <td>
        <?php
        echo ("$ele");
        ?>
    </td>
   </tr>
</tbody>

   <?php

   
}?>


<?php

$estudiantes = array(
    "Guillermo" => 3,
    "Luis" => 5,
    "Enya" => 10,
    "Jorge" =>7,
    "Mateo" => 2


);

sort($estudiantes);

?>

<table>
<br><br>
    <thead>
        <caption>Notas estudiantes</caption>
        <tr>
            <th>Estudiantes</th>
            <th>Notas</th>
            <th>Resultado</th>
        </tr>

    </thead>

<tbody>
<?php

foreach($estudiantes as $clave => $ele){?>
   <tr>

    <td>
        <?php
        echo ("$clave");
        ?>
    </td>
    <td>
        <?php
        echo ("$ele");
        ?>
    </td>
   
        <?php
        if($ele>=5){
            
            echo ("<td class='aprobado'>El alumno ha aprobado</td>");
        }else{
            echo ("<td class='suspendido'>El alumno ha suspendido</td>");
        }
       
        ?>
    
   </tr>
</tbody>
<?php

   
}?>
  


</body>
</html>