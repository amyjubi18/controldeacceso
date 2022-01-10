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
// $turno = $_POST['turno'];

// $campos = array();
// if($matricula == ""){
//     array_push($campos, "El campo matricula no puede estar vacio");
// }
// if($nombre_est == ""){
//     array_push($campos, "El campo nombre no puede estar vacio");
// }
// if($apellido_est == ""){
//     array_push($campos, "El campo apellido no puede estar vacio");
// }
// if($cedula_est == "" ){
//     array_push($campos, "El campo cédula no puede estar vacio");
// }

// $query = "INSERT INTO estudiantes (matricula, nombre_est, apellido_est, cedula_est, turno) 
//   VALUES(null , '$matricula', '$nombre_est', '$apellido_est', '$cedula_est' , '$turno')";

    
//   $ejecutar = mysqli_query($conexion, $query);

// if(count($campos) > 0){

//     echo '
//     <script>
//     alert("Los campos no pueden estar vacios");
//     window.location = "/login_y_registro/registro.php";
//     </script>
//     ';    
//     for($i=0; $i<count($campos); $i++){
//         echo"<li>".$campos[$i]."</li>";
//     }
// }else{
//     echo '
//     <script>
//      alert("Estudiante registrado exitosamente");
//     window.location = "/login_y_registro/modificar.php";
//     </script>
//      ';}
  

// }
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