<?php
include 'conexion.php';
// include 'registro_estudiante_bd.php';
$consulta=ConsultarEstudiantes($_GET['id_estudiante']);

  function ConsultarEstudiantes($id_est)
  {
    include 'conexion.php';

    $sentencia="SELECT * FROM estudiantes";
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
function generarpdfp($cedula_est){
require("/Users/Amanda/Desktop/controldeacceso/fpdf/fpdf.php");
      
      $pdf=  new FPDF();
      $pdf->AddPage();
      $pdf->SetTitle("Estudiante");
      $pdf->SetFont('Arial', 'i', 16);
      $pdf->Cell(40,10, utf8_decode($resultado['nombre_est']['apellido_est']));
      $pdf->Output();




    }
?>