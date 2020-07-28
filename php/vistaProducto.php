<?php
        require_once("producto.php");
		$obj=new Producto();
?>

<section id="principal">
	<div>
		<a href="?sec=gprod"><input type="button" value="Generar Grafica" name=""></a>
	</div>

	<form action="" method="post">
		Nombre: <input type="text" name="nombre"> <br>
		Descripcion: <input type="text" name="descripcion"> <br>
		Precio venta: <input type="text" name="preciov"> <br>
		Precio compra: <input type="text" name="precioc"> <br>
		Cantidad: <input type="text" name="cantidad"> <br>
		Cantidad minima: <input type="text" name="cantmin"> <br>
		Cantidad maxima: <input type="text" name="cantmax"> <br>
		Categoria: <input type="text" name="categoria"> <br>
		</select> <br>

		<input type="submit" value="Agregar Producto" name="alta">
		<br>
		<?php
		if (isset($_GET["e"])) {
		echo "<h2>Producto Eliminado </h2>";
	}
	if (isset($_GET["i"])) {
		echo "<h2>Producto Agregado</h2>";
	}
		?>
	</form>

	<?php
	if (isset($_POST["alta"])) {
		$nombre = $_POST["nombre"];
		$descripcion = $_POST["descripcion"];
		$preciov = $_POST["preciov"];
		$precioc = $_POST["precioc"];
		$cantidad = $_POST["cantidad"];
		$cantmin = $_POST["cantmin"];
		$cantmax = $_POST["cantmax"];
		$categoria = $_POST["categoria"];
	
		$obj->alta($nombre,$descripcion,$preciov,$precioc,$cantidad,$cantmin,$cantmax,$categoria);
		header("Location:?sec=prod&e=1");
		
	}
	$resultado = $obj->consulta();
	?>
	<table>
		<tr>
			<th>Nombre</th>
			<th>Descripcion</th>
			<th>Cantidad</th>
			<th>Precio venta</th>
			<th>Precio compra</th>
			<th>Categoria</th>
			<th>Eliminar</th>
		</tr>
		<?php
		while ($fila = $resultado->fetch_assoc()) {
			echo "<tr>";
			echo "<td>".$fila["nombre"]."</td>";
			echo "<td>".$fila["descripcion"]."</td>";
			echo "<td>".$fila["cantidad"]."</td>";
			echo "<td>".$fila["preciov"]."</td>";
			echo "<td>".$fila["precioc"]."</td>";
			echo "<td>".$fila["categoria"]."</td>";
			?>
			<td>
			<form action=""method="post" class="eliminar">
				   <input type="hidden" value="<?php echo $fila['IDproducto'];?>" name="id">
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
		header("Location: ?sec=prod&i=1");
	}

	?>
	
</section>