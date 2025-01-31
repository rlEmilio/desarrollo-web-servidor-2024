<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <?php


    error_reporting(E_ALL);
    ini_set("display_errors", 1);


    if (!isset($_GET["anime_id"])) {
        header("location:top_animes.php");
    }

    $id_anime = $_GET["anime_id"];
    echo $id_anime;


    $url = "https://api.jikan.moe/v4/anime/$id_anime/full";

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $respuesta = curl_exec($curl);
    curl_close($curl);

    $datos = json_decode($respuesta, true);
    $animes = $datos["data"];




    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $respuesta = curl_exec($curl);
    curl_close($curl);

    $datos = json_decode($respuesta, true);
    $animes = $datos["data"];

    ?>

    <?php echo $animes["title"] ?>
    <br>
    <?php echo $animes["synopsis"] ?>
    <br>
    <img src="<?php echo $animes["images"]["jpg"]["image_url"] ?>" alt="">
    <br>
    <td><?php echo $animes["source"] ?></td>
    <br>

    <!-- Muestro generos -->
    <?php foreach ($animes["genres"] as $genero) { ?>
        <td><?php echo $genero["name"] ?></td>
    <?php }
    ; ?>
    <br>

    <!-- Muestro productoras -->

    <?php foreach ($animes["producers"] as $productora) { ?>
        <td><?php echo $productora["name"] ?></td>
    <?php }
    ; ?>

    <!-- Animes relacionados -->
    <br>
    <br>
    <?php
    $tamano = count($animes["relations"]);

    echo "Animes relacionados<br>";


    foreach ($animes["relations"] as $relaciones) {
        
        foreach ($relaciones["entry"] as $entradas) {
            if($entradas["type"]!= "manga"){
                echo "<br>".$entradas["name"];
            }
            
        }
        ;
    }
    ;
    ?>







</body>

</html>