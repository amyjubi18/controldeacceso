<?php
  

  $consulta= ConsultarEstudiantes($_GET['id_estudiantes']);
  function ConsultarEstudiantes($id_est)
  {
    include 'conexion.php';
    

    $sentencia="SELECT id_estudiantes, periodo_id, nombre_est, apellido_est, cedula_est, cod_carrera FROM estudiantes WHERE id_estudiantes='".$id_est."' ";
    $resultado=  mysqli_query($conexion, $sentencia) or die ("Error al consultar datos".mysqli_error($conexion));
    $filas= mysqli_fetch_assoc($resultado);
    return [
      $filas['periodo_id'],
      $filas['nombre_est'],
      $filas['apellido_est'],
      $filas['cedula_est'],
      $filas['cod_carrera'],
      $filas['carreras']
    ];
  }
 
?>
<!DOCTYPE html>
<html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/estilos/css/modifica2.css">
    <title>Modificar</title>
</head>
<body id="body">

<div class="menu">
        <a href="../login_y_registro/index.html">Inicio</a>
        <a href="../qr/lector_qr.php">Acceso</a>
        <a href="../login_y_registro/registro.php">Registrar</a>
        <a href="../login_y_registro/modificar.php">Listado</a>
        <a href="../login_y_registro/login.php" id="cerrar_sesion">Cerrar Sesión</a>
      </div>
    <br>
<div class="container">

  <div class="abs-center">
  	<div style="margin: auto; width: 810px; border-collapse: separate; border-spacing: 8px 4px;">
  		<span> <h1>Modificar</h1> </span>
  		<br>
	  <form action="modificar_est2.php" method="POST" style="border-collapse: separate; border-spacing: 10px 5px;" class="border p-3 form" enctype="multipart/form-data">
    <div class="mb-3">
    <input class="form-control" type="hidden" name="id_estudiantes" value="<?php echo $_GET['id_estudiantes']?> " readonly="true" style="background-color: gray; ">
    </div>		
    <div class="mb-3">
   <label>Periodo </label>
      <input class="form-control" type="text" id="periodo_id" name="periodo_id" value="<?php echo $consulta[0] ?>" readonly="true" style="background-color: gray;">
    </div>
    <div class="mb-3">
  		<label>Nombres del Estudiante </label>
  		<input class="form-control" type="text" id="nombre_est" name="nombre_est" value="<?php echo $consulta[1] ?>">
    </div>
    <div class="mb-3">
          <label>Apellidos del Estudiante </label>
  		<input class="form-control" type="text" id="apellido_est" name="apellido_est" value="<?php echo $consulta[2] ?>">
    </div>
    <div class="mb-3">
          <label>Cedula del Estudiante </label>
  		<input class="form-control" type="text" id="cedula_est" name="cedula_est" value="<?php echo $consulta[3] ?>">
    </div>
    <div class="mb-3">
          <label>Codigo de la Carrera </label>
          <input class="form-control" type="text" id="cod_carrera" name="cod_carrera" value="<?php echo $consulta[4]; ?>" readonly="true" style="background-color: gray;">
    </div>
  		<br>
      <div class="botones">
  		<button type="submit" class="btn btn-success" id="boton_guardar">Guardar</button>
      <a href="/login_y_registro/modificar.php" id="boton_regresar">Regresar</a>
      </div> 
    </form>
  	</div>
  	
  </div>
  

</div>


</body>
</html>

