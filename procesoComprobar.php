<?php
    include ('controladores/csesion.php');

    $objCSesion = new Csesion();
    $usuario = $objCSesion->comprobar_usuario();
    $mensaje = $objCSesion->msg;
    include ('vistas/vistaUsuario.php');
    
?>