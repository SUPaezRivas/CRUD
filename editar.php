<?php session_start(); ?>

<?php
if (!isset($_SESSION['valido'])) {
	header('Location: iniciar.php');
}
?>

<?php
// Incluyendo el archivo de conexión a la base de datos
include_once("conexion.php");

if (isset($_POST['update'])) {
	$id = $_POST['idproducto'];

	$marca = $_POST['marca'];
	$modelo = $_POST['modelo'];
	$costo = $_POST['costo'];
	$color = $_POST['color'];
	$cantidad = $_POST['cantidad'];
	$marcacuchillas = $_POST['marcacuchillas'];
	$tipomaquina = $_POST['tipomaquina'];


	// Verificar campos vacíos
	if (empty($marca) || empty($modelo) || empty($costo) || empty($color) || empty($cantidad) || empty($marcacuchillas) || empty($tipomaquina)) {
		if (empty($marca)) {
			echo "<font color='red'>El campo de cantidad en stock está vacío.</font><br/>";
		}

		if (empty($modelo)) {
			echo "<font color='red'>El campo de tallas disponibles está vacío.</font><br/>";
		}

		if (empty($costo)) {
			echo "<font color='red'>El campo de proveedor está vacío.</font><br/>";
		}

		if (empty($color)) {
			echo "<font color='red'>El campo de precio de compra está vacío.</font><br/>";
		}

		if (empty($cantidad)) {
			echo "<font color='red'>El campo de precio de venta está vacío.</font><br/>";
		}

		if (empty($marcacuchillas)) {
			echo "<font color='red'>El campo de nombre del producto está vacío.</font><br/>";
		}

		if (empty($tipomaquina)) {
			echo "<font color='red'>El campo de fecha de reposición está vacío.</font><br/>";
		}

	} else {
		// Actualizando la tabla
// Actualizando la tabla
		$resultado = mysqli_query($mysqli, "UPDATE productos SET marca='$marca', modelo='$modelo', costo='$costo', color='$color', cantidad='$cantidad', marcacuchillas='$marcacuchillas', tipomaquina='$tipomaquina' WHERE idproducto='$id'");

		// Redireccionando a la página de visualización. En este caso, es ver.php
		header("Location: ver.php");
	}
}
?>

<?php
// Obtener el id del URL
$id = $_GET['idproducto'];

if ($id != '') {
	// Seleccionar los datos asociados con este id particular
	$resultado = mysqli_query($mysqli, "SELECT * FROM productos WHERE idproducto=$id");

	while ($res = mysqli_fetch_array($resultado)) {
		$marca = $res['marca'];
	$modelo = $res['modelo'];
	$costo = $res['costo'];
	$color = $res['color'];
	$cantidad = $res['cantidad'];
	$marcacuchillas = $res['marcacuchillas'];
	$tipomaquina = $res['tipomaquina'];



		
	}
} else {
	echo "ID de producto no encontrado en la URL. Asegúrate de pasar el ID correctamente.";
}
?>


<html>

<head>
	<title>Editar Datos</title>
</head>

<body>
	<a href="index.php">Inicio</a> | <a href="ver.php">Ver Productos</a> | <a href="cerrar.php">Cerrar Sesión</a>
	<br /><br />

	<form name="form1" method="post" action="editar.php">
		<table border="0">
			<tr>
				<td>Marca</td>
				<td><input type="text" name="marca" value="<?php echo $marca; ?>"></td>
			</tr>
			<tr>
				<td>Modelo</td>
				<td><input type="text" name="modelo" value="<?php echo $modelo; ?>"></td>
			</tr>
			<tr>
				<td>Costo</td>
				<td><input type="text" name="costo" value="<?php echo $costo; ?>"></td>
			</tr>
			<tr>
				<td>Color</td>
				<td><input type="text" name="color" value="<?php echo $color; ?>"></td>
			</tr>
			<tr>
				<td>Cantidad</td>
				<td><input type="text" name="cantidad" value="<?php echo $cantidad; ?>"></td>
			</tr>
			<tr>
				<td>Marca de cuchillas</td>
				<td><input type="text" name="marcacuchillas" value="<?php echo $marcacuchillas; ?>"></td>
			</tr>
			<tr>
				<td>TIpo de maquina</td>
				<td><input type="text" name="tipomaquina" value="<?php echo $tipomaquina; ?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="idproducto" value=<?php echo $_GET['idproducto']; ?>></td>
				<td><input type="submit" name="update" value="Actualizar"></td>
			</tr>
		</table>
	</form>
</body>

</html>