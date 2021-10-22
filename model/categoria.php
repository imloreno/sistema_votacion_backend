<?php

class Categoria {

	protected $id_categoria;
	protected $id_evento;
	protected $nombre_categoria;
	protected $estado;


	//-----------------------------Insertar categoria
	function insertarCategoria(){

		include_once "model/conexion.php";

		$query = "
		INSERT INTO categoria
		(
		id_evento,
		nombre_categoria,
		estado
		)
		VALUES
		(
		{$this->id_evento},
		'{$this->nombre_categoria}',
		1
		)
		";

		if($con->query($query)){
			return true;
		}else{
			return false;
		}
	}


	//-----------------------------Filtrar categoria
	function filtrarCategoria(){

		include_once "model/conexion.php";

		$query = "
		SELECT
		id_evento AS 'nro_evento',
		id_categoria AS 'nro',
		nombre_categoria AS 'categoria'
		FROM categoria
		WHERE id_evento = {$this->id_evento} AND estado = 1
		ORDER BY nombre_categoria DESC
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

	//-----------------------------Modificar categoria
	function modificarCategoria(){

		include_once "model/conexion.php";

		$query = "
		UPDATE categoria SET
		id_evento = {$this->id_evento},
		nombre_categoria = '{$this->nombre_categoria}'
		WHERE id_categoria = {$this->id_categoria}
		";

		if($con->query($query)){
			return true;
		}else{
			return false;
		}
	}

	//-----------------------------Eliminar categoria
	function eliminarCategoria(){

		include_once "model/conexion.php";

		$query = "
		UPDATE categoria SET
		estado = {$this->estado}
		WHERE id_categoria = {$this->id_categoria}
		";

		if($con->query($query)){
			return true;
		}else{
			return false;
		}
	}


	//-----------------------------Getters
	function getid_categoria(){
    return $this->id_categoria;
	}
	 
	function getid_evento(){
	    return $this->id_evento;
	}
	 
	function getnombre_categoria(){
	    return $this->nombre_categoria;
	}
	 
	function getestado(){
	    return $this->estado;
	}

	//-----------------------------Setters
	function setid_categoria($x){
    $this->id_categoria = $x;
	}
	 
	function setid_evento($x){
	    $this->id_evento = $x;
	}
	 
	function setnombre_categoria($x){
	    $this->nombre_categoria = $x;
	}
	 
	function setestado($x){
	    $this->estado = $x;
	}

}