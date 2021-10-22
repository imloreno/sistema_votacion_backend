<?php
class AsignarCategoria {

	protected $id_categoria;
	protected $id_candidato;
	protected $cantidad_votos;
	protected $estado;


	//----------------------------Asignar categoria
	function asignarCategoría(){

		include_once "model/conexion.php";

		$query = "
		INSERT INTO categoria_candidato
		(
		id_categoria,
		id_candidato,
		cantidad_votos,
		estado
		)
		VALUES
		(
		{$this->id_categoria},
		{$this->id_candidato},
		0,
		1
		)
		";

		if($con->query($query)){
			return true;
		}else{
			return false;
		}
	}

	function desvincularCategoría(){

		include_once "model/conexion.php";

		$query = "
		UPDATE categoria_candidato SET
		estado = 0
		WHERE id_categoria = {$this->id_categoria} AND id_candidato = {$this->id_candidato}
		LIMIT 1
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
	 
	function getid_candidato(){
	    return $this->id_candidato;
	}
	 
	function getcantidad_votos(){
	    return $this->cantidad_votos;
	}
	 
	function getestado(){
	    return $this->estado;
	}

	//-----------------------------Setters
	function setid_categoria($x){
	    $this->id_categoria = $x;
	}
	 
	function setid_candidato($x){
	    $this->id_candidato = $x;
	}
	 
	function setcantidad_votos($x){
	    $this->cantidad_votos = $x;
	}
	 
	function setestado($x){
	    $this->estado = $x;
	}

}