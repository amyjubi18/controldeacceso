<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar</title>
</head>
<body>
    <div class="menu">
        <a href="../login_y_registro/index.html">Inicio</a>
        <a href="../qr/lector_qr.php">Acceso</a>
        <a href="../login_y_registro/registro.php">Registrar</a>
        <a href="../login_y_registro/modificar.php">Modificar</a>
        <a href="../login_y_registro/eliminar.php">Eliminar</a>
    </div>

    <?php  
	if (!isset($_GET['id_estudiantes'])) {
		exit();
	}

	$codigo = $_GET['id_estudiantes'];
	include 'conexion.php';
	$sentencia = $conexion->prepare("DELETE FROM estudiantes WHERE id_estudiantes = ?;");
	$resultado = $sentencia->execute();

	if ($resultado){
        echo '
        <script>
        alert("Datos modificados correctamente");
        window.location = "/login_y_registro/modificar.php"
        </script>
        ';
    }else{
        echo '
        <script>
        alert("error en modificacion");
        window.location = "/login_y_registro/modificar.php"
        </script>
        ';
    }

?>
    
</body>
</html>