<?php 
class  Conexion{
	private $usuario="root";
	private $base="erpsi";
	private $password="";
	private $host="localhost";
	protected $sentencia="";
	private $conexion;

	private function abrirConexion(){
		$this->conexion = new mysqli($this->host,$this->usuario,$this->password,$this->base);
	}

	private function cerrarConexion(){
		$this->conexion->close();
	}	
	//Altas, Bajas y Modificaciones
	public function ejecutarSentencia(){
		$this->abrirConexion();
		$this->conexion->query($this->sentencia);
		$this->cerrarConexion();
	}//Alta, Baja, Modificaciones 

	
	public function obtenerSentencia(){
		$this->abrirConexion();
		$resultado = $this->conexion->query($this->sentencia);
		return $resultado;
	}//Consultas

}
 ?>