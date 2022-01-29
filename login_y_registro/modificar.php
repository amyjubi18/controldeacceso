<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/estilos/css/modificar1.css">

    <title>Listado</title>
</head>
<body id="body">

<div class="menu">
        <a href="../login_y_registro/index.html">Inicio</a>
        <a href="../qr/lector_qr.php">Acceso</a>
        <a href="../login_y_registro/registro.php">Registrar</a>
        <a href="../login_y_registro/modificar.php">Listado</a>
        <a href="../login_y_registro/login.php" id="cerrar_sesion">Cerrar Sesión</a>
        <br>
        <br>
</div>
<h1>Listado de estudiantes</h1>
<div class="contenedor_buscar">
        <form action="buscar.php" method= "post";>
        <input type="text" name="buscar" id= "buscar"> 
        <input type = "submit" value = "Buscar" id="boton_buscar"></form> 
         </div>
<div class= "todo">

    <div id= "contenido" >
    
        <table id="tabla">
        <thead>
            <th>ID</th>
            <th>Periodo</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Cédula</th>
            <th>Codigo</th>
            <th>Carrera</th>
            <th>Opción</th>
        </thead>

<?php
include "conexion.php";

$consultar = "SELECT estudiantes.id_estudiantes, estudiantes.periodo_id, estudiantes.nombre_est, estudiantes.apellido_est, estudiantes.cedula_est, estudiantes.cod_carrera, carrera.carreras  FROM estudiantes, carrera WHERE estudiantes.cod_carrera = carrera.cod_carrera  order by id_estudiantes ";
$resultado = mysqli_query($conexion, $consultar) or die (mysqli_error($conexion));


while($filas= $resultado->fetch_assoc())
{
    echo "<tr>";
    echo "<tbody>";
        echo "<td>"; echo "<b>"; echo $filas ['id_estudiantes']; echo"</b>"; echo "</td>"; echo "<br>";
        echo "<td>"; echo $filas ['periodo_id']; echo "</td>"; echo "<br>";
        echo "<td>"; echo $filas ['nombre_est']; echo "</td>"; echo "<br>";
        echo "<td>"; echo $filas ['apellido_est']; echo "</td>"; echo "<br>";
        echo "<td>"; echo $filas ['cedula_est']; echo "</td>"; echo "<br>";
        echo "<td>"; echo $filas ['cod_carrera']; echo "</td>"; echo "<br>";
        echo "<td>"; echo $filas ['carreras']; echo "</td>"; echo "<br>";
        echo "<td> <a href='modificar_est.php?id_estudiantes=".$filas['id_estudiantes']."'> <buttom type= 'buttom' class='btn btn-success'> Modificar </buttom> </a> </td>";
        echo "<td> <a href='eliminar1.php?id_estudiantes=".$filas['id_estudiantes']."'> <buttom type= 'buttom' class='btn btn-danger'> Eliminar </buttom> </a> </td>";
    echo "</tbody>";
        echo "</tr>";
}

?> 

</table>
</div>
</div>
</body>
</html>