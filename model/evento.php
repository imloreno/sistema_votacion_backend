<?php 

class Evento {

	protected $id_evento;
	protected $nombre_evento;
	protected $inicio_evento;
	protected $inicio_elecciones;
	protected $final_elecciones;
	protected $final_evento;
	protected $estado;


	//---------------------------------------Insertar Evento
	function insertarEvento(){

		include_once "model/conexion.php";

		$query="
		INSERT INTO evento
		(
		nombre_evento,
		inicio_evento,
		inicio_elecciones,
		final_elecciones,
		final_evento,
		estado
		)
		VALUES
		(
		'{$this->nombre_evento}',
		'{$this->inicio_evento}',
		'{$this->inicio_elecciones}',
		'{$this->final_elecciones}',
		'{$this->final_evento}',
		1
		)
		";

		if($con->query($query)){
			return true;
		}else{
			return false;
		}

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
		final_elecciones AS 'dia_elecciones_final',
		final_evento AS 'final',
		DATE_FORMAT(inicio_evento, '%Y-%m-%d') AS 'limite_edicion'
		FROM evento WHERE estado = 1
		ORDER BY id_evento DESC
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

	//---------------------------------------Modificar Evetntos
	function modificarEvento(){

		include_once "model/conexion.php";

		$query = "
		UPDATE evento SET
		nombre_evento = '{$this->nombre_evento}',
		inicio_evento = '{$this->inicio_evento}',
		inicio_elecciones = '{$this->inicio_elecciones}',
		final_elecciones = '{$this->final_elecciones}',
		final_evento = '{$this->final_evento}'
		WHERE id_evento = {$this->id_evento}
		";

		if($con->query($query)){
			return true;
		}else{
			return false;
		}

	}

	//---------------------------------------Deshabilitar Evetnto
	function deshabilitarEvento(){

		include_once "model/conexion.php";

		$query = "
		UPDATE evento SET
		estado = '{$this->estado}'
		WHERE id_evento = {$this->id_evento}
		";
		
		if($con->query($query)){
			return true;
		}else{
			return false;
		}

	}


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

	function getfinal_elecciones(){
	    return $this->final_elecciones;
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

	function setfinal_elecciones($x){
	    $this->final_elecciones = $x;
	}
	 
	function setfinal_evento($x){
	    $this->final_evento = $x;
	}
	 
	function setestado($x){
	    $this->estado = $x;
	}


}