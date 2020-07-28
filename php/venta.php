<?php 
require_once("conexion.php");

class Venta extends Conexion{

	public function alta($fecha,$cliente,$total,$tipodepago){
		$this->sentencia = "INSERT INTO venta VALUES (null,'$fecha','$cliente','$total','$tipodepago')";
		echo $this->sentencia;
		$this->ejecutarSentencia();
	}

	public function consulta(){
		$this->sentencia = "SELECT c.nombre,c.apepaterno,c.apematerno,v.fecha,v.Total,v.tipo_pago FROM venta v,cliente c WHERE v.IDCliente=c.IDCliente";
		return $this->obtenerSentencia();
	}


	public function eliminar($id){
		$this->sentencia = "DELETE FROM venta WHERE IDventa=$id";
		$this->ejecutarSentencia();
	}

	public function obtenerClientes(){
		$this->sentencia = "SELECT IDcliente,nombre,apepaterno,apematerno FROM cliente";
		$res = $this->obtenerSentencia();
		echo "<select name='cliente'>";
		while($fila = $res->fetch_assoc()){
			echo "<option value='".$fila["IDcliente"]."'> ".$fila["nombre"]." ".$fila["apepaterno"]." ".$fila["apematerno"]."</option>";
		}
		echo "</select>";
	}
}

 ?>