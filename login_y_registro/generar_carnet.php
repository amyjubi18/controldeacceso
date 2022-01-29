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
    <title>Generar Carnet</title>
</head>
<body id="body">

<div class="menu">
        <a href="../login_y_registro/index.html">Inicio</a>
        <a href="../qr/lector_qr.php">Acceso</a>
        <a href="../login_y_registro/registro.php">Registrar</a>
        <a href="../login_y_registro/modificar.php">Listado</a>
    </div>
    <br>
<div class="container">

  <div class="abs-center">
      <table border="2">
          <tbody>
          <thead>
              <tr>
                  <td>ID</td>
                  <td>Periodo</td>
                  <td>Nombres del Estudiante</td>
                  <td>Apellidos del Estudiante</td>
                  <td>Cedula del Estudiante</td>
                  <td>Codigo de la Carrera</td>
              </tr>
              <tr>
              <td><?php echo $_GET['id_estudiantes']?> </td>
                  <td><?php echo $consulta[0] ?> </td>
                  <td><?php echo $consulta[1] ?></td>
                  <td><?php echo $consulta[2] ?></td>
                  <td><?php echo $consulta[3] ?></td>
                  <td><?php echo $consulta[4] ?></td>
              </tr>
            

        </thead>
          </tbody>
      </table>
  	
      <div class="botones">
          <a href= "/login_y_registro/carnet.php" class= "btn">  Imprimir</a>      
        </div> 
  	</div>
  	
  </div>
  




</body>
</html>
