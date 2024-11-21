<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    


<?php

/*01 Calcula la suma de todos los nuḿeros pares del 0 al 20
  
  02 muestra por pantalla la fecha actual con el siguiente formato:
    "Miércoles 25 de septiembre de 2024"*/

    $sum=0;
for($i=0;$i<=20;$i++){
    if($i%2==0){
        $sum+=$i;
    }
}
echo "La suma de números pares del 0 al 20 es: $sum";


echo "<br>";
$dia = date("l");
$diaEspanol=null;
switch($dia){
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
    $diaEspanol="Domingo";
    break;

}


$mes = date("n");
 
$mes = match($mes) {
    $mes=1 => $mes="Enero",
    $mes=2 => $mes="Febrero",
    $mes=3 => $mes="Marzo",
    $mes=4 => $mes="Abril",
    $mes=5 => $mes="Mayo",
    $mes=6 => $mes="Junio",
    $mes=7 => $mes="Julio",
    $mes=8 => $mes="Agosto",
    $mes=9 => $mes="Septiembre",
    $mes=10 => $mes="Octubre",
    $mes=11 => $mes="Noviembre",
    $mes=12 => $mes="Diciembre"
};




echo "$diaEspanol ". date("j")." de $mes"." de ".date("Y");
echo "<br>";





//comprobar si un numero es primo
$num=5;
$primo=true;
for($i=2;$i<$num;$i++){
    
    if($num%$i==0){
        $primo=false;
    }
}
if($primo){
    echo "El número $num es primo";
}else{
    echo "El número $num no es primo";
}




//primos del 1 al 50
/*echo "<ul>";

for($i=1; $i<=50; $i++){
    $primo=true;
    
    for($j=2;$j<$i;$j++){
        if($i%$j==0){   //si el numero no es primo
            $primo =false;
        }
   
    }
    if($primo){
        echo ("<li>El número $i es primo</li>");

    }
    else{
        echo ("<li>El número $i no es primo</li>");
    }
}

echo "</ul>"*/;



//primeros 50 primos.
echo "<ul>";

/*$contador=0;
$num=0;


while($contador<50){
    $primo=true;


    for($i=0;$i<$num;$i++){
        if($num%$i==0)  //si el número no es primo;
        $primo=false;
    }

   
       
    

   
        
    
    
}


echo "</ul>";*/


//calcular el fibonacci de los 10 primeros números primos.

$valor1=0;
$valor2=1;
$aux=0;
$suma=0;

$n=5;

for($i=2;$i<=$n;$i++){


$suma=$valor2;
$valor1=$valor2;
$aux=$valor1+$valor2;
$valor2=$aux;


}

echo "$suma";





?>
</body>
</html>