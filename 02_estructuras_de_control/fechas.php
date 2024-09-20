<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fechas</title>
</head>
<body>
    <?php
    echo date("W");

    //~numero % 4


    if(date("d")%4==0){
        echo"<p>El dia es par</p>";
    }else {
        echo"<p>El dia es impar</p>";
    }

    echo date("P");
    ?>


</body>
</html>