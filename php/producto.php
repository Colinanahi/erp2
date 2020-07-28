<?php

require_once("conexion.php");

class Producto extends Conexion{

	public function alta($nombre,$descrpcion,$preciov,$precioc,$cantidad,$cantmin,$cantmax,$categoria){
		$this->sentencia = "INSERT INTO producto VALUES (null,'$nombre','$descrpcion','$preciov','$precioc','$cantidad','$cantmin','$cantmax','$categoria')";
		$this->ejecutarSentencia(); 
		

	}

	public function consulta(){
		$this->sentencia = "SELECT * FROM producto";
		return $this->obtenerSentencia();
	}

	public function nombres (){
		$this->sentencia = "SELECT nombre FROM producto;";
		$res = $this->obtenerSentencia();
		$nombres = "";
		while ($fila = $res->fetch_assoc()) {
			$nombres = $nombres."'".$fila["nombre"]."',";
		}
		return $nombres;

	}

	public function cantidades(){
		$this->sentencia = "SELECT cantidad FROM producto;";
		$res = $this->obtenerSentencia();
		$cantidades = "";
		while ($fila = $res->fetch_assoc()) {
			$cantidades = $cantidades.$fila["cantidad"].",";
		}
		return $cantidades;

	}


	public function eliminar($id){
		$this->sentencia = "DELETE FROM producto WHERE IDproducto=$id";
		$this->ejecutarSentencia();
		
	}

	
	
}
?>
