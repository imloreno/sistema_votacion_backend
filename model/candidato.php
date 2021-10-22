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
	protected $aux_var;


	//-------------------------------Insertar Candidato
	function insertarCandidato(){

		include_once "model/conexion.php";

		//Validacion del perfil
		$imagen = $this->perfil_candidato;
		if(isset($imagen) && $imagen != "" && $imagen['size'] < 1000000){

			$extension = pathinfo($imagen['name'], PATHINFO_EXTENSION);
			$carpeta = str_replace(" ", "", $this->nombre_candidato.$this->apellidos_candidato);
			$carpeta = mb_strtolower($carpeta, "UTF-8")."-".date('dmy_Hisv');
			$dir_img = "view/img/candidate/{$carpeta}/perfil.".$extension;
			mkdir(
				"./view/img/candidate/{$carpeta}",
				0777,
				false
			);
			move_uploaded_file($imagen['tmp_name'], $dir_img);
			$this->setperfil_candidato($dir_img);

		}else{
			$this->setperfil_candidato("");
		}


		$query="
		INSERT INTO candidatos
		(
		nombre_candidato,
		apellidos_candidato,
		ci_candidato,
		ci_dpto_candidato,
		fecha_nacimiento,
		telefono_candidato,
		perfil_candidato,
		estado
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

		//Validacion del perfil
		if( $this->perfil_candidato ){

			$imagen = $this->perfil_candidato;

			if(isset($imagen) && $imagen != "" && $imagen['size'] < 1000000){

				$extension = pathinfo($imagen['name'], PATHINFO_EXTENSION);

				if($this->aux_var){ //verifica si había una imagen antes o no
					$carpeta_antigua = str_replace(".jpg", "", $this->aux_var);
					$carpeta_antigua = str_replace(".png", "", $carpeta_antigua);
					$carpeta_antigua = str_replace(".jpeg", "", $carpeta_antigua);
					$carpeta_antigua = str_replace(".gif", "", $carpeta_antigua);
					$dir_img = $carpeta_antigua.".".$extension;
				}else{
					$carpeta = str_replace(" ", "", $this->nombre_candidato.$this->apellidos_candidato);
					$carpeta = mb_strtolower($carpeta, "UTF-8")."-".date('dmy_Hisv');
					$dir_img = "view/img/candidate/{$carpeta}/perfil.".$extension;
					mkdir(
						"./view/img/candidate/{$carpeta}",
						0777,
						false
					);
				}

				move_uploaded_file($imagen['tmp_name'], $dir_img);
				$this->setperfil_candidato($dir_img);

			}else{
				$this->setperfil_candidato("");
			}

		}

		include_once "model/conexion.php";

		if( $this->perfil_candidato ){
			$query = "
			UPDATE candidatos SET
			nombre_candidato = '{$this->nombre_candidato}',
			apellidos_candidato = '{$this->apellidos_candidato}',
			ci_candidato = '{$this->ci_candidato}',
			ci_dpto_candidato = '{$this->ci_dpto_candidato}',
			fecha_nacimiento = '{$this->fecha_nacimiento}',
			telefono_candidato = {$this->telefono_candidato},
			perfil_candidato = '{$this->perfil_candidato}'
			WHERE id_candidato = {$this->id_candidato} AND estado = 1
			";
		}else{
			$query = "
			UPDATE candidatos SET
			nombre_candidato = '{$this->nombre_candidato}',
			apellidos_candidato = '{$this->apellidos_candidato}',
			ci_candidato = '{$this->ci_candidato}',
			ci_dpto_candidato = '{$this->ci_dpto_candidato}',
			fecha_nacimiento = '{$this->fecha_nacimiento}',
			telefono_candidato = {$this->telefono_candidato}
			WHERE id_candidato = {$this->id_candidato} AND estado = 1
			";
		}
		// return $query;
		if($con->query($query)){
			return true;
		}else{
			return false;
		}

	}


	//-------------------------------Filtrar Candidato
	function mostrarCandidatos(){

		include_once "model/conexion.php";

		$query = "
		SELECT
		candidatos.id_candidato AS 'nro',
		candidatos.nombre_candidato AS 'nombres',
		candidatos.apellidos_candidato AS 'apellidos',
		candidatos.ci_candidato AS 'carnet',
		candidatos.ci_dpto_candidato AS 'dptocarnet',
		candidatos.fecha_nacimiento AS 'nacimiento',
		candidatos.telefono_candidato AS 'celular',
		candidatos.perfil_candidato AS 'foto',
		categoria_candidato.cantidad_votos
		FROM candidatos 

		JOIN categoria_candidato
		ON candidatos.id_candidato = categoria_candidato.id_candidato
		WHERE 
		candidatos.estado = 1 AND 
		categoria_candidato.estado = 1 AND 
		categoria_candidato.id_categoria = {$this->aux_var}
		";
		$query_complete = $con->query($query);
		$res = [];

		if($query_complete->num_rows > 0){

			while($row = $query_complete->fetch_assoc()){
				array_push($res, $row);
			}
			$con->close();
			return $res;

		}else {
			return;
		}

	}

	/*
	----------------------------------Habilitar / Deshabilitar candidato
	Este método está hecho principalmente para inhabilitar al usuario
	ya que en las bases de datos no se deben eliminar los datos.
	Si se desea habilitar al usuario, se deberá agregar la opcion en 
	el archivo /controller/usuario.php
	*/

	function eliminarCandidato(){

		include_once "model/conexion.php";

		$query = "
		UPDATE candidatos SET
		estado = {$this->estado_candidato}
		WHERE id_candidato = {$this->id_candidato}
		";

		if($con->query($query)){
			return true;
		}else{
			return false;
		}
	}

	//-------------------------------Lsta Candidatos
	function listaCandidatos(){
		include "model/conexion.php";
		$numItems = 5;
		$primerItem = ($numItems * $this->aux_var) - $numItems;
		$query = "
		SELECT 
		id_candidato as 'nro',
		nombre_candidato as 'nombre',
		apellidos_candidato as 'apellidos',
		ci_candidato as 'ci',
		ci_dpto_candidato as 'ci_dpto',
		fecha_nacimiento as 'nacimiento',
		telefono_candidato as 'telefono',
		perfil_candidato as 'perfil'
		FROM candidatos
		WHERE 
		estado = 1
		ORDER BY apellidos_candidato ASC
		LIMIT {$primerItem}, {$numItems}
		";

		$query_complete = $con->query($query);
		$res = [];

		if($query_complete->num_rows > 0){

			while($row = $query_complete->fetch_assoc()){
				array_push($res, $row);
			}
			$con->close();
			return $res;

		}else {
			return false;
		}
	}

	//-------------------------------Cantidad Candidatos
	function cantidadCandidatos(){
		
		include "model/conexion.php";
		$query = "
		SELECT COUNT(id_candidato) AS 'cantidad'
		FROM candidatos
		WHERE estado = 1
		";

		$result = $con->query($query);
		if($result->num_rows == 1){
			echo ($result->fetch_assoc()['cantidad']);
		}else{
			echo 0;
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

	function setaux_var($x){
		 $this->aux_var = $x;
	}

}