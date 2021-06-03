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

	<div id="contenedor">
		<div id="cabecera">
			Editar Localidades
		</div>
		<div id="ventana">
			<form method="POST" action="programa.php?accion=editar&id= <?php echo $id; ?> ">
				Nombre de la localidad
				
				<div class="form-group">
					<input class="form-control" type="text" name="nombre" value="<?php echo $loc['nombre'];?>">
				</div>
				
				<div class="form-group">
					<button class="boton5" type="submit"> Editar </button>
				</div>	

			</form>

		</div>	

	</div>

</body>
</html>