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

    if(isset($_GET["cantidad_personajes"]) && $_GET["cantidad_personajes"]!="" ){
    $_cantidad = $_GET["cantidad_personajes"];
    $_genero = $_GET["genero"];
    $_especies = $_GET["especie"];

    $_cantidad_numerica = (int)$_cantidad;
    //echo $_cantidad_numerica;

$url = "https://rickandmortyapi.com/api/character/?gender=$_genero&species=$_especies";

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $respuesta = curl_exec($curl);
    curl_close($curl);

    $datos = json_decode($respuesta, true);
    $personajes = $datos;

    
  $i = 0;
  while ($i < $_cantidad_numerica){
        $imagen=$personajes["results"][$i]["image"];
        echo "<p>Nombre: ".$personajes["results"][$i]["name"].
        "&nbsp&nbsp&nbsp&nbsp&nbsp&nbspGenero: ". $personajes["results"][$i]["gender"]."
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbspEspecie: ".$personajes["results"][$i]["species"].
        "<img src= '$imagen'>".

        "</p>";
    
        $i++;
  }

    }else{
        echo "Por favor complete el formulario";
    }



    

   
?>


<form action="" method="get">
    <input type="text" name="cantidad_personajes">
    <label for="genero">Genero</label>
    <select name="genero">
        <option value="Female">Female</option>
        <option value="Male">Male</option>
     </select>
     <label for="especie">Especie</label>
     <select name="especie">
        <option value="human">Human</option>
        <option value="alien">Alien</option>
     </select>
     <input type="submit" name="enviar" value="Enviar">



</form>

</body>
</html>