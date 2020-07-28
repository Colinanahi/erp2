<?php

require_once("conexion.php");

class Compra extends Conexion{

	public function alta($fecha,$total,$tipo_pago,$IDcliente){
		$this->sentencia = "INSERT INTO compra VALUES (null,'$fecha','$total','$tipo_pago','$IDcliente')";
		$this->ejecutarSentencia(); 

	}

	public function consulta(){
		$this->sentencia = "SELECT * FROM compra";
		return $this->obtenerSentencia();

	}

	public function eliminar($id){
		$this->sentencia= "DELETE FROM compra WHERE IDcompra=$id";
		$this->ejecutarSentencia();
	}

	public function obtenerClientes(){
		$this->sentencia ="";
	}

	
}
?>