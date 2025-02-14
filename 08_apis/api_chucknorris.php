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

    

       //saco categorias
       $url = "https://api.chucknorris.io/jokes/categories";

       $curl = curl_init();
       curl_setopt($curl, CURLOPT_URL, $url);
       curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
       $respuesta = curl_exec($curl);
       curl_close($curl);
   
       $datos = json_decode($respuesta, true);
       $categorias = $datos;
      

    ?>

    <form action="" method="get">
        <select name="categoria" id="">
            <option value="" disabled selected >Elige Categoria</option>
            <?php foreach ($categorias as $categoria) { ?>
                <option value="<?php echo $categoria ?>"><?php echo $categoria?></option>
            <?php } ?>

        </select>
        <input type="submit" value="Obtener Chiste random">

    </form>

<?php


if(isset($_GET["categoria"]) && $_GET["categoria"]!=""){
    $categoria = $_GET["categoria"];

    $url_chiste = "https://api.chucknorris.io/jokes/random?category=$categoria";
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url_chiste);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $respuesta = curl_exec($curl);
    curl_close($curl);

    $datos = json_decode($respuesta, true);
    $chiste = $datos;
   
    echo "<p>".$chiste['value']."</p";

 }


?>
</body>

</html>