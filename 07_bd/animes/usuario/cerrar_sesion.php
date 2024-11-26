<?php
session_start(); //recuperamos informacion
session_destroy(); //destruimos (cerramos sesion)
header("location: iniciar_sesion.php");
exit;

?>