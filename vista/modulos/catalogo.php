<div class="clearfix-padding"></div>
<div class="clearfix-padding"></div>
<div class="clearfix-padding"></div>
<h3 id="h3-catalogo" class="wow fadeInUp delay-1s">INSECTICIDAS</h3>
<hr class="wow fadeInUp delay-1s">
<?php 
    require_once "vista/modulos/menu.php"; 
    require_once "core/conexion.php";
    $consulta = Conexion::conectar()->prepare("SELECT nombre, img, descripcion FROM productos, categoria WHERE productos.fk_categoria=categoria.pk_categoria and categoria.nombre_categoria = 'insectisidas'");
            
    $consulta->execute();
    $resultado1 = $consulta->fetchAll();
    // $consulta->close();
    // echo '<script>alert("'.$valor.'")</script>';
?>

<!-- News jumbotron -->
<div class="jumbotron text-center hoverable p-4">

  <!-- Grid row -->
  <div class="row">

  <?php 
    foreach ($resultado1 as $dato => $valor) {
  ?>
    <div class="col-md-2 offset-md-1 mx-3 my-3">

      <!-- Featured image -->
      <div class="view overlay">
      	<br><br><br>
        <img src="<?php echo $valor['img'] ?>" class="img-fluid" alt="insectisidas" width="250" height="250">
        <a>
          <div class="mask rgba-white-slight"></div>
        </a>
      </div>

    </div>


    <div class="col-md-3 text-md-left ml-3 mt-3">

      <h4 class="h4 mb-4" id="h3-catalogo"><?php echo $valor['nombre'] ?></h4>
		<hr>
      <p class="font-weight-normal text-justify"><?php echo $valor['descripcion'];?></p>

    </div>
    <!-- INSECTISIDAS -->
  <?php 
    }
  ?>
  </div>
  <!-- Grid row -->

</div>
<!-- News jumbotron -->





<!-- HERBISIDAS -->
<h3 id="h3-catalogo" class="wow fadeInUp delay-1s">HERBICIDAS</h3>
<hr class="wow fadeInUp delay-1s">
<?php 
    require_once "vista/modulos/menu.php"; 

    require_once "core/conexion.php";
    $consulta = Conexion::conectar()->prepare("SELECT nombre, img, descripcion FROM productos, categoria WHERE productos.fk_categoria=categoria.pk_categoria and categoria.nombre_categoria = 'herbisidas'");
            
    $consulta->execute();
    $resultado1 = $consulta->fetchAll();
    // $consulta->close();

    // echo '<script>alert("'.$valor.'")</script>';
?>

<!-- News jumbotron -->
<div class="jumbotron text-center hoverable p-4">

  <!-- Grid row -->
  <div class="row">
    <?php 
      foreach ($resultado1 as $dato => $valor) {
    ?>
    <div class="col-md-2 offset-md-1 mx-3 my-3">

      <!-- Featured image -->
      <div class="view overlay">
        <br><br><br>
        <img src="<?php echo $valor['img'] ?>" class="img-fluid" alt="insectisidas" width="250" height="250">
        <a>
          <div class="mask rgba-white-slight"></div>
        </a>
      </div>

    </div>


    <div class="col-md-3 text-md-left ml-3 mt-3">

      <h4 class="h4 mb-4" id="h3-catalogo"><?php echo $valor['nombre'] ?></h4>
    <hr>
      <p class="font-weight-normal text-justify"><?php echo $valor['descripcion'];?></p>

    </div>
    <?php 
      }
    ?>
  </div>
  <!-- Grid row -->

</div>
<!-- News jumbotron -->






<!-- fungisidas -->
<h3 id="h3-catalogo" class="wow fadeInUp delay-1s">FUNGICIDAS</h3>
<hr class="wow fadeInUp delay-1s">
<?php 
    require_once "vista/modulos/menu.php"; 

    require_once "core/conexion.php";
    $consulta = Conexion::conectar()->prepare("SELECT nombre, img, descripcion FROM productos, categoria WHERE productos.fk_categoria=categoria.pk_categoria and categoria.nombre_categoria = 'fungisidas'");
            
    $consulta->execute();
    $resultado1 = $consulta->fetchAll();
    // $consulta->close();
?>

<!-- News jumbotron -->
<div class="jumbotron text-center hoverable p-4">

  <!-- Grid row -->
  <div class="row">
    <?php 
      foreach ($resultado1 as $dato => $valor) {
    ?>
    <div class="col-md-2 offset-md-1 mx-3 my-3">

      <!-- Featured image -->
      <div class="view overlay">
        <br><br><br>
        <img src="<?php echo $valor['img'] ?>" class="img-fluid" alt="insectisidas" width="250" height="250">
        <a>
          <div class="mask rgba-white-slight"></div>
        </a>
      </div>

    </div>


    <div class="col-md-3 text-md-left ml-3 mt-3">

      <h4 class="h4 mb-4" id="h3-catalogo"><?php echo $valor['nombre'] ?></h4>
    <hr>
      <p class="font-weight-normal text-justify"><?php echo $valor['descripcion'];?></p>

    </div>
    <?php 
      }
    ?>
  </div>
  <!-- Grid row -->

</div>
<!-- News jumbotron -->






<!-- FOLIARES Y HORMONAS -->
<h3 id="h3-catalogo" class="wow fadeInUp delay-1s">FOLIARES Y HORMONAS</h3>
<hr class="wow fadeInUp delay-1s">
<?php 
    require_once "vista/modulos/menu.php"; 

    require_once "core/conexion.php";
    $consulta = Conexion::conectar()->prepare("SELECT nombre, img, descripcion FROM productos, categoria WHERE productos.fk_categoria=categoria.pk_categoria and categoria.nombre_categoria = 'foliares_y_hormonas'");
            
    $consulta->execute();
    $resultado1 = $consulta->fetchAll();
    // $consulta->close();

?>

<!-- News jumbotron -->
<div class="jumbotron text-center hoverable p-4">

  <!-- Grid row -->
  <div class="row">
    <?php foreach ($resultado1 as $dato => $valor) { ?>
    <div class="col-md-2 offset-md-1 mx-3 my-3">

      <!-- Featured image -->
      <div class="view overlay">
        <br><br><br>
        <img src="<?php echo $valor['img'] ?>" class="img-fluid" alt="insectisidas" width="250" height="250">
        <a>
          <div class="mask rgba-white-slight"></div>
        </a>
      </div>

    </div>


    <div class="col-md-3 text-md-left ml-3 mt-3">

      <h4 class="h4 mb-4" id="h3-catalogo"><?php echo $valor['nombre'] ?></h4>
    <hr>
      <p class="font-weight-normal text-justify"><?php echo $valor['descripcion'];?></p>

    </div>
    <?php 
      }
    ?>
  </div>
  <!-- Grid row -->

</div>
<!-- News jumbotron -->





<!-- FERTILIZANES -->
<h3 id="h3-catalogo" class="wow fadeInUp delay-1s">FERTILIZANTES</h3>
<hr class="wow fadeInUp delay-1s">
<?php 
    require_once "vista/modulos/menu.php"; 

    require_once "core/conexion.php";
    $consulta = Conexion::conectar()->prepare("SELECT nombre, img, descripcion FROM productos, categoria WHERE productos.fk_categoria=categoria.pk_categoria and categoria.nombre_categoria = 'fertilizantes'");
            
    $consulta->execute();
    $resultado1 = $consulta->fetchAll();
    // $consulta->close();
?>

<!-- News jumbotron -->
<div class="jumbotron text-center hoverable p-4">

  <!-- Grid row -->
  <div class="row">
    <?php foreach ($resultado1 as $dato => $valor) { ?>
    <div class="col-md-2 offset-md-1 mx-3 my-3">

      <!-- Featured image -->
      <div class="view overlay">
        <br><br><br>
        <img src="<?php echo $valor['img'] ?>" class="img-fluid" alt="insectisidas" width="250" height="250">
        <a>
          <div class="mask rgba-white-slight"></div>
        </a>
      </div>

    </div>


    <div class="col-md-3 text-md-left ml-3 mt-3">

      <h4 class="h4 mb-4" id="h3-catalogo"><?php echo $valor['nombre'] ?></h4>
    <hr>
      <p class="font-weight-normal text-justify"><?php echo $valor['descripcion'];?></p>

    </div>
    <?php 
      }
    ?>
  </div>
  <!-- Grid row -->

</div>
<!-- News jumbotron -->

<div align="center">
  <a href="usuarios"><button type="button" class="btn btn-primary">REGRESAR A LA PAGINA</button></a>
</div>














<style>
	.clearfix-padding {
		clear: both;
		padding: 2%;
	}

	#h3-catalogo {
		color: black; 
		text-align: center;
	}

	hr {
		max-width: 250px;
		height: 2px;
		border-radius: 1px;
		background: -webkit-linear-gradient(left, yellow, green);
		margin-top: 10px;
	}

	p{
		color: black;
	}

@media (max-width: 960px) {
    .clearfix-padding {
      margin-top: 50px;
    }
}
</style> 


<?php
    require_once "vista/modulos/contacto.php";
 ?>