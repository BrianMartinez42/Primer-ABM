<!DOCTYPE html>
<html>
<head>
	<title> Index </title>
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./css/propio.css">
</head>
<body>

	<?php
	 	if (isset($_POST['Nombre'])){
	 		$Nombre=$_POST['Nombre'];
	 	}
	 	else
	 	{
	 		$Nombre='';
	 	}
	 	require("conexion.php");
	 	if ($Nombre==''){
	 		$resultado= $conn->query('SELECT localidades.*, provincias.nombreprov
	 			FROM provincias
	 			INNER JOIN localidades on provincias.id = localidades.id_provincias');
	 	}
	 	else
	 	{
	 		$resultado= $conn->query("SELECT * FROM localidades, provincias.nombreprov
	 			FROM provincias
	 			INNER JOIN localidades on provincias.id = localidades.id_provincias
	 			WHERE localidades.nombre LIKE '%$Nombre%'");
	 	}
	 	$loc=[];
	 	while ($registro=$resultado->fetch_assoc()) {
	 		array_push($loc, $registro);
	 	}
	?>
	<header>
		<h1 class="contenedor__title">Inicio</h1>
	</header>
	<div class="container">
		<div>
			<form action="index.php" method="POST">
				<div class="form-group">
					<input type="text" placeholder="Buscar" class="inp" name="Nombre">
					<button type="submit" class="button-grey">Buscar</button>
				</div>
			</form>
		</div>
		<div class="row">
				<a href="alta.php" class="button-green" type="submit"> Alta </a>
				<table class="table table-hover table-bordered table-dark">
					<thead>
						<tr>
	        		<th scope="col">Provincia</th>
	        		<th scope="col">Localidad</th>
	          	<th scope="col">Accion</th>
						</tr>
					</thead>
					<tbody>
							<?php
								foreach ($loc as $localidad)
								{
									echo "<tr>";
									echo '<td>'.$localidad['nombreprov'].'</td>';
									echo '<td>'.$localidad['nombre'].'</td>';
									echo '<td>';
									echo '<a href="editar.php?id='.$localidad['id'].'" class="button-blue">Editar</a>';
									echo '<a href="borrar.php?id='.$localidad['id'].'" class="button-red">Borrar</a>';
									echo '</td>';
									echo '</tr>';
								}
							?>
					</tbody>
				</table>
		</div>
	</div>
</body>
</html>
