<?php
    require_once "modelo/vistasModelo.php";
    class vistasControlador extends vistasModelo {

        public function integrar_plantilla_controlador() {
            return include "vista/plantilla.php";
        }
        public function obtener_vistas_controlador() {        
            if(isset($_GET['vistas'])) {
                $ruta = explode('/',$_GET['vistas']);
                $respuesta = vistasModelo::obtener_vistas_modelo($ruta[0]);
            } else {
                $respuesta = "usuarios";
            }
            return $respuesta;
        }
    }