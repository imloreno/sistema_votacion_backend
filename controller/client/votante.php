<?php 

if(
	$_GET['target'] == "lista_eventos"
){

	include_once "model/client/votante.php";
	$evento = new Evento();
	print_r(json_encode($evento->listaEventos()));

}else if(
	$_GET['target'] == "filtrar_candidatos" &&
	isset($_POST['nro'])
){

	include_once "model/client/candidato.php";
	$candidato = new Candidato();
	$candidato->setaux_var($_POST['nro']);
	print_r(json_encode($candidato->filtrarCandidatos()));

}