<?php
        require_once("compra.php");
		$obj=new Compra();
?>
<section id ="principal">

	<form action="" method="post">
		Fecha: <input type="date" name="fecha"> <br>
		Total: <input type="text" name="total"> <br>
		Tipo de pago: <input type="text" name="tipo_pago"> <br>
		IDcliente: <input type="text" name="IDcliente"> <br>
		<input type="submit" name="Agregar Compra" name="alta">
		<br>
		<?php
		if (isset($_GET["e"])) {
		echo "<h2>Compra Eliminada </h2>";
	}
	if (isset($_GET["i"])) {
		echo "<h2>Compra Agregada</h2>";
	}
		?>
		</form>
	<?php
	if (isset($_POST["alta"])) {
		$fecha = $_POST["fecha"];
		$total = $_POST["total"];
		$tipo_pago = $_POST["tipo_pago"];
		$IDcliente = $_POST["IDcliente"];
	
		$obj->alta($fecha,$total,$tipo_pago,$IDcliente);
		header("Location:?sec=comp&e=1");
		
	}
	$resultado = $obj->consulta();
	?>
	<table>
		<tr>
			<th>Fecha</th>
			<th>Total</th>
			<th>Tipo de pago</th>
			<th>IDcliente</th>
			<th>Eliminar</th>
		</tr>
		<?php
		while ($fila = $resultado->fetch_assoc()) {
			echo "<tr>";
			echo "<td>".$fila["fecha"]."</td>";
			echo "<td>".$fila["total"]."</td>";
			echo "<td>".$fila["tipo_pago"]."</td>";
			echo "<td>".$fila["id_cliente"]."</td>";
			echo "</tr>";
			?>
			<td>
			<form action=""method="post" class="eliminar">
				   <input type="hidden" value="<?php echo $fila['IDcompra'];?>" name="id">
			      <input type="submit" value="eliminar" name="eliminar"> 
			  </form>
			      </td>
			<?php
			echo "</tr>";
		}
		?>
	</table>
	<?php
	if(isset($_POST["eliminar"])){
		$id= $_POST["id"];
		$obj->eliminar($id);
		header("Location: ?sec=comp&e=1");
	}

	?>
	
</section>