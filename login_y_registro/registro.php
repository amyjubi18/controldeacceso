<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="/estilos/css/registro.css">
</head>
<body>
    <div class="menu">
        <a href="index.html">Inicio</a>
        <a href="acceso.php">Acceso</a>
        <a href="registro.php">Registrar</a>
        <a href="modificar.php">Modificar</a>
        <a href="eliminar.php">Eliminar</a>
    </div>
    <main>
        <div class="contenedor_3">
            <form action="registro_estudiante_bd.php" method="POST" class="formulario-registro">
                <h1>Registro</h1>
                <label for="periodo">Periodo academico</label>
                <select name="periodo_id" id="periodo_id" >
                    <option value="0">Seleccione el Periodo</option>
                <?php
                include("conexion.php");
                $consulta = "SELECT * FROM periodo";
                
                $ejecutar = mysqli_query($conexion, $consulta);
                while($row1 = mysqli_fetch_array($ejecutar)){
                    $periodo_id = $row1['periodo_id'];
                   echo "<option value = '".$periodo_id."'>".$periodo_id."</option>";

                }
                ?>
                </select>  
                <br>
                <label for="nombre_est">Nombre</label>
                <input type="text" name="nombre_est">
                <br>
                
                <label for="apellido_est">Apellido</label>
                <input type="text" name="apellido_est">
                <br>
                <label for="cedula_est">Cédula</label>
                <input type="text" name="cedula_est">
                <br>
                <label for="carrera"> Carrera</label>
                <select name="cod_carrera" id="cod_carrera" >
                    <option value="0">Seleccione la Carrera</option>
                <?php
                include("conexion.php");
                $consulta = "SELECT * FROM carrera";
                
                $ejecutar = mysqli_query($conexion, $consulta);
                while($row = mysqli_fetch_array($ejecutar)){
                    $cod_carrera = $row['cod_carrera'];
                    $carreras =$row['carreras'];
                   echo "<option value = '".$cod_carrera."'>".$cod_carrera." ".$carreras."</option>";

                }
                ?>
                </select>  
                <!-- <br>
                <label for="turno">Turno</label>
                <select name="turno" id="turno" >
                    <optgroup label="Seleccione el turno:">
                    <option value="">Diurno</option>
                    <option value="">Nocturno</option>
                    </optgroup>
                </select>  -->
                <br>
                <input type="submit" value="Registrar" >
            
        </div>
    </main>

</body>
</html>