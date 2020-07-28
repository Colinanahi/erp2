<?php

require_once("conexion.php");

class Detalle_compra extends Conexion{

	public function alta($cantidad){
		$this->sentencia = "INSERT INTO detalle_compra VALUES (null,'$materiaprima',''$compra,'$cantidad')";
		$this->ejecutarSentencia(); 
		

	}

	public function consulta(){
		$this->sentencia = "SELECT * FROM detalle_compra";
		return $this->obtenerSentencia();

	}

	public function eliminar($id){
		$this->sentencia= "DELETE FROM detalle_compra WHERE IDdetallecompra=$id";
		$this->ejecutarSentencia();
	}

	
}
?>