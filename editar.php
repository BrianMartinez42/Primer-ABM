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

		$res= $conn->query('SELECT * FROM provincias');
		$prov=[];
		while ($registro=$res->fetch_assoc()) {
			array_push($prov, $registro);
		}
	 ?>
		<header>
			<h1 class="contenedor__title">Accion - Editar/Modificar/Actualizar</h1>
		</header>

		<div class="ventana">
			<form method="POST" action="programa.php?accion=editar&id= <?php echo $id; ?> ">
				Nombre de la localidad
				<div class="form-group">
					<input class="form-control" type="text" name="nombre" autofocus value="<?php echo $loc['nombre'];?>">
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
					<input class="button-accept" type="submit" value="Editar">
				</div>
			</form>
		</div>
</body>
</html>
