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

$url = "https://dog.ceo/api/breeds/list/all";

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $respuesta = curl_exec($curl);
    curl_close($curl);

    $datos = json_decode($respuesta, true);
    $razas = $datos; 

    foreach($razas["message"] as $raza){
        echo key($raza);
        foreach($raza as $nombre){
            if ($raza == "") {
            echo $raza."<br>";
            }
            echo $nombre."<br>";
        }
    }

?>

<!--<form action="" method="get">
<select name="perro" id="">
   
</select>

</form>-->
</body>
</html>