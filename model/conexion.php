<?php

$host = "localhost";
$user = "root";
$pass = "";
$database = "bd_elecciones";

$con = new mysqli($host, $user, $pass, $database);
$con->set_charset("utf8");

if(!$con){
	echo "Error al conectar con la base de datos";
}