<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    define("EURO_DOLAR", 1.09);

    define("EURO_YEN", 163.18);

    define("DOLAR_EURO", 0.92);

    define("DOLAR_YEN", 149.67);

    define("YEN_EURO", 0.0061);

    define("YEN_DOLAR", 0.0067);
    ?>

</head>

<body>





    <form action="" method="post">
        <label for="cantidad">Cantidad</label>
        <input type="number" name="cantidad" placeholder="Introduce cantidad">
        <label for="moneda">Moneda</label>
        <select name="moneda" id="">
            <option value="euro">Euro</option>
            <option value="dolar">Dolar</option>
            <option value="yen">Yen</option>


        </select>
        <label for="cambio">Cambio</label>
        <select name="cambio" id="">
            <option value="euro">Euro</option>
            <option value="dolar">Dolar</option>
            <option value="yen">Yen</option>
        </select>
        <input type="submit" value="Enviar">



    </form>



    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        /*
        El servidor ejecutará este código cuando reciba una solicitud post.
        */
        $_cantidad = (float)$_POST["cantidad"];
        $_moneda = $_POST["moneda"];
        $_cambio = $_POST["cambio"];
        $_respuesta = "";
        echo "<br>";

        match (true) {
            $_moneda == "euro" && $_cambio == "dolar" => $_respuesta = $_cantidad . " euros son " . ($_cantidad * EURO_DOLAR) . " dólares",
            $_moneda == "euro" && $_cambio == "yen" => $_respuesta = $_cantidad . " euros son " . ($_cantidad * EURO_YEN) . " yenes",
            $_moneda == "dolar" && $_cambio == "euro" => $_respuesta = $_cantidad . " dólares son " . ($_cantidad * DOLAR_EURO) . " euros",
            $_moneda == "dolar" && $_cambio == "yen" => $_respuesta = $_cantidad . " dólares son " . ($_cantidad * DOLAR_YEN) . " yenes",
            $_moneda == "yen" && $_cambio == "euro" => $_respuesta = $_cantidad . " yenes son " . ($_cantidad * YEN_EURO) . " euros",
            $_moneda == "yen" && $_cambio == "dolar" => $_respuesta = $_cantidad . " yenes son " . ($_cantidad * YEN_DOLAR) . " dólares",
            default => $_respuesta = "Elige un tipo de conversión tistinto a la moneda original"
        };

        echo $_respuesta;

    }

    ?>





</body>

</html>