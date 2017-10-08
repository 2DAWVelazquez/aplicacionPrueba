<?php 
/* Archivo de eliminación de registros */
    session_start();
    require('conexion.php');
    //comprobamos que el rol de usuario sea administrador
    if ($_SESSION['rol']=='administrador') {
    	if(isset($_GET['id'])){
	    	$id = $_GET['id']; //recogemos el id a eliminar
	        $consulta = "DELETE FROM usuarios WHERE id = $id";
	        //comprobamos que se haya eliminado correctamente y redirige al inicio, sino lanza error
	        if ($resultado = $mysqli->query($consulta)) {
	            header('Location: home.php');
	        }
	        else{
	            echo $mysqli->error;
	        }
	    }
	}
?>
