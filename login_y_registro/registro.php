
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
         <form action="registro_estudiante_bd.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
                <h1>Registro</h1>
                <div class="mb-3">
  <label for="periodo" class="form-label">Periodo academico</label>
                <select class="form-select" name="periodo_id" id="periodo_id" >
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
    <input type="text" class="form-control" id="nombre_est" name="nombre_est">
  </div>
  <div class="mb-3">
    <label for="apellido_est" class="form-label" name="apellido_est" id="apellido_est">Apellido</label>
    <input type="text" class="form-control" id="apellido_est" name="apellido_est">
  </div>
  <div class="mb-3">
    <label for="cedula_est" class="form-label" name="cedula_est" id="cedula_est">Cédula</label>
    <input type="text" class="form-control" id="cedula_est" name="cedula_est">
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
  <button type="submit" class="btn btn-primary" value="Registrar" name="sub">Registar</button>
                
            
                
</form>
        </div>
        
    </main>

</body>
</html>