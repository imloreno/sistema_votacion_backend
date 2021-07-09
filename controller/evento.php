<?php

switch ($_GET['target']){

	case "mostrar_usuario":

		include_once "model/evento.php";

		$evento = new Evento();
		$res = $evento->mostrarEventocompleto();

		if($res){
			print_r(json_encode($res));
		}
		
		break;

}