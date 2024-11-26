<?php
    function IRPF($_salario){

        $IRPF = 0;
$sueldo_sin_IRPF = 0;
$tramo1_IRPF = 12450*0.19;
$tramo2_IRPF = (20200-12450) * 0.24;
$tramo3_IRPF = (35199-20200)* 0.30;
$tramo4_IRPF = (60000-35200) *0.37;
$tramo5_IRPF = (300000 -60000) *0.45;


if($_salario <= 12450){
    $IRPF = $_salario*0.19;
    
   
}
else if($_salario > 12450 && $_salario <= 20199 ){
    $IRPF = $tramo1_IRPF + $tramo2_IRPF;
   
 

}else if($_salario >=20200 && $_salario <=35199){
    $tramo3_IRPF = ($_salario-20200)* 0.30;
    $IRPF = $tramo1_IRPF + $tramo2_IRPF + $tramo3_IRPF;
    
    

}
else if($_salario >= 35200 && $_salario <= 59999){
    $tramo4_IRPF = ($_salario-35200) *0.37;
    $IRPF = $tramo1_IRPF + $tramo2_IRPF + $tramo3_IRPF + $tramo4_IRPF;
   
    

}
else if($_salario >= 60000 && $_salario <= 299999){
    $tramo5_IRPF = ($_salario -60000) *0.45;
    $IRPF = $tramo1_IRPF + $tramo2_IRPF + $tramo3_IRPF + $tramo4_IRPF +$tramo5_IRPF;
   
    

}
else if($_salario >= 300000){
    $tramo6_IRPF = ($_salario - 300000) *0.47;
    $IRPF = $tramo1_IRPF + $tramo2_IRPF + $tramo3_IRPF + $tramo4_IRPF +$tramo5_IRPF +$tramo6_IRPF;

    

}

$sueldo_sin_IRPF = $_salario-$IRPF;
return $sueldo_sin_IRPF;
    }



?>