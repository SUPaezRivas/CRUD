<?php session_start(); ?>

<?php
if(!isset($_SESSION['valido'])) {
	header('Location: iniciar.php');
}
?>

<?php
include_once("conexion.php");

$resultado = mysqli_query($mysqli, "SELECT * FROM productos WHERE id=".$_SESSION['id']." ORDER BY idproducto DESC");
?>

<html>
<head>
	<title>Página principal</title>
</head>

<body>
	<a href="index.php">Inicio</a> | <a href="agregar.html">Agregar nuevo dato</a> | <a href="cerrar.php">Cerrar sesión</a>
	<br/><br/>

	<table width='80%' border=0>
		<tr bgcolor='#CCCCCC'>
			<td>Id producto</td>
			<td>Marca</td>
			<td>Modelo</td>
			<td>Costo</td>
			<td>Color</td>
			<td>Cantidad</td>
			<td>Marca de cuchillas</td>
			<td>Tipo de maquina</td>
			<td>Opciones</td>
		</tr>
		<?php
		while($res = mysqli_fetch_array($resultado)) {		
			echo "<tr>";
			echo "<td>".$res['idproducto']."</td>";
			echo "<td>".$res['marca']."</td>";
			echo "<td>".$res['modelo']."</td>";
			echo "<td>".$res['costo']."</td>";
			echo "<td>".$res['color']."</td>";
			echo "<td>".$res['cantidad']."</td>";	
			echo "<td>".$res['marcacuchillas']."</td>";
			echo "<td>".$res['tipomaquina']."</td>";
			echo "<td><a href=\"editar.php?idproducto=$res[idproducto]\">Editar</a> | <a href=\"eliminar.php?id=$res[idproducto]\" onClick=\"return confirm('¿Estás seguro de que quieres eliminar?')\">Eliminar</a></td>";		
		}
		?>
	</table>	
</body>
</html>
