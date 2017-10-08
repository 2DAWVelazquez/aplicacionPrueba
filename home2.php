<?php 
    session_start();
    require('conexion.php');
    //comprobamos que el rol de usuario sea editor
    if ($_SESSION['rol'] == 'editor') {
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<title>Vista de usuario</title>
</head>
<body>
<div class="container">
            <div class="row">
                <h3>Vista de <?php echo $_SESSION['username']?></h3>
            </div>
            <div class="row">
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Usuario</th>
                      <th>Rol</th>
                      <th>Fecha de registro</th>
                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  //recogemos el valor de la variable session id
                  $id = $_SESSION['id'];
                    $consulta = "SELECT * FROM usuarios WHERE id = $id ORDER BY id DESC";
                    
                   	if ($resultado = $mysqli->query($consulta)) {
                   		
				    //recogemos e imprimimos el array de objetos
					    while ($fila = $resultado->fetch_assoc()) {
					        echo '<tr>';
                            echo '<td>'. $fila['usuario'] . '</td>';
                            echo '<td>'. $fila['rol'] . '</td>';
                            echo '<td>'. $fila['trn_date'] . '</td>';
                            echo "<td>
                            <a href='editar.php?id=".$fila["id"]."'><button type='btn btn-default'>Editar</button></a>
                            <a href='eliminar.php?id=".$fila["id"]."'><button type='btn btn-default'>Eliminar</button></a></td>";
                            echo '</tr>';
					    }

				    //liberar el conjunto de resultados
				    	$resultado->close();
					}
                  ?>
                  </tbody>
            </table>
        </div>
    </div> <!-- /container -->
<a href="logout.php">Cerrar sesión</a>
<?php
	}
	else{
?>
<p>no tienes permiso para estar aqui</p>
<?php
	}
?>
</body>
</html>  