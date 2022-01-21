<?php
  

  $consulta= ConsultarEstudiantes($_GET['id_estudiantes']);

  function ConsultarEstudiantes($id_est)
  {
    include 'conexion.php';
    

    $sentencia="SELECT * FROM estudiantes WHERE id_estudiantes='".$id_est."' ";
    $resultado=  mysqli_query($conexion, $sentencia) or die ("Error al consultar datos".mysqli_error($conexion));
    $filas= mysqli_fetch_assoc($resultado);
    return [
      $filas['periodo_id'],
      $filas['nombre_est'],
      $filas['apellido_est'],
      $filas['cedula_est'],
      $filas['cod_carrera']
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
    <title>Modificar</title>
</head>
<body>

<div class="menu">
        <a href="../login_y_registro/index.html">Inicio</a>
        <a href="../qr/lector_qr.php">Acceso</a>
        <a href="../login_y_registro/registro.php">Registrar</a>
        <a href="../login_y_registro/modificar.php">Modificar</a>
        <a href="../login_y_registro/eliminar.php">Eliminar</a>
    </div>
<div class="cont">

  <div id="contenido">
  	<div style="margin: auto; width: 800px; border-collapse: separate; border-spacing: 10px 5px;">
  		<span> <h1>Modificar</h1> </span>
  		<br>
	  <form action="modificar_est2.php" method="POST" style="border-collapse: separate; border-spacing: 10px 5px;">
    <label>ID</label>  
   <b> <input type="text" name="id_estudiantes" value="<?php echo $_GET['id_estudiantes']?> " readonly="true" style="background-color: gray; "></b><br>
  		<label>Periodo </label>
      <input type="text" id="periodo_id" name="periodo_id" value="<?php echo $consulta[0] ?>" readonly="true" style="background-color: gray;"><br>
  		
  		<label>Nombres del Estudiante </label>
  		<input type="text" id="nombre_est" name="nombre_est" value="<?php echo $consulta[1] ?>"><br>
  		
          <label>Apellidos del Estudiante </label>
  		<input type="text" id="apellido_est" name="apellido_est" value="<?php echo $consulta[2] ?>"><br>
  		
          <label>Cedula del Estudiante </label>
  		<input type="text" id="cedula_est" name="cedula_est" value="<?php echo $consulta[3] ?>"><br>
  		
          <label>Codigo de la carrera </label>
          <input type="text" id="cod_carrera" name="cod_carrera" value="<?php echo $consulta[4] ?>" readonly="true" style="background-color: gray;"><br>
          
  		
  		<br>
  		<button type="submit" class="btn btn-success">Guardar</button>
      <a href="/login_y_registro/modificar.php">Regresar</a>
     </form>
  	</div>
  	
  </div>
  

</div>


</body>
</html>

