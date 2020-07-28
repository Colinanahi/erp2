<?php
        require_once("usuario.php");
		$obj=new Usuario();
?>

<section id="principal">

	<form action="" method="post">
		Nombre: <input type="text" name="nombre"> <br>
		Password: <input type="password" name="password"> <br>
		Tipo:
		<select name="tipo">
			<option value="1">Administrador</option>
			<option value="2">Usuario</option>
		</select> <br>

		<input type="submit" value="Agregar Usuario" name="alta">
		<br>
		<?php
		if (isset($_GET["e"])) {
		echo "<h2> Usuario agregado </h2>";
	}
	if (isset($_GET["i"])) {
		echo "<h2> Usuario Eliminado </h2>";
	}
		?>
	</form>

	<?php
	if (isset($_POST["alta"])) {
		$nombre = $_POST["nombre"];
		$password = $_POST["password"];
		$tipo = $_POST["tipo"];
	
		$obj->alta($nombre,$tipo,$password);
		header("Location:?sec=usu&i=1");
		
	}
	$resultado = $obj->consulta();
	?>
	<table>
		<tr>
			<th>Nombre</th>
			<th>Tipo</th>
			<th>Password</th>
			<th>Eliminar</th>
		</tr>
		<?php
		while ($fila = $resultado->fetch_assoc()) {
			echo "<tr>";
			echo "<td>".$fila["nombre"]."</td>";
			echo "<td>*****</td>";
			if ($fila["tipo"]==1) {
				echo "<td>Administrador</td>";
			}else{
				echo "<td>Usuario</td>";
			}
			?>
			<td>
				
			<form action=""method="post" class="eliminar">
				   <input type="hidden" value="<?php echo $fila['IDusuario'];?>" name="id">
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
		header("Location: ?sec=usu&e=1");
	}

	?>
	
</section>