<?php

class Evento
{

	protected $id_evento;
	protected $nombre_evento;
	protected $inicio_evento;
	protected $inicio_elecciones;
	protected $final_elecciones;
	protected $final_evento;
	protected $estado;


	//Seleccionar lista de eventos
	function listaEventos()
	{
		include_once "model/conexion.php";
		$query = "
		SELECT
		cat.id_categoria AS 'nro',
		cat.nombre_categoria AS 'categoria',
		ev.nombre_evento AS 'evento',
		ev.inicio_evento AS 'inicio',
		ev.final_evento AS 'final',
		ev.inicio_elecciones AS 'inicio_elecciones',
		ev.final_elecciones AS 'final_elecciones'
		FROM categoria AS cat
		INNER JOIN evento AS ev
		ON cat.id_evento = ev.id_evento
		AND ( CURDATE() BETWEEN ev.inicio_evento AND ev.final_evento )
		AND cat.estado = 1
		AND ev.estado = 1
		";

		$query_complete = $con->query($query);
		$res = [];

		if ($query_complete->num_rows > 0) {

			while ($row = $query_complete->fetch_assoc()) {
				array_push($res, $row);
			}

			$con->close();
			return $res;
		} else {
			return false;
		}
	}


	//Getters
	function getid_evento()
	{
		return $this->id_evento;
	}

	function getnombre_evento()
	{
		return $this->nombre_evento;
	}

	function getinicio_evento()
	{
		return $this->inicio_evento;
	}

	function getinicio_elecciones()
	{
		return $this->inicio_elecciones;
	}

	function getfinal_elecciones()
	{
		return $this->final_elecciones;
	}

	function getfinal_evento()
	{
		return $this->final_evento;
	}

	function getestado()
	{
		return $this->estado;
	}

	//Setters
	function setid_evento($x)
	{
		$this->id_evento = $x;
	}

	function setnombre_evento($x)
	{
		$this->nombre_evento = $x;
	}

	function setinicio_evento($x)
	{
		$this->inicio_evento = $x;
	}

	function setinicio_elecciones($x)
	{
		$this->inicio_elecciones = $x;
	}

	function setfinal_elecciones($x)
	{
		$this->final_elecciones = $x;
	}

	function setfinal_evento($x)
	{
		$this->final_evento = $x;
	}

	function setestado($x)
	{
		$this->estado = $x;
	}
}
