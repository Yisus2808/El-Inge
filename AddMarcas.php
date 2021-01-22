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

/*   #registro{
    background-image: url('vista/assets/img/campo.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    opacity: 0.95;
    border-radius: 5px;
    text-decoration-color: white;
    color: white;
    background-position: center;
    } */
</style>
<section id="addMarcas">
<!-- <div class="jumbotron">
  <div class="container">
    <h3 id="h3-productos" class="wow fadeInUp delay-1s">AGREGAR MARCAS</h3>
    <hr class="wow fadeInUp delay-1s">
  </div>
</div> -->



<!-- Editable table -->
<div class="card">
  <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Marcas Agregados</h3>
  <div class="card-body">
    <div id="table" class="table-editable">
      <span class="table-add float-right mb-3 mr-2">
        <a data-toggle="modal" data-target="#AggMarcas" class="indigo-text">
        <i class="fas fa-plus fa-2x" aria-hidden="true"></i></a></span>
      <table class="table table-bordered table-responsive-md table-striped text-center">
        <tr>
          <th class="text-center">Marca</th>
          <th class="text-center">Editar</th>
        </tr>
        <tr>
<?php 
    require_once "core/conexion.php";
    $consultaMarca = Conexion::conectar()->prepare("SELECT pk_marca, nombre_marca FROM marca");
            
    $consultaMarca->execute();
    $resultadoMarca = $consultaMarca->fetchAll();
    // $consulta->close();

    foreach ($resultadoMarca as $dato => $valorMarca) {

      // echo '<script>alert("'.$valor['nombre'].'")</script>';
?> 
          <td class="pt-3-half">
            <?php echo $valorMarca['nombre_marca'] ?>
          </td>
          <td class="pt-3-half">
            <span class="table-up"><a href="inge.php?pkMarca=<?php echo $valorMarca['pk_marca']; ?>" class="indigo-text"><button type="button" class="btn btn-primary btn-rounded btn-sm my-0">EDITAR</button></a></span>
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







<!-- AGREGAR MARCAS -->
<div class="modal fade" id="AggMarcas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Agregar Una Marca</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body mx-3">
        <form accept-charset="utf-8" method="POST" enctype="multipart/form-data" autocomplete="false">
          <div class="form-group row">
          <div class="form-group col-6" >
            <label for="marca">Marca del Producto</label>
            <input type="text" class="form-control" placeholder="Agricol" name="marca" required="true" maxlength="55" minlength="4">
            <small class="form-text text-muted">Escriba las marcas más usadas</small>
          </div>


          <div class="col-3 mb-5"><button type="submit" class="btn btn-primary">Guardar</button></div>
        </div>
        </form>

      </div> 
    </div> 
</div>
</div>
</section>
<?php
require_once "controlador/marcaControlador.php"; 
$guardar = new marcasControlador();
$guardar->guardar_marcas_controlador();
?>





<!-- EDITAR MARCA -->
<?php if (isset($_GET['pkMarca'])) { 
$pk = $_GET['pkMarca'];
// echo '<script>alert("'.$pk.'")</script>';
 require_once "core/conexion.php";
    $consulta = Conexion::conectar()->prepare("SELECT pk_marca, nombre_marca FROM marca WHERE pk_marca= $pk");
    $consulta->execute();
    $resultado = $consulta->fetch();
    // echo '<script>alert("'.$resultado['pk_marca'].'")</script>';
    if(empty($resultado['pk_marca'])) {
         echo '<script>
                swal("UFF!","INTENTAS HACER ALGO INCORRECTO","error").then(()=>{
                    window.location="inge.php"
                }) </script>';
        echo '<script> 
                alert("Uff, Intentas Hacer Algo Incorrecto")
                window.location="inge.php"
              </script>';
    } else { 
    // $consulta->execute();
    // $resultado = $consultaMarca->fetch();
    // $consulta->close();
?>


<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">EDITAR UNA MARCA</h4>
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
            <label for="marca">Marca del producto</label>
            <input type="text" class="form-control" value="<?php echo $resultado['nombre_marca'];?>" name="marcaEdit" required="true" maxlength="55" minlength="4">
            <small class="form-text text-muted">Escriba la nueva marca</small>
            <input type="hidden" class="form-control" value="<?php echo $resultado['pk_marca'];?>" name="pk_marca">
          </div>


          <div class="col-3 mb-5"><button type="submit" id="editarMarca" class="btn btn-primary">Guardar</button></div>
        </div>
        </form>

      </div> 
    </div> 
</div>
<?php 
    require_once "controlador/editarMarcaControlador.php"; 
    $editar = new editarMarcaControlador();
    $editar -> editar_marcas_controlador();

  } 
?>
<?php 
} 
?>
<!-- <script>
  $(document).on("click", "#editarMarca", function (e) {
    console.log("Lo que sea")
    e.preventDefault();
  })


  // $(document).getElementById("editarMarca").addEventListenner("click", function () {
  //   console.log("Lo que sea");
  // })
</script> -->