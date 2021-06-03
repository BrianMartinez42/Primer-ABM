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

	<div class="container">
		<div>
			<form action="index.php" method="POST">
				<div class="form-group">
					<input type="text" placeholder="Buscar" class="inp" name="Nombre">
					<button type="submit">Buscar</button>
				</div>
			</form>
		</div>

		<div>
			<ul class="lista">
				<li class="menulista"> <a class="opciones" href="#"> Opcion 1 </a> </li>
				<li class="menulista"> <a class="opciones" href="#"> Opcion 2 </a> </li>
				<li class="menulista"> <a class="opciones" href="#"> Opcion 3 </a> </li>
			</ul>
		</div>

		<div class="row">
			<div  class="col-lg-8 col-md-8 col-sm-7 col-xs-7">
				Sector Izquierdo
				<a href="alta.php" class="boton2" type="submit"> Alta </a>
				<table class="table table-bordered table-hover">

					<tr>
        		<th bgcolor="darkgrey">Nombre</th>
        		<th bgcolor="darkgrey">Provincia</th>
          	<th bgcolor="darkgrey">Accion</th>
						<?php
							foreach ($loc as $localidad)
							{
								echo "<tr>";
								echo '<td bgcolor="white">'.$localidad['nombre'].'</td>';
								echo '<td bgcolor="white">'.$localidad['nombreprov'].'</td>';
								echo '<td bgcolor="white">';
								echo '<a href="borrar.php?id='.$localidad['id'].'" class="boton3">Borrar</a>';
								echo '<a href="editar.php?id='.$localidad['id'].'" class="boton4">Editar</a>';
								echo '</td>';
								echo '</tr>';
							}
						?>
					</tr>
					<thead>
					</tbody>
				</table>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-5 col-x-6">
				Sector Derecho
				<br></br>
			</div>
		</div>
	</div>
</body>
</html>
