<!DOCTYPE html>
<html>
<head>
	<title> </title>
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./css/propio.css">
</head>
	<body>

	 <?php
		$id=$_GET['id'];
	 	require("conexion.php");
		$resultado=mysqli_query($conn, "SELECT * FROM localidades WHERE localidades.id=$id");
		$loc=mysqli_fetch_array($resultado);
	  ?>

		<header>
			<h1 class="contenedor__title">Accion - Borrar/Eliminar</h1>
		</header>
		<div class="ventana">
			<form method="POST" action="programa.php?accion=borrar&id=<?php echo $id; ?>">
				¿Seguro que quiere borrar la localidad?
				<div class="form-group">
					<input class="form-control" type="text" name="nombre" readonly value="<?php echo $loc['nombre'];?>">
				</div>
				<div class="form-group">
					<input class="button-accept" type="submit" value="Borrar">
				</div>
			</form>
		</div>
	</body>
</html>
