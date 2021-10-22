<?php 

date_default_timezone_set('America/La_Paz');

/*
Comprueba las variables GET
show = Request: usuario - votante - candidato - evento
target = Especifica cuál es la petición
*/

//------------------validar usuario

if(
	isset($_GET['show']) &&
	isset($_GET['target'])
){

	switch ( $_GET['show'] ) {

		case "usuario":
			include_once "controller/admin/usuario.php";
			break;
		
		case "candidato":
			include_once "controller/admin/candidato.php";
			break;

		case "evento":
			include_once "controller/admin/evento.php";
			break;

		case "categoria":
			include_once "controller/admin/categoria.php";
			break;

		case "candidato_categoria":
			include_once "controller/admin/candidato_categoria.php";
			break;

		case "votante":
			include_once "controller/client/votante.php";
			break;

		default:
			// code...
			break;
	}

}