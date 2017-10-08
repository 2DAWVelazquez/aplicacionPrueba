<?php 
    session_start();
    require('conexion.php');
    //comprobamos que el usuario tenga rol de administrador
    if ($_SESSION['rol']=='administrador') {
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<title>Edición de usuario</title>
</head>
<body>
<div class="container">
            <div class="row">
                <h3>Edición de usuario</h3>
            </div>
            <form name='edicion' action='update.php' method='post'>
            <table class="table table-striped table-bordered">
              <tbody>
              <?php
                $id = $_GET['id'];
                $consulta = "SELECT * FROM usuarios WHERE id = $id ORDER BY id DESC";
                    
                if ($resultado = $mysqli->query($consulta)) {
                   	
                  
                  //recogemos e imprimimos el array de objetos
					        while ($fila = $resultado->fetch_assoc()) {
					          
                            echo "<tr><th>Usuario</th><td><input type='text' name='usuario' class='form-control' value=".$fila['usuario']." required /></td></tr>";
                            echo "<tr><th>Rol</th><td><input type='text' name='rol' class='form-control' value=".$fila['rol']." required /></td></tr>";
                            echo '<tr><th>Fecha ingreso</th><td>'. $fila['trn_date'].'</td></tr>';
                           echo "<tr><input type='hidden' name='id' value=".$fila['id']."/><td><a href='home.php'><button type='button'>Atrás</button></a></td><td><button type='submit'>Modificar</button></td></tr>";
                            
                          
					        }
                  				    // cerramos la conexión
      				    	$resultado->close();
      					}
              ?>

              </tbody>
            </table>
            
            </form>

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