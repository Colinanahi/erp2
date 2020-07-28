<?php

require_once("conexion.php");

class Materiaprima extends Conexion{

	public function alta($Nombre,$Tipo,$Descripcion,$Precio,$Stock,$Existencias){
		$this->sentencia = "INSERT INTO materiaprima VALUES (null,'$Nombre','$Tipo','$Descripcion','$Precio','$Stock','$Existencias')";
		$this->ejecutarSentencia(); 
		

	}

	public function consulta(){
		$this->sentencia = "SELECT * FROM materiaprima";
		return $this->obtenerSentencia();

	}

	public function eliminar($id){
		$this->sentencia= "DELETE FROM materiaprima WHERE ID=$id";
		$this->ejecutarSentencia();
	}

	
}
?>
