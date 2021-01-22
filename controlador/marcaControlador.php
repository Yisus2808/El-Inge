<?php
    class marcasControlador {
     static public function guardar_marcas_controlador() {
            if(isset($_POST['marca'])) {
                $marca = $_POST['marca'];

                require_once "core/conexion.php";
                $consulta = Conexion::conectar()->prepare("SELECT COUNT(nombre_marca) as 'CM' FROM marca WHERE nombre_marca = '$marca'");
                $consulta->execute();
                $resultado = $consulta->fetch();
                if($resultado['CM']>=1) {
                    echo '<script>
                                alert("Este marca ya esta registradoe")
                         </script>';
                    echo '<script>
                            swal("Ups!","Este marca ya esta registrada","error")
                        </script>';
                } else {
                    $datosP = array(
                        "Marca"=>$marca
                    );

                    require_once "modelo/marcaModelo.php";
                    $respuesta = Datos2::guardar_marcas_modelo($datosP);

                    if($respuesta == 'ok') {
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