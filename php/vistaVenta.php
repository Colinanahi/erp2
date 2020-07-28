<?php 
	require_once("venta.php");
	$obj = new Venta();
 ?>
<section id="principal">

	<form action="" method="post">
		Fecha: <input type="date" name="fecha" required> <br>
		Cliente: 
		<?php 
		$obj->obtenerClientes();
		 ?>
		 <br>

		Total: <input type="number" name="total" required> <br>
		Tipo de pago:
		<select name="tipo">
			<option value="1">Efectivo</option>
			<option value="2">Tarjeta</option>
		</select> <br>
		<input type="submit" value="Agregar Venta" name="alta">
		<br>
		<?php 
		if(isset($_GET["e"])){
			echo "<h2>Venta eliminada</h2>";
		}
		if(isset($_GET["i"])){
			echo "<h2>Venta agregada</h2>";
		}

		 ?>
		
	</form>
	<?php 
		if(isset($_POST["alta"])){
			$fecha = $_POST["fecha"];
			$cliente = $_POST["cliente"];
			$total = $_POST["total"];
			$tipo = $_POST["tipo"];
			$obj->alta($fecha,$cliente,$total,$tipo);
			header("Location: ?sec=ven&i=1 ");
			
		}

		$resultado = $obj->consulta();
	 ?>

	<table>
		<tr>
			<th>Cliente</th>
			<th>Fecha</th>
			<th>Total</th>
			<th>Tipo</th>
		</tr>
		<?php 
			while($fila = $resultado->fetch_assoc()){
				echo "<tr>";
				echo "<td>".$fila["nombre"]." ".$fila["apepaterno"]." ".$fila["apematerno"]."</td>";
				echo "<td>".$fila["fecha"]."</td>";
				echo "<td>".$fila["Total"]."</td>";
				if($fila["tipo_pago"]==1){
					echo "<td>Efectivo</td>";
				}else{
					echo "<td>Tarjeta</td>";
				}
				?>
				<td>
				<form action="" method="post" class="eliminar">
					<input type="hidden" value="<?php echo $fila['IDVenta']; ?>" name="id">
					<input type="submit" value="Eliminar" name="eliminar">
				</form>
				</td>
				<?php
				echo "</tr>";
			}
		 ?>
	</table>
	<?php 
		if(isset($_POST["eliminar"])){
			$id = $_POST["id"];
			$obj->eliminar($id);
			header("Location: ?sec=ven&e=1");
		}

	 ?>
</section>