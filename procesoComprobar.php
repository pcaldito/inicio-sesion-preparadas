<?php
    include ('controladores/csesion.php');

    $objCSesion= new Csesion();

    $mensaje=$objCSesion->comprobar_usuario();

    include ('vistas/vistaUsuario.php');
?>