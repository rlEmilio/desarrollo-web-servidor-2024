<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        table,tr,th {
            border: 2px solid black;
        }
    </style>
</head>

<body>

    <?php


    error_reporting(E_ALL);
    ini_set("display_errors", 1);



    
        $ciudad = $_GET["ciudad"];


        if (isset($_GET["ciudad"]) && $ciudad != "") {
            $url = "http://localhost/Ejercicios/07_bd/animes/api/api_estudio.php?ciudad=$ciudad";
        } else {
            $url = "http://localhost/Ejercicios/07_bd/animes/api/api_estudio.php";
        }

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);
        
        $estudios = json_decode($respuesta, true);
    

    ?>


    <table>
        <thead>
            <tr>
            <th>Titulo</th>
            <th>Estudio</th>
            <th>Año fundación</th>
            </tr>
        </thead>

        <tbody>
            <?php
            foreach ($estudios as $resultado) { ?>
                <tr>
                    <td><?php echo $resultado["nombre_estudio"] ?></td>
                    <td><?php echo $resultado["ciudad"] ?></td>
                    <td><?php echo $resultado["anno_fundacion"] ?></td>

                </tr>

            <?php }
            ; ?>


        </tbody>
    </table>



    <br><br>
    <form action="" method="get">
        <input type="text" name="ciudad">
        <input type="submit" value="Enviar">
    </form>


</body>

</html>