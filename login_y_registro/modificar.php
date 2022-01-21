<!DOCTYPE html>
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
        <br>
        <div>
        <form action="buscar.php" method= "post";>
        <input type="text" name="buscar" id= ""> 
        <input type = "submit" value = "Buscar" id=""></form> 
         </div>
<div class= "todo">

    <div id= "contenido" style="margin-top: -500px;">
        <table style="margin: auto;  border-collapse: separate; border-spacing: 25px 5px; border-color:cornflowerblue;">
        <thead>
            <th>ID</th>
            <th>Periodo</th>
            <th>Nombres del Estudiante</th>
            <th>Apellidos del Estudiante</th>
            <th>Cedula del Estudiante</th>
            <th>Codigo de la Carrera</th>
            <th>Opción</th>
        </thead>
<?php
include "conexion.php";

$consultar = "SELECT * FROM estudiantes  order by id_estudiantes ";
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
        echo "<td> <a href='modificar_est.php?id_estudiantes=".$filas['id_estudiantes']."'> <buttom type= 'buttom' class='btn btn-success'> Modificar </buttom> </a> </td>";
        echo "<td> <a href='eliminar1.php'> <buttom type= 'buttom' class='btn btn-danger'> Eliminar </buttom> </a> </td>";
    echo "</tr>";
}

?> 

</table>
</div>
</div>
</body>
</html>