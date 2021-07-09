<?php 

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
			include "controller/usuario.php";
			break;
		
		case "candidato":
			include "controller/candidato.php";
			break;

		case "evento":
			include "controller/evento.php";
			break;

		default:
			// code...
			break;
	}

}