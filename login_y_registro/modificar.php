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
        <a href="index.html">Inicio</a>
        <a href="acceso.php">Acceso</a>
        <a href="registro.php">Registrar</a>
        <a href="modificar.php">Modificar</a>
        <a href="eliminar.php">Eliminar</a>
    </div>
    <div>
    <?php
    include "conexion.php";
    $consultar = "SELECT * FROM estudiantes";
    $resultados =mysqli_query($conexion, $consultar);

    while($filas=mysqli_fetch_assoc($resultados)){
        echo "<tr>";
        echo "<td>"; echo $filas ['id_estudiantes']; echo "</td>"; echo "<br>";
        echo "<td>"; echo $filas ['periodo_id']; echo "</td>"; echo "<br>";
        echo "<td>"; echo $filas ['nombre_est']; echo "</td>"; echo "<br>";
        echo "<td>"; echo $filas ['apellido_est']; echo "</td>"; echo "<br>";
        echo "<td>"; echo $filas ['cedula_est']; echo "</td>"; echo "<br>";
        echo "<td>"; echo $filas ['cod_carrera']; echo "</td>";echo "<br>";
        echo "<td>"; echo $filas ['qr']; echo "</td>"; echo "<br>";
        echo "<td> <a href='modificar.php'><buttom type= 'buttom' class='btn-success'>Modificar</buttom></a></td>";
        echo "<td> <a href='eliminar.php'><buttom type= 'buttom' class='btn-success'>Eliminar</buttom></a></td>";
        echo "</tr>";

    }
    ?>
    </div>
</body>
</html>