<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    ?>

    <style>
        table, td, th{
            border-collapse: collapse;
            border: 1px solid black;
            text-align:center;
            padding: 10px;
           
        }

        table{
            margin: 0 auto;
            
        }
        th{
            background-color:palegreen;
        }


    </style>
</head>
<body>
    

<form action="" method="post">
<label for="numero">Numero</label>
<input type="text" name="numero" placeholder="Introduce un número:">
<input type=submit value="Multiplicar">



</form>

<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    /*
    El servidor ejecutará este código cuando reciba una solicitud post.
    */
 $numero = $_POST["numero"];
 ?>
<br><br>

<table>

    <thead>
        <tr><th> Tabla del <?php echo"$numero" ?></th></tr>
        
   

    </thead>

<?php

 for($i=1;$i<=10;$i++){
    echo"<tr><td>";
    echo"$numero".'x'.$i.'='.($numero*$i);
    echo"<br>";
    echo"</td></tr>";
   
 }


}
?>

</table>
</div>
</body>
</html>