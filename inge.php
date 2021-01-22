<?php 

session_start();
const SERVERURL = "http://localhost/el-inge/";

require 'core/conexion.php';

if (isset($_SESSION['user_id'])) {
	$records = $consulta = Conexion::conectar()->prepare('SELECT pk_inge, admin, pass FROM inge WHERE pk_inge = :id');
	$records->bindParam(':id', $_SESSION['user_id']);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);

	$user=null;

	if (count($results) > 0) {
		$user=$results;
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width-device-eidth, user-scalable=no, initial-dcale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>EL-INGE</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<?php 
		include('vista/modulos/css.php');
	?>
	<!-- Custom Css -->
<!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
</head>
<body>
<style>
	body{
	background-image: url('vista/assets/img/campo.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    }
</style>
<?php if(!empty($user)): ?>
<!-- TODO EL CODIGO -->
<!-- <script>
	alert("BIENVEDIO ADMINISTRADOR");
</script> -->
<!-- <a href="salir.php">
Logout
</a> -->


<?php 
require_once "menuAdmin.php";
echo "<br>";
echo "<br>";
require_once "vista/modulos/principal.php";
require_once "AddMarcas.php";
require_once "AddProductos.php";
require_once "vista/modulos/contacto.php";
?>






























<?php 

else: 

echo '<script> window.location.href="usuarios"</script>'; 

endif; 

?>	
	
	<!-- SCRIPTS -->
	<?php  include('vista/modulos/script.php');?>
</body>
</html>

