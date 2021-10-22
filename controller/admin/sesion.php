<?php

class Sesion {

	protected $username;
	protected $datos;

	function __constructor(){
		session_start();
	}	

	function getDatos(){
		
		if(isset($_SESSION['data'])){

			return $_SESSION['data'];

		}else{
			return false;
		}
	}

}