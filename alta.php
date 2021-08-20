<!DOCTYPE html>
<html lang="es">
<head>
	<title> ALTA </title>
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./css/propio.css">
</head>
<body>
	<?php
	 	require("conexion.php");
	 	$resultado= $conn->query('SELECT * FROM provincias');
	 	$prov=[];
	 	while ($registro=$resultado->fetch_assoc()) {
	 		array_push($prov, $registro);
	 	}
	?>
	<header>
		<h1 class="contenedor__title">Accion - Alta</h1>
	</header>
	<div class="contenedor">
		<div class="ventana">
			<form method="POST" action="programa.php ?accion=alta" >
				Nombre de localidad
				<div class="form-group">
					<input class="form-control" type="text" autofocus name="nombre" placeholder="Nombre">
					<!-- <input class="form-control" type="number" autofocus name="id" placeholder="ID"> -->
				</div>
					Provincia
					<select class="form-control" name="prov">
						<?php
							foreach ($prov as $provincias) {
								echo "<option value=".$provincias['id'].">".$provincias['nombreprov']."</option>";
							}
 						?>
 					</select>
				<br>
				<div class="form-group">
					<input class="button-accept" type="submit" value="Guardar">
				</div>
			</form>
		</div>
	</div>
</body>
</html>
