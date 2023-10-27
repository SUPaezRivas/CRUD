<?php
session_start();

if(!isset($_SESSION['valido'])) {
	header('Location: iniciar.php');
}
?>

<html>
<head>
	<title>Agregar datos</title>
</head>

<body>
<?php
include_once("conexion.php");

if(isset($_POST['update'])) {	
	$idproducto = $_POST['idproducto'];
	$marca = $_POST['marca'];
	$modelo = $_POST['modelo'];
	$costo = $_POST['costo'];
	$color = $_POST['color'];
	$cantidad = $_POST['cantidad'];
	$marcacuchillas = $_POST['marcacuchillas'];
	$tipomaquina = $_POST['tipomaquina'];
	$id = $_SESSION['id']; // ID de usuario obtenido de la sesión

	if(empty($idproducto) || empty($marca) || empty($modelo) || empty($costo) || empty($color) || empty($cantidad) || empty($marcacuchillas) || empty($tipomaquina)) {
		echo "<font color='red'>Por favor, complete todos los campos.</font><br/>";
		echo "<br/><a href='javascript:self.history.back();'>Volver</a>";
	} else { 
		$resultado = mysqli_query($mysqli, "INSERT INTO productos (idproducto, marca, modelo, costo, color, cantidad, marcacuchillas, tipomaquina, id) VALUES ('$idproducto', '$marca', '$modelo', '$costo', '$color', '$cantidad', '$marcacuchillas', '$tipomaquina', '$id')");
		
		if($resultado){
			echo "<font color='green'>Datos añadidos con éxito.</font>";
			echo "<br/><a href='ver.php'>Ver resultados</a>";
		} else {
			echo "Error en la inserción: " . mysqli_error($mysqli);
		}
	}
}
?>
</body>
</html>
