<?php

class Candidato {

	protected $id_candidato;
	protected $nombre_candidato;
	protected $apellidos_candidato;
	protected $ci_candidato;
	protected $ci_dpto_candidato;
	protected $fecha_nacimiento;
	protected $telefono_candidato;
	protected $perfil_candidato;
	protected $estado_candidato;


	//-------------------------------Insertar Candidato
	function insertarCandidato(){

		include_once "model/conexion.php";

		$query="
		INSERT INTO candidatos
		(
		nombre_candidato,
		apellidos_candidarto,
		ci_candidato,
		ci_dpto_candidato,
		fecha_nacimiento,
		telefono_candidato,
		perfil_candidato,
		estado_candidato
		)
		VALUES
		(
		'{$this->nombre_candidato}',
		'$this->apellidos_candidato',
		{$this->ci_candidato},
		'{$this->ci_dpto_candidato}',
		'{$this->fecha_nacimiento}',
		{$this->telefono_candidato},
		'{$this->perfil_candidato}',
		1
		)
		";

		if($con->query($query)){
			return true;
		}else{
			return false;
		}

	}


	//-------------------------------Modificar Candidato
	function modificarCandidato(){

		include_once "model/conexion.php";

		$query = "
		UPDATE conadidatos SET
		nombre_candidato = '{$this->nombre_candidato}'
		apellidos_candidarto = '{$this->apellido_candidarto}'
		ci_candidato = '{$this->ci_candidato}'
		ci_dpto_candidato = '{$this->ci_dpto_candidato}'
		fecha_nacimiento = '{$this->fecha_nacimiento}'
		telefono_candidato = '{$this->telefono_candidato}'
		perfil_candidato = '{$this->perfil_candidato}'
		WHERE id_candidato = {$this->id_candidato} AND estado = 1
		";

		if($con->query($query)){
			return true;
		}else{
			return false;
		}

	}

	/*
	----------------------------------Habilitar / Deshabilitar candidato
	Este método está hecho principalmente para inhabilitar al usuario
	ya que en las bases de datos no se deben eliminar los datos.
	Si se desea habilitar al usuario, se deberá agregar la opcion en 
	el archivo /controller/usuario.php
	*/

	function estadoCandidato(){

		include_once "model/conexion.php";

		$query = "
		UPDATE SET candidatos SET
		estado_candidato = {$this->estado_candidato}
		WHERE id_candidato = {$this->id_candidato}
		";

		if($con->query($query)){
			return true;
		}else{
			return false;
		}
	}


	//-------------------------------GETTERS & SETTERS
	//GETTERS
	function getid_candidato(){
	    return $this->id_candidato;
	}
	 
	function getnombre_candidato(){
	    return $this->nombre_candidato;
	}
	 
	function getapellidos_candidato(){
	    return $this->apellidos_candidato;
	}
	 
	function getci_candidato(){
	    return $this->ci_candidato;
	}
	 
	function getci_dpto_candidato(){
	    return $this->ci_dpto_candidato;
	}
	 
	function getfecha_nacimiento(){
	    return $this->fecha_nacimiento;
	}
	 
	function gettelefono_candidato(){
	    return $this->telefono_candidato;
	}
	 
	function getperfil_candidato(){
	    return $this->perfil_candidato;
	}
	 
	function getestado_candidato(){
	    return $this->estado_candidato;
	}


	//SETTERS
	function setid_candidato($x){
	    $this->id_candidato = $x;
	}
	 
	function setnombre_candidato($x){
	    $this->nombre_candidato = $x;
	}
	 
	function setapellidos_candidato($x){
	    $this->apellidos_candidato = $x;
	}
	 
	function setci_candidato($x){
	    $this->ci_candidato = $x;
	}
	 
	function setci_dpto_candidato($x){
	    $this->ci_dpto_candidato = $x;
	}
	 
	function setfecha_nacimiento($x){
	    $this->fecha_nacimiento = $x;
	}
	 
	function settelefono_candidato($x){
	    $this->telefono_candidato = $x;
	}
	 
	function setperfil_candidato($x){
	    $this->perfil_candidato = $x;
	}
	 
	function setestado_candidato($x){
	    $this->estado_candidato = $x;
	}

}