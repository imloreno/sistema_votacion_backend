<?php

if( //Filtrar categorias segun el nro de evento
	$_GET['target'] == "filtrar_categoria" &&
	isset( $_POST['nro_evento'] )
){
	include "model/categoria.php";
	$categoria = new Categoria();
	$categoria->setid_evento($_POST['nro_evento']);
	print_r(json_encode($categoria->filtrarCategoria()));
	
}else if( //Agregar categoria
	$_GET['target'] == "agregar_categoria" &&
	isset( $_POST['nro_evento'] ) &&
	isset( $_POST['nombre_categoria'] )
){

	include "model/categoria.php";
	$categoria = new Categoria();
	$categoria->setid_evento($_POST['nro_evento']);
	$categoria->setnombre_categoria($_POST['nombre_categoria']);

	print_r(json_encode($categoria->insertarCategoria()));
	
}else if( //Modificar categoria
	$_GET['target'] == "modificar_categoria" &&
	isset( $_POST['nro_categoria'] ) &&
	isset( $_POST['nro_evento'] ) &&
	isset( $_POST['nombre_categoria'] )
){

	include "model/categoria.php";
	$categoria = new Categoria();
	$categoria->setid_categoria($_POST['nro_categoria']);
	$categoria->setid_evento($_POST['nro_evento']);
	$categoria->setnombre_categoria($_POST['nombre_categoria']);

	print_r(json_encode($categoria->modificarCategoria()));
	
}else if( //Eliminar categoria
	$_GET['target'] == "eliminar_categoria" &&
	isset( $_POST['nro_categoria'] )
){
	include "model/categoria.php";
	$categoria = new Categoria();
	$categoria->setid_categoria($_POST['nro_categoria']);
	$categoria->setestado(0);
	print_r(json_encode($categoria->eliminarCategoria()));
	
}