<?php 
session_start();

if (isset($_SESSION['user_id'])) {
	echo '<script> window.location.href="inge.php"</script>';
	// header('Location: /proyecto/El-Inge/inge.php') ;
}

require 'core/conexion.php';

if (!empty($_POST['usuario']) && !empty($_POST['password'])) {

	$records = $consulta = Conexion::conectar()->prepare("SELECT pk_inge, admin, pass FROM inge WHERE admin = :usr");

	$records->bindParam(':usr', $_POST['usuario']);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);

	$message = '';

	if ($_POST['password'] == $results['pass']) {
		$_SESSION['user_id'] = $results['pk_inge'];
		echo '<script> window.location.href="inge.php"</script>';
	}else{
		$message = 'Estas credenciales son incorrectas';
		?>
		<script>
			setTimeout(function () {
				document.querySelector('.message').remove();
			}, 6000);
		</script>
		<?php
	}
}

?>


<style>
	body{
background: #b92b27;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #1565C0, #b92b27);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #1565C0, #b92b27); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

    }

    .card {
    	margin-top: 120px;
    }

</style>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width-device-eidth, user-scalable=no, initial-dcale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>LOGIN</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<?php 
		include('vista/modulos/css.php');
	?>
</head>
<body>
<!-- FORMULARIO -->
<div class="container" align="center">
	<div class="col-md-6 mt-6">
		<div class="card">
			<div class="card-body">
				<h3 class="text-center indigo-text">
					<p>SOLO EL ADMINISTRADOR PUEDE INICIAR SESIÓN</p>
				</h3>
				<hr>

				<form method="POST" autocomplete="false" action="login.php" id="formulario">
					<div class="md-form" align="left">
						<i class="fas fa-user prefix indigo-text"></i>
						<input type="text" id="usuario" name="usuario" class="form-control" required pattern="[A-Za-z]{2,10}" title="Introduce entre 2 y 15 letras" maxlength="10">
						<label for="usuario">Usuario:</label>
					</div>

					<div class="md-form" align="left">
						<i class="fas fa-key prefix indigo-text"></i>
						<input type="password" id="password" name="password" class="form-control" required title="Permitidos Números y Letras" maxlength="6">
						<label for="password">Password:</label>
					</div>
					
					<?php if (!empty($message)): ?>
					<p style="color: red;" class="message" id="message"> <?= $message ?></p>
					<?php endif; ?>

					<div class="text-center">
						<button type="submit" class="btn btn-indigo btn-block my-4" value="Submit">ENTRAR</button>
					</div>
					<div class="text-center">
						<a href="usuarios"><button type="button" class="btn btn-indigo btn-block my-4">REGRESAR</button></a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
	<!-- SCRIPTS -->
	<?php  include('vista/modulos/script.php');?>
</body>
</html>