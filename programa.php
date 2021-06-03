<?php
	 require("conexion.php");
	 $resultado= $conn->query('select * from localidades');
	 $loc=[];
	 while ($registro=$resultado->fetch_assoc()) {
	 	array_push($loc, $registro);
	 };


	$accion=$_GET['accion'];


	if ($accion == 'alta') {
		$nombre = $_POST['nombre'];
		$provincia = $_POST['prov'];
		$resultado=mysqli_query ($conn, "INSERT INTO localidades (id,nombre,id_provincias) VALUES (null,'$nombre','$provincia')");
	}


	if ($accion == 'editar') {
		$id=$_GET['id'];
		$nombre = $_POST['nombre'];

		$resultado=mysqli_query ($conn, "UPDATE localidades SET nombre='$nombre' WHERE localidades.id='$id'");
	}

	if ($accion == 'borrar') {
		$id=$_GET['id'];
		$nombre = $_POST['nombre'];

		$resultado=mysqli_query ($conn, "DELETE FROM localidades WHERE localidades.id='$id'");
	}
	header("location:index.php");
 ?>
