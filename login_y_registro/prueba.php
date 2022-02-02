<?php
  
  $consulta= ConsultarEstudiantes($_GET['id_estudiantes']);
  function ConsultarEstudiantes($id_est)
  {
    include 'conexion.php';
    
    
    $sentencia="SELECT DISTINCT estudiantes.id_estudiantes, estudiantes.periodo_id, estudiantes.nombre_est, estudiantes.apellido_est, estudiantes.cedula_est, estudiantes.cod_carrera, carrera.carreras FROM estudiantes, carrera WHERE (estudiantes.cod_carrera= carrera.cod_carrera) AND (id_estudiantes='".$id_est."')  ";
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
    <link rel="stylesheet" href="/estilos/css/carnet.css">
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
  		<span> <h1>Carnet</h1> </span>
  		<br>
          <img src="/estilos/img/logo.jpg" alt="" id="logo1">
    <img src="/estilos/img/descarga.png" alt="" id="logo2">
    <div class="mem">
<h6 class="membrete">Universidad Nacional Experimental Politécnica de la Fuerza Armada Nacional</h6>
    <div class="mb-3">
    <input class="form-control" type="hidden" name="id_estudiantes" value="<?php echo $_GET['id_estudiantes']?> " readonly="true" style="background-color: gray; ">
    </div>		
    <div class="mb-3">
   <label>Periodo </label>
   <h6><?php echo $consulta[0] ?></h6>
    </div>
    <div class="mb-3">
  		<label>Nombres del Estudiante </label>
          <h6><?php echo $consulta[1] ?></h6>
    </div>
    <div class="mb-3">
          <label>Apellidos del Estudiante </label>
          <h6><?php echo $consulta[2] ?></h6>
    </div>
    <div class="mb-3">
          <label>Cedula del Estudiante </label>
          <h6><?php echo $consulta[3] ?></h6>
    </div>
    <div class="mb-3">
          <label>Carrera </label>
          <h6><?php echo $consulta[4], " ",$consulta[5]; ?></h6>
    
    </div>
    <img src="<?php echo $file;?>" id="qr"><br>
    
  		<br>
      <div class="botones">
  		<!-- <button type="submit" class="btn btn-success" id="boton_guardar">Guardar</button> -->
      <a href="/login_y_registro/modificar.php" id="boton_regresar">Regresar</a>
      </div> 
  	</div>
  	
  </div>
  

</div>


</body>
</html>