<?php

use PHPMailer\PHPMailer\PHPMailer;

include 'conexion.php';
require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';
require '../vendor/phpmailer/phpmailer/src/Exception.php';
require ('/phpqrcode/qrlib.php');
$periodo_id = $_POST['periodo_id'];
$nombre_est = $_POST['nombre_est'];
$apellido_est = $_POST['apellido_est'];
$cedula_est = $_POST['cedula_est'];
$correo_est = $_POST['correo_est'];
$cod_carrera = $_POST['cod_carrera'];
// $generar =  QRcode::png($cedula_est,"codigo/qr_".$cedula_est.".png",'L',10,5);
/* $dir= 'codigo/qr_".$cedula_est."';
if(!file_exists($dir))
mkdir ($dir); */
// var_dump($generar);

$query = "INSERT INTO estudiantes (periodo_id, nombre_est, apellido_est, cedula_est, correo_est, cod_carrera)
VALUES('$periodo_id', '$nombre_est', '$apellido_est', '$cedula_est', '$correo_est', '$cod_carrera')";

$ejecutar = mysqli_query($conexion, $query);

if($ejecutar){
    $file='';
 if(isset($_POST['sub']))
 {
     $mail = new PHPMailer(true);
     $file ="codigo/".$cedula_est."_".$nombre_est."_".$apellido_est.".png";
     QRcode::png($cedula_est,$file,'L',10,5 );
     /* try {
         $mail->SMTPDebug= 0;
         $mail->isSMTP();
         $mail->Host= 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'amygarcia9618@gmail.com';
        $mail->Password = 'AMY181296$%&';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        $mail->setFrom($correo_est);
        $mail->addAddress($correo_est, $nombre_est, $apellido_est);
        $mail->isHTML(true);
        $mail->Subject= 'Verificación de Email';
        $mail->Body = '<p> Carnet</p>';
        $mail->send();

     } */
 }
 if(isset($_GET['image'])){
     $file_name= $_GET['image'];
     $mostrar_nombre= $_GET['nombre_est'];
     $mostrar_apellido =$_GET['apellido_est'];
     $mostrar_cedula= $_GET['cedula_est'];
     $mostrar_carrera= $_GET['cod_carrera'];

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
<div name="registrado">
  <h1>Registro exitoso</h1>
  <h4>Nombre: <?php echo $nombre_est; ?></h4>
  <h4>Apellido: <?php echo $apellido_est; ?></h4>
  <h4>Cedula: <?php echo $cedula_est; ?></h4>
  <h4>Carrera: <?php echo $cod_carrera; ?></h4>


  <img src="<?php echo $file;?>">
  <br>
  <a href="generar_carnet.php" class="btn btn-success">Imprimir Carnet</a>

</div>
<?php
}
    
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