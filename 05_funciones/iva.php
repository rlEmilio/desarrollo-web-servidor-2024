<?php
function calcularIva($_precio, $_iva){


    define("GENERAL", 1.21);

    define("REDUCIDO", 1.1);

    define("SUPERREDUCIDO", 1.04);

    $pvp = 0;
    if($_iva == "general"){
     $pvp = $_precio * GENERAL;
    }else if($_iva == "reducido"){
     $pvp = $_precio * REDUCIDO;
    }
    else{
     $pvp = $_precio * SUPERREDUCIDO;
    }
 
    echo $_iva;
 
    return $pvp   ;
}

?>