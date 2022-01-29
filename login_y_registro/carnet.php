<?php
	
	require("conexion.php");
	
	include ("../fpdf/fpdf.php");
	class crearpdf{
		
		function pdf(){
			include 'conexion.php';		
			// $id_estudiante= ($_POST['id_estudiantes']);
			$sentencia="SELECT * FROM estudiantes WHERE id_estudiantes ";
			$resultado=  mysqli_query($conexion, $sentencia) or die ("Error al consultar datos".mysqli_error($conexion));
			$filas= mysqli_fetch_assoc($resultado);
    return [
      $filas['periodo_id'],
      $filas['nombre_est'],
      $filas['apellido_est'],
      $filas['cedula_est'],
      $filas['cod_carrera']
    ];
			foreach ($resultado as $mostrar){

				$pdf = new FPDF();
				$pdf-> Addpage();

				$pdf->SetFont('Arial', '8','18');

				$pdf->SetTextColor(27,27,27);
				$id_estudiantes= utf8_decode($mostrar [$_GET['id_estudiantes']]);
				$pdf->Cell(180,5,$id_estudiantes,0,0,'C');
				$pdf->Ln(10);
				$pdf->SetFont('Arial','B',14);
				$periodo_id= utf8_decode($mostrar [0]);
				$pdf->Cell(180,5,$periodo_id,0,0,'C');
				$pdf->Ln(10);
				$pdf->SetFont('Arial','B',14);
				$nombre_est= utf8_decode($mostrar [1]);
				$pdf->Cell(180,5,$nombre_est,0,0,'C');
				$pdf->Ln(10);
				$pdf->SetFont('Arial','B',14);
				$apellido_est= utf8_decode($mostrar [2]);
				$pdf->Cell(180,5,$apellido_est,0,0,'C');
				$pdf->Ln(10);
				$pdf->SetFont('Arial','B',14);
				$cedula_est= utf8_decode($mostrar [3]);
				$pdf->Cell(180,5,$cedula_est_est,0,0,'C');
				$pdf->Ln(10);
				$pdf->SetFont('Arial','B',14);
				$cod_carrera= utf8_decode($mostrar [4]);
				$pdf->Cell(180,5,$cod_carrera,0,0,'C');
				$pdf->Ln(10);
				$pdf->SetFont('Arial','B',14);

				$pdf->Output();
				
			}
		}
	}
$pdf=new crearpdf;
$pdf->pdf();

?>