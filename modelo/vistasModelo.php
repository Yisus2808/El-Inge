<?php
    class vistasModelo {
        protected function obtener_vistas_modelo($vistas) {
            $listaBlanca = ["404", "usuarios", "catalogo"];

            if(in_array($vistas,$listaBlanca)) {
                if(file_exists($contenido = "./vista/contenidos/".$vistas."-view.php")) {
                    $contenido = "./vista/contenidos/".$vistas."-view.php";
                } else {
                    $contenido = "usuarios";
                }
            } else if($vistas == "usuarios") {
                $contenido = "usuarios";
            } else if($vistas == "404") {
                $contenido = "404";
            } else {
                $contenido = "404";
            }
            return $contenido;
        }
    }