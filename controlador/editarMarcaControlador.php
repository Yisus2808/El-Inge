<?php 

class editarMarcaControlador {
      static public function editar_marcas_controlador() {
        if (isset($_POST['marcaEdit'])) {
            $marca = $_POST['marcaEdit'];
            $pk = $_POST['pk_marca'];
            // echo '<script>alert("'.$marca.'")</script>';
            require_once "core/conexion.php";
                    $datosP = array(
                        "Marca"=>$marca,
                        "Pk"=>$pk
                    );

                    require_once "modelo/marcaModelo.php";
                    $respuesta = Datos2::editar_marcas_modelo($datosP);

                    if($respuesta == 'ok') {
                        echo '<script>alert("Se Edito Con Exito")
                                window.location="inge.php" 
                             </script>';
                        echo '<script>
                            swal("Guardado!","Se ha registrado con éxito","success").then(()=>{
                                window.location="inge.php"
                            }) </script>';
                    } else {
                         echo '<script>
                                alert("No Se Pudo Editar")
                             </script>';
                        echo '<script>swal("Ups!","No Se Pudo Editar La Marca","error")</script>';
                    }
                }
        }
}