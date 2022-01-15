
<?php
  

  $consulta=ConsultarEstudiantes($_GET['id_estudiantes']);

  function ConsultarEstudiantes($id_est)
  {
    include 'conexion.php';

    $sentencia="SELECT * FROM estudiantes WHERE id_estudiantes='".$id_est."' ";
    $resultado=  mysqli_query($conexion, $sentencia) or die (mysqli_error($conexion));
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
<<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar</title>
</head>
<body>

<div class="menu">
        <a href="index.html">Inicio</a>
        <a href="acceso.php">Acceso</a>
        <a href="registro.php">Registrar</a>
        <a href="modificar.php">Modificar</a>
        <a href="eliminar.php">Eliminar</a>
    </div>
<div class="cont">

  <div id="contenido">
  	<div style="margin: auto; width: 800px; border-collapse: separate; border-spacing: 10px 5px;">
  		<span> <h1>Modificar</h1> </span>
  		<br>
	  <form action="modificar_est2.php" method="POST" style="border-collapse: separate; border-spacing: 10px 5px;">
      <input type="hidden" name="id_estudiantes" value="<?php echo $_GET['id_estudiantes']?> ">
  		<label>Periodo </label>
  		<select class="form-select" name="periodo_id" id="periodo_id" value="<?php echo $consulta[0] ?>" >
                    <option value="0">Seleccione el Periodo</option>
                <?php
                include("conexion.php");
                $consulta = "SELECT * FROM periodo";
                
                $ejecutar = mysqli_query($conexion, $consulta);
                while($row1 = mysqli_fetch_array($ejecutar)){
                    $periodo_id = $row1['periodo_id'];
                   echo "<option value = '".$periodo_id."'>".$periodo_id."</option>";

                }
                ?>
                </select><br>
  		
  		<label>Nombres del Estudiante </label>
  		<input type="text" id="nombre_est" name="nombre_est" value="<?php echo $consulta[1] ?>"><br>
  		
          <label>Apellidos del Estudiante </label>
  		<input type="text" id="apellido_est" name="apellido_est" value="<?php echo $consulta[2] ?>"><br>
  		
          <label>Cedula del Estudiante </label>
  		<input type="text" id="cedula_est" name="cedula_est" value="<?php echo $consulta[3] ?>"><br>
  		
          <label>Codigo de la carrera </label>
          <select class="form-select" name="cod_carrera" id="cod_carrera" value="<?php echo $consulta[4] ?>">
                    <option value="0">Seleccione la Carrera</option>
                <?php
                include("conexion.php");
                $consulta = "SELECT * FROM carrera";
                
                $ejecutar = mysqli_query($conexion, $consulta);
                while($row = mysqli_fetch_array($ejecutar)){
                    $cod_carrera = $row['cod_carrera'];
                    $carreras =$row['carreras'];
                   echo "<option value = '".$cod_carrera."'>".$cod_carrera." ".$carreras."</option>";

                }
                ?>
                </select>  <br>
  		
  		<br>
  		<button type="submit" class="btn btn-success">Guardar</button>
     </form>
  	</div>
  	
  </div>
  

</div>


</body>
</html>

