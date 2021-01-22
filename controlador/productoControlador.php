<?php
    class productosControlador {
     static public function guardar_productos_controlador() {
            if(isset($_POST['producto'])) {
                $producto = $_POST['producto'];

                $carpeta = "eventos";
                $archivo = $_FILES['imagen']['tmp_name'];
                $nombreArchivo = $_FILES['imagen']['name'];
                $ruta = "files/".$carpeta."/".$nombreArchivo;
             
                $descripcion = $_POST['descripcion'];
                $cs = $_POST['cs'];
                $pc = $_POST['pc'];
                $fkm = $_POST['marcaP'];
                $fkc = $_POST['categoria'];
            
            // echo '<script>alert("'.$rfc.'")</script>';
                require_once "core/conexion.php";
                $consulta1 = Conexion::conectar()->prepare("SELECT * FROM productos WHERE nombre = '$producto'");

                if($consulta1->rowCount()>=1) {
                    echo '<script>
                                alert("Este nombre de producto ya esta registradoe")
                             </script>';
                    echo '<script>
                            swal("Ups!","Este nombre de producto ya esta registrado","error")
                        </script>';
                } else {
                    $datosP = array(
                        "Producto"=>$producto,
                        "Ruta"=>$ruta,
                        "Descripcion"=>$descripcion,
                        "Cs"=>$cs,
                        "Pc"=>$pc,
                        "Fkm"=>$fkm,
                        "Fkc"=>$fkc
                    );

                    require_once "modelo/productoModelo.php";
                    $respuesta = Datos::guardar_productos_modelo($datosP);

                    if($respuesta == 'ok') {
                        if(move_uploaded_file($archivo, $ruta))
                    {
                        echo '<script>
                                alert("archivo copiado exitosamente")
                             </script>';
                         echo '<script>swal("Bien!","archivo copiado exitosamente","success")</script>';
                    }
                    else
                    {
                        echo '<script>
                                alert("archivo NO COPIADO")
                             </script>';
                    }

                    	echo '<script>alert("Se guardo")
                                window.location="inge.php"
                             </script>';
                        echo '<script>
                            swal("Guardado!","Se ha registrado con éxito","success").then(()=>{
                                window.location="inge.php"
                            }) </script>';
                    } else {
                         echo '<script>
                                alert("No se ha podido realizar el registro")
                             </script>';
                        echo '<script>swal("Ups!","No se ha podido realizar el registro","error")</script>';
                    }
                }
            }            
        }

	}