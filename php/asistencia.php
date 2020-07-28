<?php

require_once("conexion.php");

class Asistencia extends Conexion{

	public function alta($fecha,$empleado,$hora){
		$this->sentencia = "INSERT INTO asistencia VALUES (null,'$fecha','$empleado','$hora')";
		$this->ejecutarSentencia(); 
		

	}

	public function consulta(){
		$this->sentencia = "SELECT * FROM asistencia";
		return $this->obtenerSentencia();

	}

	public function eliminar($id){
		$this->sentencia= "DELETE FROM asistencia WHERE IDasistencia=$id";
		$this->ejecutarSentencia();
	}

	
}
?>
