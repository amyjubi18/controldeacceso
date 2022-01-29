
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro</title>
    <link rel="stylesheet" href="/estilos/css/registro.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body id="body">
    <div class="menu">
        <a href="../login_y_registro/index.html">Inicio</a>
        <a href="../qr/lector_qr.php">Acceso</a>
        <a href="../login_y_registro/registro.php">Registrar</a>
        <a href="../login_y_registro/modificar.php">Listado</a>
        <a href="../login_y_registro/login.php" id="cerrar_sesion">Cerrar Sesión</a>
    </div>
    <main>
        <div class="container">
            <div class="abs-center">
         <form action="registro_estudiante_bd.php" method="POST" class="border p-3 form" enctype="multipart/form-data">
                <h1>Registro</h1>
                <div class="mb-3">
  <label for="periodo" class="form-label">Periodo academico</label>
                <select class="form-select" name="periodo_id" id="periodo_id" required>
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
            </div>
            <div class="mb-3">
    <label for="nombre_est" class="form-label" name="nombre_est" id="nombre_est">Nombre</label>
    <input type="text" class="form-control" id="nombre_est" name="nombre_est" required>
  </div>
  <div class="mb-3">
    <label for="apellido_est" class="form-label" name="apellido_est" id="apellido_est">Apellido</label>
    <input type="text" class="form-control" id="apellido_est" name="apellido_est" required>
  </div>
  <div class="mb-3">
    <label for="cedula_est" class="form-label" name="cedula_est" id="cedula_est">Cédula</label>
    <input type="text" class="form-control" id="cedula_est" name="cedula_est" required minlength="6" maxlength="8">
  </div>
            <div class="mb-3">

            <label for="carrera" class="form-label"> Carrera</label>
                <select class="form-select" name="cod_carrera" id="cod_carrera" >
                    <option value="0">Seleccione la Carrera</option>
                <?php
                include("conexion.php");
                $consulta = "SELECT * FROM carrera";
                
                $ejecutar = mysqli_query($conexion, $consulta);
                while($row = mysqli_fetch_array($ejecutar)){
                    $cod_carrera = $row['cod_carrera'];
                    $carreras =$row['carreras'];
                   echo "<option value = '".$cod_carrera."' >".$cod_carrera." ".$carreras."</option>";

                }
                ?>
                </select>  
            </div>
            <br>
            <div class="container-fluid h-100">
            <div class="row w-100 align-items-center">
                <br>
  <button type="submit" class="btn btn-primary regular-button" value="Registrar" name="sub" id="sub" onclick="registrar()">Registar</button>

</div>          
            </div>
         <br>       
</form>
        </div>
        </div>
        <br>
    </main>

</body>
</html>