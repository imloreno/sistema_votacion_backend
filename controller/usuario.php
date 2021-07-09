<?php

/*
Se verifica que $_GET['target'] especifique la peticiión
para comprobar los datos POST y responder con un JSON
*/

if( //---------------------------------------Validar
	$_GET['target'] == "validar_usuario" &&
	isset($_POST['usuario_acceso']) && 
	isset($_POST['clave_acceso']) 
){

	include "model/usuario.php";

	$usuario = new Usuario();
	$usuario->setusuario_acceso($_POST['usuario_acceso']);
	$usuario->setclave_acceso($_POST['clave_acceso']);

	print_r(json_encode($usuario->validarUsuario()));

}else if( //---------------------------------------Insertar
	$_GET['target'] == "insertar_usuario" &&
	isset($_POST['nombre_usuario']) &&
	isset($_POST['apellido_usuario']) &&
	isset($_POST['ci_usuario']) &&
	isset($_POST['ci_dpto_usuario']) &&
	isset($_POST['telefono_usuario']) &&
	isset($_POST['email_usuario']) &&
	isset($_POST['tipo_usuario']) &&
	isset($_POST['usuario_acceso']) &&
	isset($_POST['clave_acceso'])
){

	$nombre = $_POST['nombre_usuario'];
	$apellido = $_POST['apellido_usuario'];
	$ci = $_POST['ci_usuario'];
	$ciDpto = $_POST['ci_dpto_usuario'];
	$telefono = $_POST['telefono_usuario'];
	$email = $_POST['email_usuario'];
	$tipo = $_POST['tipo_usuario'];
	$user = $_POST['usuario_acceso'];
	$pass = $_POST['clave_acceso'];

	include "model/usuario.php";

	$usuario = new Usuario();
	$usuario->setnombre_usuario($nombre);
	$usuario->setapellido_usuario($apellido);
	$usuario->setci_usuario($ci);
	$usuario->setci_dpto_usuario($ciDpto);
	$usuario->settelefono_usuario($telefono);
	$usuario->setemail_usuario($email);
	$usuario->settipo_usuario($tipo);
	$usuario->setusuario_acceso($user);
	$usuario->setclave_acceso($pass);
	$usuario->setestado(1);

	if($usuario->insertarUsuario()){
		print_r(json_encode(true));
	}

}else if( //---------------------------------------Modificar
	$_GET['target'] == "modificar_usuario" &&
	isset($_POST['id_usuario']) &&
	isset($_POST['nombre_usuario']) &&
	isset($_POST['apellido_usuario']) &&
	isset($_POST['ci_usuario']) &&
	isset($_POST['ci_dpto_usuario']) &&
	isset($_POST['telefono_usuario']) &&
	isset($_POST['email_usuario']) &&
	isset($_POST['tipo_usuario']) &&
	isset($_POST['usuario_acceso']) &&
	isset($_POST['clave_acceso'])
){

	include "model/usuario.php";

	$id = $_POST['id_usuario'];
	$nombre = $_POST['nombre_usuario'];
	$apellido = $_POST['apellido_usuario'];
	$ci = $_POST['ci_usuario'];
	$ciDpto = $_POST['ci_dpto_usuario'];
	$telefono = $_POST['telefono_usuario'];
	$email = $_POST['email_usuario'];
	$tipo = $_POST['tipo_usuario'];
	$user = $_POST['usuario_acceso'];
	$pass = $_POST['clave_acceso'];

	$usuario = new Usuario();
	$usuario->setid_usuario($id);
	$usuario->setnombre_usuario($nombre);
	$usuario->setapellido_usuario($apellido);
	$usuario->setci_usuario($ci);
	$usuario->setci_dpto_usuario($ciDpto);
	$usuario->settelefono_usuario($telefono);
	$usuario->setemail_usuario($email);
	$usuario->settipo_usuario($tipo);
	$usuario->setusuario_acceso($user);
	$usuario->setclave_acceso($pass);
	$usuario->setestado(1);

	if($usuario->modificarUsuario()){
		print_r(json_encode(true));
	}

}else if( //---------------------------------------Deshabilitar
	$_GET['target'] == "eliminar_usuario" &&
	isset($_POST['id_usuario'])
){
	include "model/usuario.php";

	$usuario = new Usuario();
	$usuario->setid_usuario($_POST['id_usuario']);
	$usuario->setestado(0);
	
	if($usuario->estadoUsuario()){
		echo "true";
	}
}