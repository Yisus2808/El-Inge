<?php
    class mainModel {
        protected function conectar() {
            $enlace = new PDO(SGBD,USER,PASSWORD);
            return $enlace;
        }

        protected function ejecutar_consultar_simple($datos) {
            $respuesta = self::conectar()->prepare($datos);
            $respuesta->execute();
            return $respuesta;
        }

        protected function sweet_alert($datos) {
            if($datos['Alerta'] == "simple") {
                $alerta = "
                    <script>
                        swal(
                            '".$datos['Titulo']."',
                            '".$datos['Texto']."', 
                            '".$datos['Tipo']."'   
                        )
                    </script>
                ";
            } else if($datos['Alerta'] == "recargar") {
                $alerta = "
                    <script>
                       swal({
                           title: '".$datos['Titulo']."',
                           text: '".$datos['Texto']."',
                           icon: '".$datos['Tipo']."',
                           confirmButtonText: 'Aceptar'
                       }).then(function () {
                            location.reload();
                       });
                    </script>
                ";
            } else if($datos['Alerta'] == "limpiar") {
                    $alerta = "
                    <script>
                       swal({
                           title: '".$datos['Titulo']."',
                           text: '".$datos['Texto']."',
                           icon: '".$datos['Tipo']."',
                           confirmButtonText: 'Aceptar'
                       }).then(function() {
                           
                       })
                    </script>
                ";
            }
            return $alerta;
        }
    }

