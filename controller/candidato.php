<?php

/*
Se verifica que $_GET['target'] especifique la peticiión
para comprobar los datos POST y responder con un JSON
*/

if( //---------------------------------------Insertar
	$_GET['target'] == "insertar_candidato" &&
	isset($_POST['nombre_candidato']) && 
	isset($_POST['apellidos_candidato']) &&
	isset($_POST['ci_candidato']) && 
	isset($_POST['ci_dpto_candidato']) &&
	isset($_POST['fecha_nacimiento']) && 
	isset($_POST['telefono_candidato']) &&
	isset($_POST['perfil_candidato'])
){

	$nombre = $_POST['nombre_candidato'];
	$apellido = $_POST['apellidos_candidato'];
	$ci = $_POST['ci_candidato'];
	$ci_dpto = $_POST['ci_dpto_candidato'];
	$fecha_nacimiento = $_POST['fecha_nacimiento'];
	$telefono_candidato = $_POST['telefono_candidato'];
	$perfil_candidato = $_POST['perfil_candidato'];

	include_once "model/candidato.php";

	$candidato = new Candidato();
	$candidato->setnombre_candidato($nombre);
	$candidato->setapellidos_candidato($apellido);
	$candidato->setci_candidato($ci);
	$candidato->setci_dpto_candidato($ci_dpto);
	$candidato->setfecha_nacimiento($fecha_nacimiento);
	$candidato->settelefono_candidato($telefono_candidato);
	$candidato->setperfil_candidato($perfil_candidato);

	if($candidato->insertarCandidato()){
		print_r(json_encode(true));
	}

}else if( //---------------------------------------Modificar

	$_GET['target'] == "modificar_candidato" &&
	isset($_POST['id_candidato']) && 
	isset($_POST['nombre_candidato']) && 
	isset($_POST['apellidos_candidato']) &&
	isset($_POST['ci_candidato']) && 
	isset($_POST['ci_dpto_candidato']) &&
	isset($_POST['fecha_nacimiento']) && 
	isset($_POST['telefono_candidato']) &&
	isset($_POST['perfil_candidato'])

){

	$id = $_POST['id_candidato'];
	$nombre = $_POST['nombre_candidato'];
	$apellido = $_POST['apellido_candidato'];
	$ci = $_POST['ci_candidato'];
	$ci_dpto = $_POST['ci_dpto_candidato'];
	$fecha_nacimiento = $_POST['fecha_candidato'];
	$telefono_candidato = $_POST['telefono_candidato'];
	$perfil_candidato = $_POST['perfil_candidato'];

	include_once "model/candidato.php";

	$candidato = new Candidato();
	$candidato->setid_candidato($id);
	$candidato->setnombre_candidato($nombre);
	$candidato->setapellidos_candidato($apellido);
	$candidato->setci_candidato($ci);
	$candidato->setci_dpto_candidato($ci_dpto);
	$candidato->setfecha_nacimiento($fecha_nacimiento);
	$candidato->settelefono_candidato($telefono_candidato);
	$candidato->setperfil_candidato($perfil_candidato);

	if($candidato->modificarCandidato()){
		print_r(json_encode(true));
	}

}else if( //---------------------------------------Deshabilitar
	$_GET['target'] == "eliminar_candidato" &&
	isset($_POST['id_candidato'])
){
	include "model/candidato.php";

	$candidato = new Usuario();
	$candidato->setid_candidato($_POST['id_candidato']);
	$candidato->setestado(0);
	
	if($candidato->estadoCandidato()){
		print_r(json_encode(true));
	}
}