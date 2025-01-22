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
     
        if (isset($_GET["estudio"])) {
            $sql = "select * from animes where nombre_estudio = :estudio ";
            $stm = $_conexion -> prepare($sql);
            $stm -> execute([
                "estudio" => $_GET['estudio'],

            ]);
            
        }else{
            $sql = "select * from animes";
            $stm = $_conexion -> prepare($sql);
            $stm -> execute();
           
        }
        $resultado = $stm -> fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($resultado);


    }
    function manejarPost($_conexion, $entrada ){
       //echo json_encode(["metodo" => "post"]);
       $sql = "insert into animes values(:id_anime, :titulo, :nombre_estudio, :anno_estreno, :num_temporadas, :imagen)";
       $stm = $_conexion -> prepare($sql);
       $stm -> execute([
        "id_anime" => $entrada["id_anime"],
        "titulo" => $entrada["titulo"],
        "nombre_estudio" => $entrada["nombre_estudio"],
        "anno_estreno" => $entrada["anno_estreno"],
        "num_temporadas" => $entrada["num_temporadas"],
        "imagen" => $entrada["imagen"]

       ]);
       if ($stm) {
        echo json_encode(["el anime se ha creado"]);
       }else{
        echo json_encode(["el anime NO se ha creado"]);
       }
      

    } 

    function manejarPut($_conexion, $entrada){
        $sql = "update animes set
        titulo = :titulo,
        imagen = :imagen
        where id_anime = :id_anime";
        
        $stm = $_conexion -> prepare($sql);
        $stm -> execute([
            "id_anime" => $entrada["id_anime"],
            "titulo" => $entrada["titulo"],
            "imagen" => $entrada["imagen"]

        ]);
        if ($stm) {
            echo json_encode(["el anime se ha actualizado"]);
        
        }else{
            echo json_encode(["el anime NO se ha actualizado"]);
        }
       

    }


    function manejarDelete($_conexion, $entrada){
       $sql = "delete from animes where id_anime = :id_anime";
       $stm = $_conexion -> prepare($sql);
       $stm -> execute([
        "id_anime" => $entrada["id_anime"]

       ]);
 if ($stm) {
        echo json_encode(["el anime se ha Borrado"]);
       }else{
        echo json_encode(["el anime NO se ha borrado"]);
       }

    }
?>