<?php

    header("Content-type: application/json");
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
  
    include("conexion_pdo.php");


    $metodo = $_SERVER["REQUEST_METHOD"];
    $entrada = json_decode(file_get_contents('php://input'),true);



    switch ($metodo){
        case "GET":
            manejarGET($_conexion);
            break;
        case "POST":
            manejarPOST($_conexion, $entrada);
            break;
        case "PUT":
            manejarPUT($_conexion, $entrada);
            break;
        case "DELETE":
            manejarDELETE($_conexion, $entrada);
            break;
        default:
            echo json_encode(["mensaje" => "peticion no valida"]);


    }

    function manejarGet($_conexion){
        //echo json_encode(["metodo" => "get"]);
        $sql = "select * from estudios";
        $stm = $_conexion -> prepare($sql);
        $stm -> execute();
        $resultado = $stm -> fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($resultado);


    }
    function manejarPost($_conexion, $entrada ){
       //echo json_encode(["metodo" => "post"]);
       $sql = "insert into estudios values(:nombre_estudio, :ciudad, :anno_fundacion)";
       $stm = $_conexion -> prepare($sql);
       $stm -> execute([
        "nombre_estudio" => $entrada["nombre_estudio"],
        "ciudad" => $entrada["ciudad"],
        "anno_fundacion" => $entrada["anno_fundacion"]

       ]);
       if ($stm) {
        echo json_encode(["el estudio se ha creado"]);
       }else{
        echo json_encode(["el estudio NO se ha creado"]);
       }
     

    }

    function manejarPut($_conexion){
        echo json_encode(["metodo" => "put"]);

    }
    function manejarDelete($_conexion){
        echo json_encode(["metodo" => "delete"]);

    }
?>