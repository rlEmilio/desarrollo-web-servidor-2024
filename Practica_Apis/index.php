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

    $cantidad_personajes =0;



    $url = "https://dragonball-api.com/api/characters";

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $respuesta = curl_exec($curl);
    curl_close($curl);

    $datos = json_decode($respuesta, true);
    $personajes = $datos;


    echo "<table>";
    echo "<th>Nombre</th>";
    echo "<th>Raza</th>";
    echo "<th>Genero</th>";
    echo "<th>imagen</th>";

    $i = 0;

    //saco 5 primeros personajes
    while($i < 5){
        $imagen = $personajes["items"][$i]["image"];
       echo "<tr>"; 
       ?>
       <td> <a href="personaje.php?personaje_id=<?php echo $personajes["items"][$i]["id"]?>">
       <?php echo $personajes["items"][$i]["name"]?></a></td>
       <?php
       echo "<td>". $personajes["items"][$i]["race"]. "</td>";
       echo "<td>". $personajes["items"][$i]["gender"]. "</td>";
       echo "<td>".  "<img src= '$imagen'>". "</td>";
       echo "</tr>";
      
       $i++;
    }


    echo "</table>";


    if(isset($_GET["numero_personajes"]) && $_GET["numero_personajes"]!="" ){
        $cantidad_personajes = $_GET["numero_personajes"];
        //echo $cantidad_personajes;


    echo "<table>";
   
    while($i < $cantidad_personajes){
        $imagen = $personajes["items"][$i]["image"];
       echo "<tr>"; 
       ?>
       <td> <a href="personaje.php?personaje_id=<?php echo $personajes["items"][$i]["id"]?>">
       <?php echo $personajes["items"][$i]["name"]?></a></td>
       <?php
       echo "<td>". $personajes["items"][$i]["race"]. "</td>";
       echo "<td>". $personajes["items"][$i]["gender"]. "</td>";
       echo "<td>".  "<img src= '$imagen'>". "</td>";
       echo "</tr>";
       
       $i++;
    }

    echo "</table>";

}

?>

<form action="" method="get">
<label for="entrada">Dame el numero de personajes</label>
<input type="text" value="" name="numero_personajes">
<input type="submit" value="enviar">
<br><br>
<?php
    if($personajes["meta"]["currentPage"]!=1){
        echo "<input type='button' value='anterior' name='anterior'>";
    }
?>
<input type="submit" value="siguiente" name="siguiente">
</form>


<?php
    if(isset($_GET["siguiente"])){
      $pagina = $personajes["meta"]["currentPage"]+1;
      //echo $pagina;
        $url_siguientes = "https://dragonball-api.com/api/characters?page=$pagina";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url_siguientes);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);

        $datos = json_decode($respuesta, true);
        $personajes = $datos;

    
    while($i < $cantidad_personajes){
        
        foreach($personajes["items"] as $personaje){
            $imagen = $personaje["image"];
       echo "<tr>"; 
       ?>
       <td> <a href="personaje.php?personaje_id=<?php echo $personajes["id"]?>">
       <?php echo $personaje["name"]?></a></td>
       <?php
       echo "<td>". $personaje["race"]. "</td>";
       echo "<td>". $personaje["gender"]. "</td>";
       echo "<td>".  "<img src= '$imagen'>". "</td>";
       echo "</tr>";
       
        }
       
       $i++;
    }

    echo "</table>";

}

    
?>

    
</body>
</html>