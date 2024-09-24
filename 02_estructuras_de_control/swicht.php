<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php
    $n = rand(1,10);

   /* switch($n){
        case 1:
            echo("<p>El número aleatorio es $n<p>");
            break;
        case 2:
            echo("<p>El número aleatorio es $n<p>");
            break;
        default:
            echo("<p>El número aleatorio es $n<p>");
        }
       */

       /*comprobar con un switch si un numero es par o impar.
       */


       switch($n%2){
        case 0:
            echo("El numero es par");
            break;
        default:
            echo("El numero es impar");
            break;
       }
          


    ?>
</body>
</html>