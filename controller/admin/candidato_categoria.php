<?php

if( //---------------------------------------Asignar candidato a cateogria
	$_GET['target'] == "asignar_candidato" &&
	isset($_POST['candidato']) && 
	isset($_POST['categoria'])
){

	include_once "model/candidato_categoria.php";
	$candidato = new AsignarCategoria();
	$candidato->setid_categoria($_POST['categoria']);
	$candidato->setid_candidato($_POST['candidato']);

	// echo $candidato->asignarCategoría();
	print_r(json_encode($candidato->asignarCategoría()));

}else if( //---------------------------------------Desvincular candidato a cateogria
	$_GET['target'] == "desvincular_candidato" &&
	isset($_POST['candidato']) && 
	isset($_POST['categoria'])
){

	include_once "model/candidato_categoria.php";
	$candidato = new AsignarCategoria();
	$candidato->setid_categoria($_POST['categoria']);
	$candidato->setid_candidato($_POST['candidato']);

	// echo $candidato->desvincularCategoría();
	print_r(json_encode($candidato->desvincularCategoría()));

}