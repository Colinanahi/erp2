<?php

require_once("conexion.php");

class Mantenimiento extends Conexion{

	public function alta($fecha_man,$area,$costo_man){
		$this->sentencia = "INSERT INTO mantenimiento VALUES (null,'$fecha_man','$area','$mobiliario','$costo_man','$empleado')";
		$this->ejecutarSentencia(); 
		

	}

	public function consulta(){
		$this->sentencia = "SELECT * FROM mantenimiento";
		return $this->obtenerSentencia();

	}

	public function eliminar($id){
		$this->sentencia= "DELETE FROM usuario WHERE IDmantenimiento=$id";
		$this->ejecutarSentencia();
	}

	
}
?>
