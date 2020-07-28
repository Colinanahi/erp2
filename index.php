<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>ERP</title>
	<link rel="stylesheet" type="css/estilo.css" href="">
</head>
<body>
	<nav>
		<ul>
			<a href="index.php"><li>Inicio</li></a>
			<a href="?sec=act"><li>Actividad</li></a>
			<a href="?sec=asi"><li>Asistencia</li></a>
			<a href="?sec=bal"><li>Balance</li></a>
			<a href="?sec=cli"><li>Cliente</li></a>
			<a href="?sec=com"><li>Compra</li></a>
			<a href="?sec=dcom"><li>Detalle compra</li></a>
			<a href="?sec=dev"><li>Devoluciones</li></a>
			<a href="?sec=emp"><li>Empleado</li></a>
			<a href="?sec=eva"><li>Evaluacion</li></a>
			<a href="?sec=jor"><li>Jornada</li></a>
			<a href="?sec=man"><li>Mantenimiento</li></a>
			<a href="?sec=matp"><li>Materia prima</li></a>
			<a href="?sec=mob"><li>Mobiliario</li></a>
			<a href="?sec=pag"><li>Pago</li></a>
			<a href="?sec=ped"><li>Pedido</li></a>
			<a href="?sec=per"><li>Permisos</li></a>
			<a href="?sec=prod"><li>Producto</li></a>
			<a href="?sec=prov"><li>Proveedor</li></a>
			<a href="?sec=proy"><li>Proyecto</li></a>
			<a href="?sec=rem"><li>Remplazo</li></a>
			<a href="?sec=ven"><li>Venta</li></a>

		</ul>
	</nav>
	<?php
	if(isset($_GET["sec"])){
		$sec = $_GET["sec"];
		switch ($sec) {
			case 'usu':
				require_once("php/vistaUsuario.php");
				break;
				case 'act':
				require_once("php/vistaActividad.php");
				break;
				case 'asi':
				require_once("php/vistaAsistencia.php");
				break;
				case 'bal':
				require_once("php/vistaBalance.php");
				break;
				case 'cli':
				require_once("php/vistaCliente.php");
				break;
				case 'com':
				require_once("php/vistaCompra.php");
				break;
				case 'gcom':
				require_once("php/graficaCompra.php");
				break;
				case 'dcom':
				require_once("php/vistaDetallecompra.php");
				break;
				case 'dev':
				require_once("php/vistaDevoluciones.php");
				break;
				case 'emp':
				require_once("php/vistaEmpleado.php");
				break;
				case 'eva':
				require_once("php/vistaEvaluacion.php");
				break;
				case 'jor':
				require_once("php/vistaJornada.php");
				break;
				case 'man':
				require_once("php/vistaMantenimiento.php");
				break;
				case 'matp':
				require_once("php/vistaMateriaprima.php");
				break;
				case 'gmatp':
				require_once("php/graficaMateriaprima.php");
				break;
				case 'mob':
				require_once("php/vistaMobiliario.php");
				break;
				case 'gmob':
				require_once("php/graficaMobiliario.php");
				break;
				case 'pag':
				require_once("php/vistaPago.php");
				break;
				case 'ped':
				require_once("php/vistaPedido.php");
				break;
				case 'prod':
				require_once("php/vistaProducto.php");
				break;
				case '´gprod':
				require_once("php/graficaProducto.php");
				break;
				case 'prov':
				require_once("php/vistaProveedor.php");
				break;
				case 'proy':
				require_once("php/vistaProyecto.php");
				break;
				case 'rem':
				require_once("php/vistaRemplazo.php");
				break;
				case 'ven':
				require_once("php/vistaVenta.php");
				break;
				case 'gven':
				require_once("php/graficaVenta.php");
				break;

				
		}
	}
	?>

</body>
</html>