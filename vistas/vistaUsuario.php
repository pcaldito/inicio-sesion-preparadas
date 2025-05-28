<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Vista Inicio de Sesion</title>
</head>
<body>
    <h3><?php echo $mensaje; ?></h3>
    <?php
        // muestra el nombre del usuario que ha iniciado sesion, solo si el inicio es correcto, sino no existe el array $usuario
        if(isset($usuario)){
            echo '<p>Bienvenido, '.$usuario['nombre'].'</p>';
        }  
    ?>
    <p><a href="procesoInicioSesion.php">Volver al inicio de sesion</a></p>
</body>
</html>
