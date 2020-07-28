<?

<?php

require_once("conexion.php");

class Pedido extends Conexion{
	public function alta ($fecha,$cliente,$precio,$cantidad,$direccion,$producto){
		$this->sentencia = "INSERT INTO pedido VALUES (null,'$fecha','$cliente','$precio','$cantidad','$direccion','$producto')";
		$this->ejecutarSentencia(); 

	}

	public function consulta(){
		$this->sentencia = "SELECT * FROM pedido";
		return $this->obtenerSentencia();

	}

	public function eliminar($id){
		$this->sentencia= "DELETE FROM pedido WHERE IDpedido=$id";
		$this->ejecutarSentencia();
	}

	
}
?>
