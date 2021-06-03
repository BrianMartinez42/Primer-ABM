<!DOCTYPE html>
<html>
<head>
	<title> </title>
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
	<div id="contenedor">

		<div id="cabecera">
			Alta de Localidades
		</div>
		
			<div>
				<ul class="lista">
					<li class="menulista"> <a class="opciones" href="#"> Opcion 1 </a> </li>
					<li class="menulista"> <a class="opciones" href="#"> Opcion 2 </a> </li>
					<li class="menulista"> <a class="opciones" href="#"> Opcion 3 </a> </li>
				</ul>
			</div>

		<div id="ventana">
			<form method="POST" action="programa.php ?accion=alta" >
				Nombre de la localidad

				<div class="form-group">
					<input class="form-control" type="text" autofocus name="nombre">
				</div>
					<select class="form-control" name="Provincia">
						<?php 				
							foreach ($prov as $provincias) {				
								echo "<option value=".$provincias['id'].">".$provincias['nombre']."</option>";
							}
 						?>
 					</select>
				<br>
				<div class="form-group">
					<button class="boton5" type="submit"> Guardar </button>
				</div>
				
			</form>
		</div>	

	</div>
</body>
</html>