<?php
// simple conexion a la base de datos
function connect(){
	return new mysqli("50.62.209.40", "CafeMision", "12345678", "misiondb");
}

?>