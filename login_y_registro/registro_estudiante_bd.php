<?php

include 'conexion.php';

// $matricula = "";
// $nombre_est = "";
// $apellido_est = "";
// $cedula_est = "";
// $cod_carrera= "";
// $turno= "";


$periodo_id = $_POST['periodo_id'];
$nombre_est = $_POST['nombre_est'];
$apellido_est = $_POST['apellido_est'];
$cedula_est = $_POST['cedula_est'];
$cod_carrera = $_POST['cod_carrera'];

$query = "INSERT INTO estudiantes (periodo_id, nombre_est, apellido_est, cedula_est, cod_carrera)
VALUES('$periodo_id', '$nombre_est', '$apellido_est', '$cedula_est', '$cod_carrera')";

$ejecutar = mysqli_query($conexion, $query);

if($ejecutar){
    echo '
    <script>
    alert("Estudiante registrado exitosamente");
    window.location = "/login_y_registro/modificar.php";
    </script>
    ';
}else{
    echo '
    <script>
    alert("Estudiante no registrado, intentalo nuevamente");
    window.location = "/login_y_registro/registro.php";
    </script>
    ';
}
 mysqli_close($conexion);
?>