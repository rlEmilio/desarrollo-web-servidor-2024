<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        table,
        td {
            border: 1px solid black;
            text-align: center;
        }

        td {
            /*background-color: pink;*/
            padding: 10px;

        }

        .table_container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 5px;
            

        }

        th{
            background-color: white;
        }

        table{
            min-width:150px ;
        }
    </style>
</head>

<body>

    <div class="table_container">

        <?php

        /*me creo un array de colores*/

        $lista = ["red","yellow","orange","green","pink","violet","blue","brown","purple","cyan"];

        for ($i = 1; $i <= 10; $i++) { ?> <!--abro y cierro php en el for para crear 10 tablas dentro -->


            <table style="background-color: <?php echo $lista[$i-1] ?>">

                <thead>
                    <tr>
                        <th>
                            tabla del <?php echo " $i"; ?> <!--cabecera tablas  -->
                        </th>
                    </tr>
                </thead>


                <tbody> <!--en el tbody aplico logica  -->

                    <?php

                    for ($j = 0; $j <= 10; $j++) {
                        echo "<tr><td>"."$i x $j = " . $i * $j . "</td></tr>";

                    }

                    ?>

                </tbody>




            </table>


            <br><br>




            <?php
        } ?>
    </div>







</body>

</html>