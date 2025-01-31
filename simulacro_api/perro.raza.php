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

   

?>

<form action="" method="get">
<select name="perro" id="">
    <?php for ($i = 0; $i < count($razas); $i++){?>
       <option value=""><?php echo $razas["message"][$i] ?> </option> 
        
   <?php }; ?>
</select>

</form>
</body>
</html>