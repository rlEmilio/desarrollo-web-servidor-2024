<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        img{
            max-width: 150px;
            max-height: 150px;
        }

    

    </style>
</head>
<body>
    
<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

if (!isset($_GET["personaje_id"])) {
    header("location:index.php");
}

$id_personaje = $_GET["personaje_id"];
  


    $url = "https://dragonball-api.com/api/characters/$id_personaje";

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $respuesta = curl_exec($curl);
    curl_close($curl);

    $datos = json_decode($respuesta, true);
    $personaje = $datos;


    echo "Nombre: ".$personaje["name"];
    echo "<br>";
    echo "Raza: ".$personaje["race"];
    echo "<br>";
    echo "Genero: ".$personaje["gender"];
    echo "<br>";
    $imagen = $personaje["image"];
    echo "<img src= '$imagen'>";
    echo "<br>";
    echo "Descripción: ".$personaje["description"];
    echo "<br> <br>";
?>

<table>
    <tbody>

    <?php 
    
    if(empty($personaje["transformations"])){
        echo "<h3>El personaje no tiene transformaciones</h3>";
    }else{
        foreach($personaje["transformations"] as $transformacion){
            $imagen = $transformacion["image"];
            echo "<td> ".$transformacion["name"]." <br> "."<img src= '$imagen'>"."</td>";
               
        }
    }
    
   
    ?>

</tbody>
</table>

</body>
</html>