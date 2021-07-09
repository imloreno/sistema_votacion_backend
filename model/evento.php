<?php 

class Evento {

	protected $id_evento;
	protected $nombre_evento;
	protected $inicio_evento;
	protected $inicio_elecciones;
	protected $final_evento;
	protected $estado;



	//---------------------------------------Insertar Evento

	function insertarEvento(){

	}

	
	//---------------------------------------Mostrar Evetntos

	function mostrarEventoCompleto(){

		include_once "model/conexion.php";

		$query = "
		SELECT
		id_evento AS 'nro',
		nombre_evento AS 'evento',
		inicio_evento AS 'inicio',
		inicio_elecciones AS 'dia_elecciones',
		final_evento AS 'final'  
		FROM evento WHERE estado = 1
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


	//---------------------------------------


	//---------------------------------------Getters & Setters

	//Getters
	function getid_evento(){
	    return $this->id_evento;
	}
	 
	function getnombre_evento(){
	    return $this->nombre_evento;
	}
	 
	function getinicio_evento(){
	    return $this->inicio_evento;
	}
	 
	function getinicio_elecciones(){
	    return $this->inicio_elecciones;
	}
	 
	function getfinal_evento(){
	    return $this->final_evento;
	}
	 
	function getestado(){
	    return $this->estado;
	}

	//Setters
	function setid_evento($x){
    $this->id_evento = $x;
	}
	 
	function setnombre_evento($x){
	    $this->nombre_evento = $x;
	}
	 
	function setinicio_evento($x){
	    $this->inicio_evento = $x;
	}
	 
	function setinicio_elecciones($x){
	    $this->inicio_elecciones = $x;
	}
	 
	function setfinal_evento($x){
	    $this->final_evento = $x;
	}
	 
	function setestado($x){
	    $this->estado = $x;
	}


}