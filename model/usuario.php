<?php 

class Usuario {

	protected $id_usuario;
	protected $nombre_usuario;
	protected $apellido_usuario;
	protected $ci_usuario;
	protected $ci_dpto_usuario;
	protected $telefono_usuario;
	protected $email_usuario;
	protected $tipo_usuario;
	protected $usuario_acceso;
	protected $clave_acceso;
	protected $estado;


	//------------------------------Insertar usuario

	function insertarUsuario(){

		include_once "model/conexion.php";

		$query = "
		INSERT INTO usuario
		(
		nombre_usuario,
		apellido_usuario,
		ci_usuario,
		ci_dpto_usuario,
		telefono_usuario,
		email_usuario,
		tipo_usuario,
		usuario_acceso,
		clave_acceso,
		estado
		)
		VALUES	
		(
		'{$this->nombre_usuario}',
		'{$this->apellido_usuario}',
		{$this->ci_usuario},
		'{$this->ci_dpto_usuario}',
		{$this->telefono_usuario},
		'{$this->email_usuario}',
		'{$this->tipo_usuario}',
		'{$this->usuario_acceso}',
		'{$this->clave_acceso}',
		{$this->estado}
		)
		";

		if($con->query($query)){
			return true;
		}else{
			return false;
		}
	}


	//------------------------------Modificar usuario

	function modificarUsuario(){

		include_once "model/conexion.php";

		$query="
		UPDATE usuario SET 
		nombre_usuario='{$this->nombre_usuario}',
		apellido_usuario='{$this->apellido_usuario}',
		ci_usuario={$this->ci_usuario},
		ci_dpto_usuario='{$this->ci_dpto_usuario}',
		telefono_usuario={$this->telefono_usuario},
		email_usuario='{$this->email_usuario}',
		tipo_usuario='{$this->tipo_usuario}',
		usuario_acceso='{$this->usuario_acceso}',
		clave_acceso='{$this->clave_acceso}'
		WHERE id_usuario={$this->id_usuario}
		";

		if($con->query($query)){
			return true;
		}else{
			return false;
		}
	}


	/*
	---------------------------------Habilitar / Inhabilitar usuario
	Este método está hecho principalmente para inhabilitar al usuario
	ya que en las bases de datos no se deben eliminar los datos.
	Si se desea habilitar al usuario, se deberá agregar la opcion en 
	el archivo /controller/usuario.php
	*/

	function estadoUsuario(){

		include_once "model/conexion.php";

		$query="
		UPDATE usuario SET 
		estado={$this->estado}
		WHERE id_usuario = {$this->id_usuario}
		";

		if($con->query($query)){
			return true;
		}else{
			return false;
		}
	}


	/*
	---------------------------------Eliminar usuario
	No es recomendable usar este método, salvo que realmente se lo necesite
	*/

	function eliminarUsuario(){

		include_once "model/conexion.php";

		$query="
		DELETE FROM usuario WHERE id_usuario = {$this->id_usuario}
		";

		if($con->query($query)){
			return true;
		}else{
			return false;
		}
	}


	//------------------------------Mostrar lista de usuarios

	function mostrarUsuarios(){
		$query="
		SELECT * FROM 
		";
	}


	//------------------------------Validar usuario

	function validarUsuario(){

		include_once "model/conexion.php";

		$query="
		SELECT * FROM usuario WHERE usuario_acceso='{$this->usuario_acceso}' AND clave_acceso='{$this->clave_acceso}' LIMIT 1
		";
		$query_complete = $con->query($query);

		if($query_complete->num_rows > 0){
			return $query_complete->fetch_assoc();
		}else{
			return;
		}
	}


	//--------------------------Getters & setters
	//Getters
	function getid_usuario(){
	    return $this->id_usuario;
	}
	 
	function getnombre_usuario(){
	    return $this->nombre_usuario;
	}
	 
	function getapellido_usuario(){
	    return $this->apellido_usuario;
	}
	 
	function getci_usuario(){
	    return $this->ci_usuario;
	}
 
	function getci_dpto_usuario(){
	    return $this->ci_dpto_usuario;
	}
	 
	function gettelefono_usuario(){
	    return $this->telefono_usuario;
	}
	 
	function getemail_usuario(){
	    return $this->email_usuario;
	}
	 
	function gettipo_usuario(){
	    return $this->tipo_usuario;
	}
	 
	function getusuario_acceso(){
	    return $this->usuario_acceso;
	}
	 
	function getclave_acceso(){
	    return $this->clave_acceso;
	}
	 
	function getestado(){
	    return $this->estado;
	}

	//Setters
	function setid_usuario($x){
    $this->id_usuario = $x;
	}
	 
	function setnombre_usuario($x){
	    $this->nombre_usuario = $x;
	}
	 
	function setapellido_usuario($x){
	    $this->apellido_usuario = $x;
	}
	 
	function setci_usuario($x){
	    $this->ci_usuario = $x;
	}
 
	function setci_dpto_usuario($x){
	    $this->ci_dpto_usuario = $x;
	}
	 
	function settelefono_usuario($x){
	    $this->telefono_usuario = $x;
	}
	 
	function setemail_usuario($x){
	    $this->email_usuario = $x;
	}
	 
	function settipo_usuario($x){
	    $this->tipo_usuario = $x;
	}
	 
	function setusuario_acceso($x){
	    $this->usuario_acceso = $x;
	}
	 
	function setclave_acceso($x){
	    $this->clave_acceso = $x;
	}
	 
	function setestado($x){
	    $this->estado = $x;
	}

}