<?php
        require_once("asistencia.php");
		$obj=new Asistencia();
?>

<section id ="principal">
	<div>
		<a href="?sec=gasi"><input type="button" value="Generar Grafica" name=""></a>
	</div>

	<form action="" method="post">
		Fecha: <input type="date" name="fecha"> <br>
		Empleado: <input type="text" name="empleado"> <br>
		Hora: <input type="time" name="hora"> <br>
		</select> <br>

		<input type="submit" value="Agregar Asistencia" name="alta">
		<br>
		<?php
		if (isset($_GET["e"])) {
		echo "<h2>Asistencia Agregada </h2>";
	}
	if (isset($_GET["i"])) {
		echo "<h2>Asistencia Eliminada </h2>";
	}
		?>

	</form>

	<?php
	if (isset($_POST["alta"])) {
		$fecha = $_POST["fecha"];
		$empleado = $_POST["empleado"];
		$hora = $_POST["hora"];
	
		$obj->alta($fecha,$empleado,$hora);
		header("Location:?sec=asi&e=1");
	}
	$resultado = $obj->consulta();
	?>
	<table>
		<tr>
			<th>Fecha</th>
			<th>Empleado</th>
			<th>Hora</th>
			<th>Eliminar</th>
		</tr>
		<?php
		while ($fila = $resultado->fetch_assoc()) {
			echo "<tr>";
			echo "<td>".$fila["Fecha"]."</td>";
			echo "<td>".$fila["IDempleado"]."</td>";
			echo "<td>".$fila["Hora"]."</td>";
			?>
			<td>
			<form action=""method="post" class="eliminar">
				   <input type="hidden" value="<?php echo $fila['IDasistencia'];?>" name="id">
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
		header("Location: ?sec=asi&i=1");
	}

	?>
	
</section>