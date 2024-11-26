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
       $notas = [
        ["Paco", "Desarrollo web servidor"],
        ["Paco", "Desarrollo web cliente"],
        ["Manu", "Desarrollo web servidor"],
        ["Manu", "Desarrollo web cliente"]
    ];

        /**
     * Ejercicio 1: Añadir al array 4 estudiantes con sus asignaturas
     * 
     * Ejercicio 2: Eliminar 1 estudiante y su asignatura a libre elección
     * 
     * Ejercicio 3: Añadir una tercera columna que será la nota, obtenida
     * aleatoriamente entre 1 y 10
     * 
     * Ejercicio 4: Añadir una cuarta columna que indique APTO o NO APTO,
     * dependiendo de si la nota es igual o superior a 5 o no
     * 
     * Ejercicio 5: Ordenar alfabéticamente por los alumnos, y luego p
    * Ejercicio 5: Ordenar alfabéticamente por los alumnos, y luego p*/




    array_push($notas, "Enya", "Desarrollo web servidor");
    array_push($notas, "Enya", "Inglés");
    array_push($notas, "Jose", "Diseño de interfaces");
    array_push($notas, "Jose", "Despliegue web");

   
    //unset($notas[4]);



for($i = 0; $i < count($notas); $i++){
    $notas[$i][2]= rand(1,10);
    if($notas[$i][2]<5){
        $notas[$i][3]="NO APTO";
    }else if($notas[$i][2]>=5){
        $notas[$i][3]="APTO";
    }
}
    ?>

<table>

    <thead>
        <tr>
        <th>Nombre</th>
        <th>Asignatura</th>
        <th>Notas</th>
        <th>Apto</th>


        </tr>


    </thead>


    <tbody>


<?php

    foreach($notas as $nota){
        list($nombre, $asignatura, $notas, $apto) = $nota;    ?>

        <tr>
        <td><?php echo $nombre  ?></td>
        <td><?php echo $asignatura  ?></td>
        <td><?php echo $notas  ?></td>
        <td><?php echo $apto  ?></td>

        </tr>

  <?php
  }
  ?>
    

    

      
   

    </tbody>
</table>
</body>
</html>