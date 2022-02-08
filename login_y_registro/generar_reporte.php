<?php

require("./fpdf/fpdf.php");
include 'conexion.php';

$pdf = new FPDF($orientation='P',$unit='mm');
$pdf->AddPage();
$pdf->SetFont('Arial','B',35);    
$textypos = 5;
$pdf->setY(15);
$pdf->setX(85);
$pdf->Image('../estilos/img/logo.jpg',20,10,25);
$pdf->SetTextColor(3,3,114);
$pdf->Cell(30,$textypos,"UNEFA");
$pdf->Image('../estilos/img/descarga.png',180,10,15);
$pdf->SetFont('Arial','B',12);    
$pdf->setY(40);$pdf->setX(65);
$pdf->Ln();
$pdf->Ln();
$consulta ="SELECT estudiantes.id_estudiantes, periodo.tiempo,
periodo.periodo, periodo.turno, estudiantes.nombre_est, estudiantes.apellido_est, 
estudiantes.cedula_est, estudiantes.cod_carrera, carrera.carreras, entradas.fecha_hora  
FROM estudiantes, carrera, entradas,periodo WHERE (estudiantes.cod_carrera = carrera.cod_carrera) AND (estudiantes.cedula_est=entradas.cedula_est) AND (estudiantes.periodo_id=periodo.periodo_id)order by id_estudiantes ";
$resultado=  mysqli_query($conexion, $consulta) or die (mysqli_error($conexion));
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial','B',20);
$pdf->Cell(135,10,"Reporte de estudiantes",0,2,0);$pdf->Ln();


while ($row = mysqli_fetch_assoc($resultado)){
    $pdf->setX(37);
    $pdf->SetFont('Arial','B',14);     
    $pdf->SetTextColor(3,3,114);
    $pdf->Cell(65, 10,"ID", 1,0, 'C',0);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','',12);  
    $pdf->Cell(72,10, $row['id_estudiantes'],1,1,'C',0);
    //
    $pdf->setX(37);
    $pdf->SetFont('Arial','B',14);     
    $pdf->SetTextColor(3,3,114);
    $pdf->Cell(65,10, "PERIODO ACADEMICO", 1,0, 'C',0);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','',12);  
    $pdf->Cell(24,10, $row['tiempo'],1,0,'C',0);
    $pdf->Cell(24,10, $row['periodo'],1,0,'C',0);
    $pdf->Cell(24,10, $row['turno'],1,1,'C',0);
    //
    $pdf->setX(37);
    $pdf->SetFont('Arial','B',14);     
    $pdf->SetTextColor(3,3,114);
    $pdf->Cell(65,10,"NOMBRES", 1,0, 'C',0);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','',12); 
    $pdf->Cell(72,10, $row['nombre_est'],1,1,'C',0);
    //
    $pdf->setX(37);
    $pdf->SetFont('Arial','B',14);     
    $pdf->SetTextColor(3,3,114);
    $pdf->Cell(65, 10, "APELLIDOS", 1,0, 'C',0);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','',12); 
    $pdf->Cell(72,10, $row['apellido_est'],1,1,'C',0);
    //
    $pdf->setX(37);
    $pdf->SetFont('Arial','B',14);     
    $pdf->SetTextColor(3,3,114);
    $pdf->Cell(65,10,"CEDULA", 1,0, 'C',0);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','',12); 
    $pdf->Cell(72,10, $row['cedula_est'],1,1,'C',0);
    //
    $pdf->setX(37);
    $pdf->SetFont('Arial','B',14);     
    $pdf->SetTextColor(3,3,114);
    $pdf->Cell(65,10,"CODIGO DE LA CARRERA", 1,0, 'C',0);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(72,10, $row['cod_carrera'],1,1,'C',0);
    //
    $pdf->setX(37);
    $pdf->SetFont('Arial','B',14);     
    $pdf->SetTextColor(3,3,114);
    $pdf->Cell(65,10,"CARRERA", 1,0, 'C',0);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(72,10, $row['carreras'],1,1,'C',0);
    //
    $pdf->setX(37);
    $pdf->SetFont('Arial','B',14);     
    $pdf->SetTextColor(3,3,114);
    $pdf->Cell(65,10,"ENTRADA", 1,0, 'C',0);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(72,10, $row['fecha_hora'],1,1,'C',0);
    $pdf->Ln();

}

$pdf->output('I', "Reporte-del-dia", false);
