<?php

if(
	isset($_GET['target']) &&
	$_GET['target'] == "mostrar_eventos"
){
	
	include_once "model/evento.php";
	$evento = new Evento();
	print_r(json_encode($evento->mostrarEventocompleto()));

}elseif(
	isset($_GET['target']) &&
	isset($_POST['nombre_evento']) &&
	isset($_POST['fecha_inicio']) &&
	isset($_POST['dia_elecciones']) &&
	isset($_POST['dia_elecciones_final']) &&
	isset($_POST['fecha_final']) &&
	$_GET['target'] == "agregar_evento"
){

	include_once "model/evento.php";

	$evento = new Evento();
	$evento->setnombre_evento($_POST['nombre_evento']);
	$evento->setinicio_evento($_POST['fecha_inicio']);
	$evento->setinicio_elecciones($_POST['dia_elecciones']);
	$evento->setfinal_elecciones($_POST['dia_elecciones_final']);
	$evento->setfinal_evento($_POST['fecha_final']);

	print_r(json_encode($evento->insertarEvento()));

}elseif(
	isset($_GET['target']) &&
	isset($_POST['nro_evento']) &&
	isset($_POST['nombre_evento']) &&
	isset($_POST['fecha_inicio']) &&
	isset($_POST['dia_elecciones']) &&
	isset($_POST['dia_elecciones_final']) &&
	isset($_POST['fecha_final']) &&
	$_GET['target'] == "modificar_evento"
){

	include_once "model/evento.php";

	$evento = new Evento();
	$evento->setid_evento($_POST['nro_evento']);
	$evento->setnombre_evento($_POST['nombre_evento']);
	$evento->setinicio_evento($_POST['fecha_inicio']);
	$evento->setinicio_elecciones($_POST['dia_elecciones']);
	$evento->setfinal_elecciones($_POST['dia_elecciones_final']);
	$evento->setfinal_evento($_POST['fecha_final']);

	print_r(json_encode($evento->modificarEvento()));

}elseif(
	isset($_GET['target']) &&
	isset($_POST['nro_evento']) &&
	$_GET['target'] == "eliminar_evento"
){

	include_once "model/evento.php";

	$evento = new Evento();
	$evento->setid_evento($_POST['nro_evento']);
	$evento->setestado(0);

	print_r(json_encode($evento->deshabilitarEvento()));

}