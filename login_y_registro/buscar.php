<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="/estilos/css/buscar.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar</title>
</head>
<body id="body">
<div class="menu">
        <a href="../login_y_registro/index.html">Inicio</a>
        <a href="../qr/lector_qr.php">Acceso</a>
        <a href="../login_y_registro/registro.php">Registrar</a>
        <a href="../login_y_registro/modificar.php">Listado</a>
    </div>
    <div class="contenedor_buscar">
        <form action="buscar.php" method="post">
            <input type="text" name="buscar" id= "buscar">
            <input type="submit" value="Buscar" id="boton_buscar">
        </form>
    </div>
    <br>
    <div>
        <table border = "2" id="tabla">
            
            <tr>
            <td>ID</td>
            <td>Periodo</td>
            <td>Nombres del Estudiante</td>
            <td>Apellidos del Estudiante</td>
            <td>Cedula del Estudiante</td>
            <td>Codigo de la Carrera</td>
            <td>Opcion</td>
            </tr>
            
            <?php
                $buscar = $_POST['buscar'];
                include("conexion.php");
                $sql = "SELECT id_estudiantes, periodo_id, nombre_est, apellido_est, cedula_est, cod_carrera  FROM estudiantes WHERE cedula_est like '$buscar' '%' order by id_estudiantes desc";
                $rta = mysqli_query($conexion, $sql);
                while ($mostrar = mysqli_fetch_row($rta)) {
                    ?>
                    <tr>
                        <td><?php echo $mostrar[0] ?></td>
                        <td><?php echo $mostrar[1] ?></td>
                        <td><?php echo $mostrar[2] ?></td>
                        <td><?php echo $mostrar[3] ?></td>
                        <td><?php echo $mostrar[4] ?></td>
                        <td><?php echo $mostrar[5] ?></td>
    
                        <td>
                            <div class="contener_opcion">
                            <a href="modificar_est.php?
                            id_estudiantes=<?php echo $mostrar[0] ?> &
                            periodo_id=<?php echo $mostrar[1] ?> &
                            nombre_est=<?php echo $mostrar[2] ?> &
                            apellido_est=<?php echo $mostrar[3] ?> &
                            cedula_est=<?php echo $mostrar[4] ?> &
                            cod_carrera=<?php echo $mostrar[5] ?>
                            " id="boton_modificar">Modificar</a>
                            <a href="eliminar1.php? id_estudiantes=<?php echo $mostrar[0] ?>" id="boton_eliminar">Eliminar</a>
                            </div>
                        </td>
                    </tr>
                <?php
                }
                ?>
        </table>
    </div>
</body>
</html>