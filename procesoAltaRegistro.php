<?php
    include ('controladores/csesion.php');

    $objCSesion= new Csesion();

    $mensaje=$objCSesion->alta_registro();

    include ('vistas/vistaAltaRegistro.php');
?>