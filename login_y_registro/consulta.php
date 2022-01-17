
<?php
  
include "conexion.php";
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