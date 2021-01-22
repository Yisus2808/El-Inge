<?php 

class editarProductosControlador {
	static public function editar_productos_controlador() {
		if (isset($_POST['pk_productos'])) {

			$pk = $_POST['pk_productos'];
			$producto = $_POST['Editproducto'];
			// $imagen = $_POST['EditImagen'];
			$descripcion = $_POST['EditDescripcion'];
			$cs = $_POST['EditCS'];
			$pc = $_POST['EditPC'];
			$marca = $_POST['EditMarcaP'];
			$categoria = $_POST['EditCategoria'];

// echo '<script>alert("RESIVIENDO DATOS")</script>';
// echo '<script>alert("'.$pk.'")</script>';
// echo '<script>alert("'.$producto.'")</script>';
// echo '<script>alert("'.$descripcion.'")</script>';
// echo '<script>alert("'.$cs.'")</script>';
// echo '<script>alert("'.$pc.'")</script>';
// echo '<script>alert("'.$marca.'")</script>';
// echo '<script>alert("'.$categoria.'")</script>';


		$nombreArchivo = $_FILES['EditImagen']['name'];
	    $move = false;
	    if($nombreArchivo=="") {
	    	require_once "core/conexion.php";
            $consulta = Conexion::conectar()->prepare("SELECT img FROM productos WHERE pk_productos = $pk");
            $consulta->execute();
            $resultado = $consulta->fetch();
	        $ruta = $resultado['img'];
	       
	    } else {
	        $carpeta = "eventos";
	        $archivo = $_FILES['EditImagen']['tmp_name'];
	        $ruta = "files/".$carpeta."/".$nombreArchivo;
	        $move = true;
	        
	    }
// echo '<script>alert("'.$ruta.'")</script>';

	    $arreglo = array("pk_productos"=>$pk, "nombre"=>$producto, "ruta"=>$ruta, "descripcion"=>$descripcion, "cs"=>$cs, "pc"=>$pc,"marca"=>$marca, "categoria"=>$categoria);

	    require_once "modelo/productoModelo.php";
	    $respuestax = Datos::editar_productos_modelo($arreglo);

	    
	    if($respuestax == "ok") {

	        if($move==true) {
	            if(move_uploaded_file($archivo, $ruta))
	            {
	                echo '<script>
	                        alert("archivo copiado exitosamente")
	                    </script>';
	                echo '<script>swal("Bien!","Imagen copiado exitosamente","success")</script>';
	            }
	            else
	            {
	                echo '<script>
	                        alert("ARCHIVO NO COPIADO")
	                    </script>';
	                echo '<script>swal("UFF!","Imagen no copiado","error")</script>';
	            }
	        }                     
	        echo '<script> 
	            alert("datos actualizados correctamente")
	            window.location="inge.php"
	        </script>';
	        echo '<script>
                    swal("Guardado!","Datos actualizados con éxito","success").then(()=>{
                    window.location="inge.php"
                }) </script>';

	    } else {
	        echo '<script> 
	            alert("datos no guardados")
	            window.location="inge.php"
	        </script>';
	        echo '<script>
                    swal("ERROR!","Datos no actualizados","error").then(()=>{
                    window.location="inge.php"
                }) </script>';
	    }
			// require_once "core/conexion.php";
   //          $datosP = array(
   //              "Marca"=>$marca,
   //              "Pk"=>$pk
   //          );

   //          require_once "modelo/marcaModelo.php";
   //          $respuesta = Datos2::editar_marcas_modelo($datosP);

   //          if($respuesta == 'ok') {
   //              echo '<script>alert("Se Edito Con Exito")
   //                      window.location="inge.php" 
   //                   </script>';
   //              echo '<script>
   //                  swal("Guardado!","Se ha registrado con éxito","success").then(()=>{
   //                      window.location="inge.php"
   //                  }) </script>';
   //          } else {
   //               echo '<script>
   //                      alert("No Se Pudo Editar")
   //                   </script>';
   //              echo '<script>swal("Ups!","No Se Pudo Editar La Marca","error")</script>';
   //          }
		}
	}

}