<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Vista Inicio de Sesion</title>
</head>
<body>
    <h3><?php echo $mensaje; ?></h3>

    <?php 
        if (!empty($nombreUsuario)){ //si el login es correcto, el $nombreUsuario no estara vacio, si lo esta no se ha iniciado sesion
            echo '<p>Bienvenido, '.$nombreUsuario.'</p>';
        }
    ?>

    <p><a href="procesoInicioSesion.php">Volver al inicio de sesion</a></p>
</body>
</html>
