<style>
  .clearfix-padding {
    clear: both;
    padding: 2%;
  }

  #h3-productos {
    color: black; 
    text-align: center;
  }

  hr {
    max-width: 450px;
    height: 2px;
    border-radius: 1px;
    background: -webkit-linear-gradient(left, yellow, green);
    margin-top: 10px;
  }

  #registro{
    background-image: url('vista/assets/img/campo.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    opacity: 0.95;
    border-radius: 5px;
    text-decoration-color: white;
    color: white;
    background-position: center;
    }
</style>
<section id="addProductos">
<!-- <div class="jumbotron">
  <div class="container">
    <h3 id="h3-productos" class="wow fadeInUp delay-1s">AGREGAR PRODUCTOS</h3>
    <hr class="wow fadeInUp delay-1s">
  </div>
</div> -->

<!-- Editable table -->
<div class="card">
  <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Productos agregados</h3>
  <div class="card-body">
    <div id="table" class="table-editable">
      <span class="table-add float-right mb-3 mr-2"><a data-toggle="modal" data-target="#AggProductos" class="indigo-text"><i class="fas fa-plus fa-2x"
            aria-hidden="true"></i></a></span>
      <table class="table table-bordered table-responsive-md table-striped text-center">
        <tr>
          <th class="text-center">Imagen</th>
          <th class="text-center">Nombre</th>
          <th class="text-center">Descripción</th>
          <th class="text-center">Cantidad En Stock</th>
          <th class="text-center">Precio Compra</th>
          <th class="text-center">Marca</th>
          <th class="text-center">Categoria</th>
          <th class="text-center">EDITAR</th>
          <th class="text-center">ELIMINAR</th>
        </tr>
        <tr>
<?php 
    require_once "core/conexion.php";
    $consultaPorducto = Conexion::conectar()->prepare("SELECT pk_productos,img, nombre, descripcion, cantidad_stock, precio_compra, marca.nombre_marca AS 'Marca', categoria.nombre_categoria as 'Categoria' FROM productos,marca, categoria WHERE productos.fk_categoria=categoria.pk_categoria and marca.pk_marca=productos.fk_marca");
            
    $consultaPorducto->execute();
    $resultado1 = $consultaPorducto->fetchAll();
    // $consulta->close();

    foreach ($resultado1 as $dato => $valor) {

      // echo '<script>alert("'.$valor['nombre'].'")</script>';
?>
          <td class="pt-3-half">
            <img height="40" width="40" src="<?php echo $valor['img'] ?>">
          </td>
          <td class="pt-3-half"><?php echo $valor['nombre'] ?></td>
          <td class="pt-3-half font-weight-normal text-justify"><?php echo $valor['descripcion'] ?></td>
          <td class="pt-3-half"><?php echo $valor['cantidad_stock'] ?></td>
          <td class="pt-3-half">$<?php echo $valor['precio_compra'] ?></td>
          <td class="pt-3-half"><?php echo $valor['Marca'] ?></td>
          <td class="pt-3-half"><?php echo $valor['Categoria'] ?></td>
          <td class="pt-3-half">
            <span class="table-up"><a href="inge.php?editarProducto=<?php echo $valor['pk_productos']; ?>" class="indigo-text"><button type="button" class="btn btn-primary btn-rounded btn-sm my-0">EDITAR</button></a></span>
          </td>
          <td>
            <span class="table-remove"><a href="inge.php?pkEliminar=<?php echo $valor['pk_productos']; ?>" class="indigo-text"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">ELIMINAR</button></a></span>
          </td>
        </tr>
<?php 
}
?>
      </table>
    </div>
  </div>
</div>
<!-- Editable table -->









<!-- AGREGAR PRODUCTOS -->

<div class="modal fade" id="AggProductos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Agregar un producto</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body mx-3">


  <form accept-charset="utf-8" method="POST" enctype="multipart/form-data" autocomplete="false">
    <div class="form-group row">
    <div class="form-group col-6" >
      <label for="platillo">Nombre del producto</label>
      <input type="text" class="form-control" placeholder="Fungisidas V4" name="producto" required="true" maxlength="55" minlength="4">
      <small class="form-text text-muted">Escriba el nombre de su platillo</small>
    </div>
    
    <div class="form-group col-6" >
        <label for="imagen">Imagen</label>
        <input type="file" class="form-control-file" id="imagen" name="imagen" required>
        <small id="imagen" class="form-text text-muted">Escoja la imagen de su producto</small>
    </div>
    
    <div class="form-group col-6">
      <label for="descripcion">Descripción</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" name="descripcion" rows="3" required></textarea>
      <small id="descripcion" class="form-text text-muted">Escriba la descripcion para el producto</small>
    </div>

    <div class="form-group col-6" >
      <label for="platillo">Cantidad stock</label>
      <input type="number" class="form-control" placeholder="4" name="cs" pattern="{0,9}" max="1000" min="0">
      <small class="form-text text-muted">Escriba la cantidad en stock del producto</small>
    </div>

    <div class="form-group col-6" >
      <label for="platillo">Precio compra</label>
      <input type="text" class="form-control" placeholder="60.50" name="pc" pattern="{0,9}">
      <small class="form-text text-muted">Escriba el precio de compra</small>
    </div>


    <div class="form-group col-6">
          <label for="marca">Marca</label>
          <select class="form-control" id="marca" name="marcaP" required>
            <option value="">Seleccione...</option>
<?php 
require_once "core/conexion.php";
$consulta = Conexion::conectar()->prepare("SELECT pk_marca, nombre_marca FROM marca");

$consulta->execute();
$resultado1 = $consulta->fetchAll();
// $consulta->close();

foreach ($resultado1 as $dato => $valor) {
echo '<option value="'.$valor["pk_marca"].'">'.$valor["nombre_marca"].'</option>';
}
?>
          </select>
          <small class="form-text text-muted">Seleccione una marca</small>
      </div>



      <div class="form-group col-6">
          <label for="categoria">Categoria</label>
          <select class="form-control" id="categoria" name="categoria" required>
            <option value="">Seleccione...</option>
<?php 
require_once "core/conexion.php";
$consulta = Conexion::conectar()->prepare("SELECT pk_categoria, nombre_categoria FROM categoria");

$consulta->execute();
$resultado1 = $consulta->fetchAll();
// $consulta->close();

foreach ($resultado1 as $dato => $valor) {
echo '<option value="'.$valor["pk_categoria"].'">'.$valor["nombre_categoria"].'</option>';
}
?>
          </select>
          <small class="form-text text-muted">Seleccione una categoria</small>
      </div>


    <div class="col-3 mb-5"><button type="submit" class="btn btn-primary">Guardar Producto</button></div>
  </div>
  </form>
      </div> 
    </div> 
</div>
</div>
</section>
<?php
require_once "controlador/productoControlador.php";
$guardar = new productosControlador();
$guardar->guardar_productos_controlador();
?>










<!-- EDITAR PRODUCTO -->
<?php 
if (isset($_GET['editarProducto'])) {
$pk = $_GET['editarProducto'];
// echo '<script>alert("'.$pk.'")</script>';

require_once "core/conexion.php";
$consulta = Conexion::conectar()->prepare("SELECT pk_productos, nombre, img, descripcion, cantidad_stock, precio_compra, marca.nombre_marca AS 'nombreMarca', categoria.nombre_categoria AS 'nombreCategoria' FROM productos,marca,categoria WHERE productos.fk_marca=marca.pk_marca AND productos.fk_categoria=categoria.pk_categoria AND pk_productos = $pk");

$consulta->execute();
$resultado = $consulta->fetchAll();

foreach ($resultado as $dato => $valorProductos) {
// echo '<script>alert("'.$valor['pk_productos'].'")</script>';

// ----------------> Validar la clave del producto <------------ //
if(empty($valorProductos['pk_productos'])) {
    echo '<script>alert("'.$valorProductos['pk_productos'].'")</script>';
     echo '<script>
            swal("UFF!","INTENTAS HACER ALGO INCORRECTO","error").then(()=>{
                window.location="inge.php"
            }) </script>';
    echo '<script> 
            alert("Uff, Intentas Hacer Algo Incorrecto")
            window.location="inge.php"
          </script>';
} else { 

// ---------------> MOSTRARA EL FORMULARIO PARA EDITAR <----------- //
// echo '<script>alert("MOSTRANDO EL FORMULARIO PARA EDITAR")</script>'; 
?>

<!-- EDITAR PRODUCTOS -->

<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">EDITAR PRODUCTO</h4>
        <!-- LA X QUE CIERRA -->
        <a href="inge.php" class="indigo-text">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </a>
      </div>
      <div class="modal-body mx-3">


  <form accept-charset="utf-8" method="POST" enctype="multipart/form-data" autocomplete="false">
    <div class="form-group row">
    <div class="form-group col-6" >
      <label for="EditProducto">Nombre del producto</label>
      <input type="hidden" name="pk_productos" value="<?php echo $valorProductos['pk_productos'];?>">
      <input type="text" class="form-control" value="<?php echo $valorProductos['nombre'];?>" name="Editproducto" required="true" maxlength="55" minlength="4">
      <small class="form-text text-muted">Edite el nombre de su producto</small>
    </div>
    
    <div class="form-group col-6" >
        <label for="EditImagen">Imagen</label>
        <a data-toggle="modal" data-target="#mostrarImg" class="indigo-text"><img src="<?php echo SERVERURL?>/<?php echo $valorProductos['img'];?>" alt="imagen del producto" height="60" width="60"></a>
        <br>
        <input type="file" class="form-control-file" id="EditImagen" name="EditImagen">
        <small id="EditImagen" class="form-text text-muted">Escoja la nueva imagen de su producto</small>
    </div>
    
    <div class="form-group col-6">
      <label for="Editdescripcion">Descripción</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" name="EditDescripcion" rows="3" placeholder="<?php echo $valorProductos['descripcion'];?>" required><?php echo $valorProductos['descripcion'];?></textarea>
      <small class="form-text text-muted">Edite la descripción para el producto</small>
    </div>

    <div class="form-group col-6" >
      <label for="EditCS">Cantidad stock</label>
      <input type="number" class="form-control" placeholder="4" name="EditCS" pattern="{0,9}" max="1000" min="0" value="<?php echo $valorProductos['cantidad_stock'];?>">
      <small class="form-text text-muted">Edite la cantidad en stock del producto</small>
    </div>

    <div class="form-group col-6" >
      <label for="EditPC">Precio compra</label>
      <input type="text" class="form-control" placeholder="60.50" name="EditPC" pattern="{0,9}" value="<?php echo $valorProductos['precio_compra'];?>">
      <small class="form-text text-muted">Edite el precio de compra</small>
    </div>


    <div class="form-group col-6">
          <label for="EditMarcaP">Marca</label>
          <select class="form-control" id="marca" name="EditMarcaP" required>
            <option value="<?php echo $valorProductos['nombreMarca'];?>">Seleccione...</option>
<?php 
require_once "core/conexion.php";
$consulta = Conexion::conectar()->prepare("SELECT pk_marca, nombre_marca FROM marca");

$consulta->execute();
$resultado1 = $consulta->fetchAll();
// $consulta->close();

foreach ($resultado1 as $dato => $valor) {
// echo '<option value="'.$valor["pk_marca"].'">'.$valor["nombre_marca"].'</option>';
if($valorProductos['nombreMarca'] == $valor['nombre_marca']) {
    echo '<option value="'.$valor["pk_marca"].'" selected="select">'.$valor["nombre_marca"].'</option>';
} else {
    echo '<option value="'.$valor["pk_marca"].'">'.$valor["nombre_marca"].'</option>';
}

}
?>
          </select>
          <small class="form-text text-muted">Seleccione una marca</small>
      </div>



      <div class="form-group col-6">
          <label for="EditCategoria">Categoria</label>
          <select class="form-control" id="categoria" name="EditCategoria" required>
            <option value="<?php echo $valorProductos['nombreCategoria'];?>">Seleccione...</option>
<?php 
require_once "core/conexion.php";
$consulta = Conexion::conectar()->prepare("SELECT pk_categoria, nombre_categoria FROM categoria");
$consulta->execute();
$resultado1 = $consulta->fetchAll();
// $consulta->close();

foreach ($resultado1 as $dato => $valor) {

if($valorProductos['nombreCategoria'] == $valor['nombre_categoria']) {
    echo '<option value="'.$valor["pk_categoria"].'" selected="select">'.$valor["nombre_categoria"].'</option>';
} else {
    echo '<option value="'.$valor["pk_categoria"].'">'.$valor["nombre_categoria"].'</option>';
}

}
?>
          </select>
          <small class="form-text text-muted">Seleccione una categoria</small>
      </div>


    <div class="col-3 mb-5"><button type="submit" class="btn btn-primary">Guardar Editado</button></div>
  </div>
  </form>
      </div> 
    </div> 
</div>


<?php
require_once "controlador/editarProductosControlador.php";

$editar = new editarProductosControlador();
$editar -> editar_productos_controlador();

} //termina el else
?>

<!-- MOSTRAR IMAGEN -->
<div class="modal fade" id="mostrarImg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">IMAGEN</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body mx-3 text-center">
        <img src="<?php echo SERVERURL?>/<?php echo $valorProductos['img'];?>" alt="imagen del producto" height="450" width="450">
    </div>
  </div>
</div>
</div>
<?php 
} //termina el foreach


// Termina el if
}
?>


<!-- ELIMINAR TODO UN REGISTRO -->
<?php 
if (isset($_GET['pkEliminar'])) {
  $pk = $_GET['pkEliminar'];
  // echo '<script>alert("'.$pk.'")</script>';

require_once "core/conexion.php";
$consulta = Conexion::conectar()->prepare("SELECT pk_productos FROM productos WHERE  pk_productos = $pk");

$consulta->execute();
$resultado = $consulta->fetchAll();
foreach ($resultado as $dato => $valor) {
// echo '<script>alert("'.$valor['pk_productos'].'")</script>';
if (!empty($valor['pk_productos'])) {

    // echo '<script>alert("'.$valor['pk_productos'].'")</script>';

    echo '<script>alert("Se eliminara el registro para evitar, refresque la pagian")
     </script>';

    echo '<script>
      swal("ESPERA!","¿EN VERDAD DESEA ELIMINAR ESTE REGISTRO?","question")
    }) </script>';

  require_once "modelo/productoModelo.php";
  $respuesta = Datos::eliminar_registro_producto($valor['pk_productos']);
  if ($respuesta == "ok") {
      echo '<script>alert("Se elimino correctamente")
        window.location="inge.php"
       </script>';

      echo '<script>
        swal("Bien!","Se elimino el registro correctamente","success").then(()=>{
          window.location="inge.php"
      }) </script>';
  }else{
      echo '<script>alert("Error al enimar los datos")
        window.location="inge.php"
       </script>';

      echo '<script>
        swal("Uff!","Ocurrio un error inesperado","error").then(()=>{
          window.location="inge.php"
      }) </script>'; 
  }

}else{
  echo '<script>alert("No puedes elimar datos")
      window.location="inge.php"
     </script>';

  echo '<script>
      swal("Error!","No puedes eliminar datos","error").then(()=>{
        window.location="inge.php"
    }) </script>';

  // echo '<script>alert("No puedes elimar datos")
  //       window.location="inge.php
  //     </script>';
}


} //cierra el foreach

} //cierra el if

?>