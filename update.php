<?php
	// Código para actualizar los datos de un usuario

	require('conexion.php');
	if(isset($_POST)){
		//recogemos las variables pasadas por POST
		$usuario = $_POST['usuario'];
		$rol = $_POST['rol'];
		$id = $_POST['id'];

		$consulta = "UPDATE usuarios SET usuario = '$usuario', rol = '$rol' WHERE id = '$id'";
		//aqui se intenta realizar la actualizacion, sino, nos da error
		if ($resultado = $mysqli->query($consulta)) {
			echo "<p>Modificación realizada con éxito</p>";
			echo "<a href='home.php'>Volver al Panel de control</a>";
		}
		else{
			echo "Error mientras se actualizaban los datos...";
		}
	}