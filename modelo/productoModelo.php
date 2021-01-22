<?php
    require_once "core/conexion.php";
    class Datos {
        public function guardar_productos_modelo($datos) {
            // echo '<script>alert("'.$datos['Representante'].'")</script>';
            $consulta = Conexion::conectar()->prepare("INSERT INTO productos (nombre,img,descripcion,cantidad_stock,precio_compra,fk_marca,fk_categoria) VALUES (:p,:r,:d,:c,:pc,:fkm,:fkc)");
            $consulta->bindParam(":p",$datos['Producto'], PDO::PARAM_STR);
            $consulta->bindParam(":r",$datos['Ruta'], PDO::PARAM_STR);
            $consulta->bindParam(":d",$datos['Descripcion'], PDO::PARAM_STR);
            $consulta->bindParam(":c",$datos['Cs'], PDO::PARAM_STR);
            $consulta->bindParam(":pc",$datos['Pc'], PDO::PARAM_STR);
            $consulta->bindParam(":fkm",$datos['Fkm'], PDO::PARAM_STR);
            $consulta->bindParam(":fkc",$datos['Fkc'], PDO::PARAM_STR);
            if($consulta->execute()) {
                return 'ok';
            } else {
                return 'error';
            }
            $consulta->close();
        }

        public function editar_productos_modelo($datos) {

            // echo '<script>alert("DATOS EN EL PRODUCTO MODELO")</script>';
            // echo '<script>alert("'.$datos['pk_productos'].'")</script>';
            // echo '<script>alert("'.$datos['nombre'].'")</script>';
            // echo '<script>alert("'.$datos['ruta'].'")</script>';
            // echo '<script>alert("'.$datos['descripcion'].'")</script>';
            // echo '<script>alert("'.$datos['cs'].'")</script>';
            // echo '<script>alert("'.$datos['pc'].'")</script>';
            // echo '<script>alert("'.$datos['marca'].'")</script>';
            // echo '<script>alert("'.$datos['categoria'].'")</script>';

            $consulta = Conexion::conectar()->prepare("UPDATE productos SET nombre = :n, img = :r, descripcion = :d, cantidad_stock = :c, precio_compra = :p, fk_marca = :m, fk_categoria = :ca WHERE pk_productos = :pk");
   
            $consulta->bindParam(":pk",$datos['pk_productos'], PDO::PARAM_STR);
            $consulta->bindParam(":n",$datos['nombre'], PDO::PARAM_STR);
            $consulta->bindParam(":r",$datos['ruta'], PDO::PARAM_STR);
            $consulta->bindParam(":d",$datos['descripcion'], PDO::PARAM_STR);
            $consulta->bindParam(":c",$datos['cs'], PDO::PARAM_STR);
            $consulta->bindParam(":p",$datos['pc'], PDO::PARAM_STR);
            $consulta->bindParam(":m",$datos['marca'], PDO::PARAM_STR);
            $consulta->bindParam(":ca",$datos['categoria'], PDO::PARAM_STR);

            if($consulta->execute()) {
                return 'ok';
            } else {
                return 'error';
            }
            $consulta->close();
        }


        public function eliminar_registro_producto($pk) {
            $consulta = Conexion::conectar()->prepare("DELETE FROM productos WHERE pk_productos = $pk");

            if($consulta->execute()) {
                return 'ok';
            } else {
                return 'error';
            }
            $consulta->close();
        }
    }




?>