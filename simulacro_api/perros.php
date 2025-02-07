<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<!--Mostrar perro al azar -->
<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

$url = "https://dog.ceo/api/breeds/image/random";

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $respuesta = curl_exec($curl);
    curl_close($curl);

    $datos = json_decode($respuesta, true);
    $imagen = $datos; 

?>
<img src="<?php echo $imagen["message"] ?>" alt="No se encuentra la imagen"> 


</body>
</html>