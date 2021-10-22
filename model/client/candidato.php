<?php 
class Candidato{
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

	//-------------------------------Filtrar Candidato
	function filtrarCandidatos(){

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
		// return $query;
		if($query_complete->num_rows > 0){

			while($row = $query_complete->fetch_assoc()){
				array_push($res, $row);
			}
			$con->close();
			return $res;

		}else {
			return null;
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