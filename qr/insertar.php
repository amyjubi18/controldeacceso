<?php
include "../login_y_registro/conexion.php";

if(isset($_POST['cedula_est'])){
    $cedula_est = $_POST['cedula_est'];
    $query = "INSERT INTO entradas (cedula_est, fecha_hora) VALUES ('$cedula_est', NOW())";
    $ejecutar = mysqli_query($conexion, $query);
    if($ejecutar){
        echo '
    <script>
    alert("Estudiantes registrado");
    window.location = "/qr/lector_qr.php";
    </script>
    ';
    }else{
        echo '
        <script>
        alert("El estudiante ya marco la entrada");
        window.location = "/qr/lector_qr.php";
        </script>
        ';    }



}
mysqli_close($conexion);
?>