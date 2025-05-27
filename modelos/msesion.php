<?php
    include('config/config.php');

    class Msesion {
        public $msg;
        private $conexion;

        public function __construct() {
            $this->conexion = new mysqli(SERVIDOR, USUARIO, PW, BD);
            $this->conexion->set_charset('utf8');
        }

        public function alta_registro($nombre, $correo, $pw) {
            try {
                $pwhash = password_hash($pw, PASSWORD_DEFAULT);
                $stmt = $this->conexion->prepare("INSERT INTO usuarios (nombre, correo, pw) VALUES (?, ?, ?)");
                $stmt->bind_param("sss", $nombre, $correo, $pwhash);
                $stmt->execute();
                $this->msg = "Usuario dado de alta correctamente";
            } catch (mysqli_sql_exception $e) {
                if ($e->getCode() == 1062) {
                    $this->msg = "Ya existe un usuario con este correo";
                } else {
                    $this->msg = "Error al insertar usuario: " . $e->getMessage();
                }
            }

            return $this->msg;
        }

        public function comprobar_usuario($correo, $pw) {
            $stmt = $this->conexion->prepare("SELECT * FROM usuarios WHERE correo = ?");
            $stmt->bind_param("s", $correo);
            $stmt->execute();

            $resultado = $stmt->get_result();

            if ($resultado->num_rows > 0) {
                $usuario = $resultado->fetch_assoc();

                $hash = $usuario['pw'];

                if (password_verify($pw, $hash)) {
                    $this->msg = "Inicio de sesión correcto";
                } else {
                    echo ("Correo ingresado: " . $correo);
                    echo ("<br>Contraseña ingresada: " . $pw);
                    echo ("<br>Hash almacenado: " . $hash);
                    $this->msg = "Contraseña incorrecta";
                }
                
            } else {
                $this->msg = "Correo no encontrado";
            }

            return $this->msg;
        }
    }
?>
