<?php
    include('modelos/msesion.php');

    class Csesion {
        public $msg;
        public $nombre;
        public $correo;
        public $pw;

        public function alta_registro() {
            if ($this->validar_form()) {
                $objMSesion = new Msesion();
                $this->msg = $objMSesion->alta_registro($this->nombre, $this->correo, $this->pw);
            } else {
                $this->msg = "Error al enviar el formulario";
            }
            return $this->msg;
        }
        
        //este metodo devuelve true si todas los campos estan rellenos de forma correcta y deja avanzar en el alta del registro
        public function validar_form(): bool {
            if (!empty($_POST['nombre'])) {
                $this->nombre = $_POST['nombre'];
        
                if (!empty($_POST['correo'])) {
                    $this->correo = $_POST['correo'];
        
                    if (!empty($_POST['pw'])) {
                        $this->pw = $_POST['pw'];
                        return true;
                    } else {
                        $this->msg = "Falta la contraseña";
                    }
                } else {
                    $this->msg = "Falta el correo";
                }
            } else {
                $this->msg = "Falta el nombre";
            }
        
            return false;
        }

        public function comprobar_usuario(){
            if (!empty($_POST['correo'])) {
                $this->correo = $_POST['correo'];
                if (!empty($_POST['pw'])) {
                    $this->pw = $_POST['pw'];
        
                    $objMSesion = new Msesion();
                    //develve $usuario que es la fila de la base de datos del usuario que introduce el correo
                    $usuario = $objMSesion->comprobar_usuario($this->correo, $this->pw);
                    
                    // comprobar que el hash de la base de datos es el mismo que enviamos en el form
                    if (password_verify($this->pw, $usuario['pw'])) {
                        $this->msg = "Inicio de sesión correcto";
                        // devuelvo el array con la fila de la base de datos con correo, nombre y estos datos para ver el nombre en la vista
                        return $usuario;
                        
                    } else {
                        // si falla el inicio de sesion no devuelve el array $usuario para que no haya errores de falta de variables en la vista
                        $this->msg = "Contraseña incorrecta";
                    }
                } else {
                    $this->msg = "Falta la contraseña";
                }
            } else {
                $this->msg = "Falta el correo por rellenar";
            }
        }
    }
        
?>
