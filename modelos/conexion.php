<?php

Class Conexion{

	static public function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=pruebausuarios",
						"root",
						"");
		$link->exec("set names utf8");
		return $link;
	}
}