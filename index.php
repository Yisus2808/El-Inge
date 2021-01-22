<?php
require_once './core/configGeneral.php';
require_once './controlador/vistasControlador.php';

$pagina = new vistasControlador();
$pagina -> integrar_plantilla_controlador();