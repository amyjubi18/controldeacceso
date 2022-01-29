<?php

use PHPMailer\PHPMailer\PHPMailer;

include 'conexion.php';
// require ('/phpqrcode/qrlib.php');
$periodo_id = $_POST['periodo_id'];
$nombre_est = $_POST['nombre_est'];
$apellido_est = $_POST['apellido_est'];
$cedula_est = $_POST['cedula_est'];
$cod_carrera = $_POST['cod_carrera'];

// $generar =  QRcode::png($cedula_est,"codigo/qr_".$cedula_est.".png",'L',10,5);
/* $dir= 'codigo/qr_".$cedula_est."';
if(!file_exists($dir))
mkdir ($dir); */
// var_dump($generar);

$query = "INSERT INTO estudiantes (periodo_id, nombre_est, apellido_est, cedula_est, cod_carrera)
VALUES('$periodo_id', '$nombre_est', '$apellido_est', '$cedula_est', '$cod_carrera')";

$verificar_cedula = mysqli_query($conexion, "SELECT * FROM estudiantes WHERE cedula_est='$cedula_est'");

if(mysqli_num_rows($verificar_cedula) > 0){
    echo '
    <script>
    alert("Esta cédula ya esta registrada");
    window.location = "/login_y_registro/registro.php";
    </script>
    ';
    /* $Menssage[] = "Esta cédula ya esta registrada";
    header("refresh:3; registro.php"); */
     exit();
}
$ejecutar = mysqli_query($conexion, $query);

if($ejecutar){
    $file='';
 if(isset($_POST['sub']))
 {
     require "../phpqrcode/qrlib.php";
     $file ="codigo/".$cedula_est."_".$nombre_est."_".$apellido_est.".png";
     QRcode::png($cedula_est,$file,'L',5,5 );
     
 }
 if(isset($_GET['image'])){
     $file_name= $_GET['image'];

if(file_exists($file_name)){
    header('Content-Description: File Transfer');
    header('Content-Type: aplication/image');
    header('Content-Disposition: attachment; filename="'.basename($file_name).'"');
    header('Content-Length:'.filesize($file_name));
    readfile($file_name);
}
 }    
 if(isset($_GET['image'])){
  $file_name= $_GET['image'];
      if(file_exists($file_name)){
          header('Content-Description: File Transfer');
          header('Content-Type: aplication/image');
          header('Content-Disposition: attachment; filename="'.basename($file_name).'"');
          header('Content-Length:'.filesize($file_name));
          readfile($file_name);
      }
  }
  if(!empty($file)){
      ?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro</title>
    <link rel="stylesheet" href="/estilos/css/carnet.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body id="body">
<div class="menu">
        <a href="../login_y_registro/index.html">Inicio</a>
        <a href="../qr/lector_qr.php">Acceso</a>
        <a href="../login_y_registro/registro.php">Registrar</a>
        <a href="../login_y_registro/modificar.php">listado</a>
        <a href="../login_y_registro/login.php" id="cerrar_sesion">Cerrar Sesión</a>
    </div>
<div name="container">
<div class="abs-center">
    <img src="/estilos/img/logo.jpg" alt="" id="logo1">
    <img src="/estilos/img/descarga.png" alt="" id="logo2">
    <div class="mem">
<h6 class="membrete">Universidad Nacional Experimental Politécnica de la Fuerza Armada Nacional</h6>

</div>
<img src="/estilos/img/usuario.png" id="usuario">
<div class="datos">
<h6><b>Periodo: </b><?php echo $periodo_id; ?></h6>
<h6><b>Nombre: </b><?php echo $nombre_est; ?></h6>
  <h6><b>Apellido: </b><?php echo $apellido_est; ?></h6>
  <h6><b>Cédula: </b><?php echo $cedula_est; ?></h6>
  <h6><b>Código de Carrera: </b><?php echo $cod_carrera; ?></h6>
  </div>
  <img src="<?php echo $file;?>" id="qr"><br>
  
  <br>
</div>
</div>
</body>
</html>
<?php
}
    
}else{
    echo '
    <script>
    alert("No se completo el registro. Intentalo nuevamente");
    window.location = "/login_y_registro/registro.php";
    </script>
    ';
}
 mysqli_close($conexion);

 
?>