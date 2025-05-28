<?php
    include ('controladores/csesion.php');

    $objCSesion = new Csesion();
    $mensaje = $objCSesion->comprobar_usuario();
    $nombreUsuario = $objCSesion->nombreUsuario ?? null; //aqui devuelve el nombre del usuario relleno si el login es correcto
    // la parte de ?? null, es para controlar el inicio de sesion erroneo, asi devuelve una variable null y no da error en la vista
    
    include ('vistas/vistaUsuario.php');
    
?>