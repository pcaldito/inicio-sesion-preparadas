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
                    $respuesta = $objMSesion->comprobar_usuario($this->correo, $this->pw);//develve $respuesta en forma de array 
        
                    $this->msg = $respuesta['msg'];
        
                    if (isset($respuesta['nombre'])) {
                        $this->nombreUsuario = $respuesta['nombre']; // Guardar nombre si hay login correcto
                    }
                } else {
                    $this->msg = "Falta la contraseña";
                }
            } else {
                $this->msg = "Falta el correo por rellenar";
            }
        
            return $this->msg;
        }
    }
        
?>
