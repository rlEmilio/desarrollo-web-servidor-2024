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
   /* $n = rand(1,10);

    switch($n){
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
       


       switch($n%2){
        case 0:
            echo("El numero es par");
            break;
        default:
            echo("El numero es impar");
            break;
       }
          */



            /*crear un switch que segun el dia 
            de la semana almacene en una variable el dia en español, 
            reescribir el switch asignatura con los dias en español.

            $diaEspanol;
            
          /*  switch($dia){
                case "Monday":
                    $diaEspanol="Lunes";
                    break;
                case "Tuesday":
                    $diaEspanol="Martes";
                    break;
                case "Wednesday":
                    $diaEspanol="Miércoles";
                    break;
                case "Thursday":
                    $diaEspanol="Jueves";
                    break;
                case "Friday":
                    $diaEspanol="Viernes";
                    break;
                case "Saturday":
                    $diaEspanol="Sábado";
                    break;
                case "Sunday":
                    $diaEspanol="Sábado";
                    break;

            }
   
            echo("<h1>$diaEspanol</h1>");

           
            switch($diaEspanol){
    
                case "Martes":
                case "Miércoles":
                case "Viernes":
                    echo("Hoy Si hay servidor");
                    break;
                default: 
                    echo("Hoy no hay servidor");
        
         }


        $resultado=match($diaEspanol){
            "Martes",
            "Miércoles",
            "Viernes" => "<p>Hoy $diaEspanol si hay clase de servidor",
           default => "<p>Hoy $diaEspanol no hay clase de servidor",

        };

        echo $resultado;


        $random = rand(1,10);
        $paridad = $random%2;

        $respuesta = match ($paridad) {
            0 => "<p>El número $random es par</p>",
            default => "<p>El número $random es impar</p>",
        };

        echo $respuesta;



        $numero = rand(-10,20);
        $resultado = match (true) {
            $numero >= -10 && $numero < 0 => "El número $numero está en el rango [-10,0)",
            $numero >= 0 && $numero <= 10 => "El número $numero está en el rango [0,10]",
            $numero > 10 && $numero <= 20 => "El número $numero está en el rango (10,20]",
        };
        echo $resultado;
*/


                    /*con if y con match:
                        si la persona tiene entre 0 y 4 años es un bebe.
                        si tiene entre 5 y 17 es menor de edad.
                        si tiene entre 18 y 65 es adulta.
                        si tiene entre 66 y 120 es jubilado.
                        si esta fuera de rango es error.
                        */



                        $edad = rand(-10,140);
                        $respuesta;
                        if($edad>=0&&$edad<=4){
                            $respuesta="<p>La persona tiene $edad años: Es BEBÉ</p>";
                        }
                       elseif($edad>=5&&$edad<=17){
                            $respuesta="<p>La persona tiene $edad años: Es MENOR</p>";
                        }

                       elseif($edad>=18&&$edad<=65){
                            $respuesta="<p>La persona tiene $edad años: Es ADULTA</p>";
                        }
                        elseif($edad>=66&&$edad<=140){
                            $respuesta="<p>La persona tiene $edad años: Es JUBILADA</p>";
                        }
                        else{
                            $respuesta="<p>ERROR, INTRODUZCA EDAD CORRECTA</p>";
                            
                        }

                        echo $respuesta;



                        $resultado = match (true) {
                             $edad >=0 && $edad <=4 => "<p>La persona tiene $edad años: Es BEBÉ</p>",
                             $edad >=5 && $edad <=14 => "<p>La persona tiene $edad años: Es MENOR</p>",
                             $edad >=15 && $edad <=65 => "<p>La persona tiene $edad años: Es ADULTA</p>",
                             $edad >=66 && $edad <=140 => "<p>La persona tiene $edad años: Es JUBILADA</p>",
                             default => "<p>ERROR, INTRODUZCA EDAD CORRECTA</p>"

                        };

                        echo $resultado;


                        
    ?>
</body>
</html>