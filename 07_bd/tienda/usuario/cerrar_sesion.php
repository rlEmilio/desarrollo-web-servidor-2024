<?php
session_start(); //recuperamos informacion
session_destroy(); //destruimos (cerramos sesion)
header("location: ../index.php");
exit;

?>