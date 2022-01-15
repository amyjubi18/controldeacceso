<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar</title>
</head>
<body>
<style>
    body{
        background-color: cadetblue;
    }
</style>
<div class="menu">
        <a href="index.html">Inicio</a>
        <a href="acceso.php">Acceso</a>
        <a href="registro.php">Registrar</a>
        <a href="modificar.php">Modificar</a>
        <a href="eliminar.php">Eliminar</a>

<div class= "todo">

    <div id= "contenido" style="margin-top: -650px;">
        <table style="margin: auto;  border-collapse: separate; border-spacing: 25px 5px; border-color:cornflowerblue;">
        <thead>
            <th>ID</th>
            <th>Periodo</th>
            <th>Nombres del Estudiante</th>
            <th>Apellidos del Estudiante</th>
            <th>Cedula del Estudiante</th>
            <th>Codigo de la Carrera</th>
            <th>Codigo QR</th>
        </thead>
<?php
include "conexion.php";

$consultar = "SELECT * FROM estudiantes";
$resultado = mysqli_query($conexion, $consultar) or die (mysqli_error($conexion));

while($filas= $resultado->fetch_assoc())
{
    echo "<tr>";
        echo "<td>"; echo $filas ['id_estudiantes']; echo "</td>"; echo "<br>";
        echo "<td>"; echo $filas ['periodo_id']; echo "</td>"; echo "<br>";
        echo "<td>"; echo $filas ['nombre_est']; echo "</td>"; echo "<br>";
        echo "<td>"; echo $filas ['apellido_est']; echo "</td>"; echo "<br>";
        echo "<td>"; echo $filas ['cedula_est']; echo "</td>"; echo "<br>";
        echo "<td>"; echo $filas ['cod_carrera']; echo "</td>"; echo "<br>";
        /*echo "<td>"; echo $filas ['qr']; echo "</td>"; echo "<br>";*/
        echo "<td> <a href='modificar_est.php'> <buttom type= 'buttom' class='btn btn-success'> Modificar </buttom> </a> </td>";
        echo "<td> <a href='#'> <buttom type= 'buttom' class='btn btn-danger'> Eliminar </buttom> </a> </td>";
    echo "</tr>";
}

?> 

</table>
</div>
</div>
</body>
</html>