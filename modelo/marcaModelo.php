<?php
    require_once "core/conexion.php";
    class Datos2 {
        public function guardar_marcas_modelo($datos) {
            $consulta = Conexion::conectar()->prepare("INSERT INTO marca (nombre_marca) VALUES (:m)");
            $consulta->bindParam(":m",$datos['Marca'], PDO::PARAM_STR);

            if($consulta->execute()) {
                return 'ok';
            } else {
                return 'error';
            }
        }


        public function editar_marcas_modelo($datos) {
            $consulta = Conexion::conectar()->prepare("UPDATE marca SET nombre_marca = :m WHERE pk_marca = :pk");

            $consulta->bindParam(":m",$datos['Marca'], PDO::PARAM_STR);
            $consulta->bindParam(":pk",$datos['Pk'], PDO::PARAM_STR);

            if($consulta->execute()) {
                return 'ok';
            } else {
                return 'error';
            }
        }

    }


?>