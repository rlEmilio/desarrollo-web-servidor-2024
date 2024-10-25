<?php
    function calcularPotencia($_base, $_exponente){

        if(($_base!="") && ($_exponente!="")){
            $resultado = 1;
            for($i=0;$i<$_exponente;$i++){
                $resultado*=$_base;

            }
            echo "<h2>$resultado</h2>";
        }
        else{
            echo "<h2>Por favor, introduzca valores en los campos</h2>";
        }
    }




?>