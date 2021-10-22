<?php

/*
Se verifica que $_GET['target'] especifique la peticiión
para comprobar los datos POST y responder con un JSON
*/

if( //---------------------------------------Insertar
	$_GET['target'] == "insertar_candidato" &&
	isset($_POST['nombres']) && 
	isset($_POST['apellidos']) &&
	isset($_POST['ci']) && 
	isset($_POST['ci_dpto']) &&
	isset($_POST['nacimiento']) && 
	isset($_POST['telf']) &&
	isset($_FILES['perfil_cand'])
){

	$nombre = $_POST['nombres'];
	$apellido = $_POST['apellidos'];
	$ci = $_POST['ci'];
	$ci_dpto = $_POST['ci_dpto'];
	$fecha_nacimiento = $_POST['nacimiento'];
	$telefono_candidato = $_POST['telf'];
	$perfil_candidato = $_FILES['perfil_cand'];

	include_once "model/candidato.php";

	$candidato = new Candidato();
	$candidato->setnombre_candidato($nombre);
	$candidato->setapellidos_candidato($apellido);
	$candidato->setci_candidato($ci);
	$candidato->setci_dpto_candidato($ci_dpto);
	$candidato->setfecha_nacimiento($fecha_nacimiento);
	$candidato->settelefono_candidato($telefono_candidato);
	$candidato->setperfil_candidato($perfil_candidato);

	print_r(json_encode($candidato->insertarCandidato()));

}else if( //---------------------------------------Modificar

	$_GET['target'] == "modificar_candidato" &&
	isset($_POST['nro']) && 
	isset($_POST['nombres']) && 
	isset($_POST['apellidos']) &&
	isset($_POST['ci']) && 
	isset($_POST['ci_dpto']) &&
	isset($_POST['nacimiento']) && 
	isset($_POST['telf'])

){

	$id = $_POST['nro'];
	$nombre = $_POST['nombres'];
	$apellido = $_POST['apellidos'];
	$ci = $_POST['ci'];
	$ci_dpto = $_POST['ci_dpto'];
	$fecha_nacimiento = $_POST['nacimiento'];
	$telefono_candidato = $_POST['telf'];

	include_once "model/candidato.php";

	$candidato = new Candidato();
	$candidato->setid_candidato($id);
	$candidato->setnombre_candidato($nombre);
	$candidato->setapellidos_candidato($apellido);
	$candidato->setci_candidato($ci);
	$candidato->setci_dpto_candidato($ci_dpto);
	$candidato->setfecha_nacimiento($fecha_nacimiento);
	$candidato->settelefono_candidato($telefono_candidato);

	if(isset($_FILES['perfil']) && isset($_POST['perfil_url'])){
		if($_FILES['perfil']['size'] > 0){
			$candidato->setaux_var($_POST['perfil_url']);
			$candidato->setperfil_candidato($_FILES['perfil']);
		}
	}

	// echo $candidato->modificarCandidato();
	print_r(json_encode($candidato->modificarCandidato()));

}else if( //---------------------------------------Deshabilitar
	$_GET['target'] == "eliminar_candidato" &&
	isset($_POST['nro'])
){
	include "model/candidato.php";
	$candidato = new Candidato();
	$candidato->setid_candidato($_POST['nro']);
	$candidato->setestado_candidato(0);
	print_r(json_encode($candidato->eliminarCandidato()));

}else if( //---------------------------------------Mostrar lista de candidatos de una categoria
	$_GET['target'] == "filtro1_candidatos" &&
	isset( $_POST['nro_categoria'] )
){
	include "model/candidato.php";
	$candidato = new Candidato();
	$candidato->setaux_var($_POST['nro_categoria']);
	print_r(json_encode($candidato->mostrarCandidatos()));
	
}else if( //---------------------------------------Mostrar lista de candidatos de 10 en 10
	$_GET['target'] == "lista_candidatos" &&
	isset( $_POST['pagination'] )
){
	include "model/candidato.php";
	$candidato = new Candidato();
	$candidato->setaux_var( $_POST['pagination'] );
	print_r(json_encode($candidato->listaCandidatos()));

}else if( //---------------------------------------Mostrar cantidad de candidatos
	$_GET['target'] == "cantidad_candidatos"
){
	include "model/candidato.php";
	$candidato = new Candidato();
	echo $candidato->cantidadCandidatos();
	
}