<?php

include 'conexion.php';
require ('C:/Users/Amanda/Desktop/controldeacceso/phpqrcode/qrlib.php');
$periodo_id = $_POST['periodo_id'];
$nombre_est = $_POST['nombre_est'];
$apellido_est = $_POST['apellido_est'];
$cedula_est = $_POST['cedula_est'];
$cod_carrera = $_POST['cod_carrera'];
$generar =  QRcode::png($cedula_est,"codigo/qr_".$cedula_est.".png",'L',10,5);
// var_dump($generar);

// $qr = addslashes(file_get_contents($_POST[$generar]['tmp_name']));
// $ruta = "temp/qr_".$cedula_est.".png";



$query = "INSERT INTO estudiantes (periodo_id, nombre_est, apellido_est, cedula_est, cod_carrera, qr)
VALUES('$periodo_id', '$nombre_est', '$apellido_est', '$cedula_est', '$cod_carrera', 'var_dump($generar)')";

$ejecutar = mysqli_query($conexion, $query);



if($ejecutar){
   echo '
    <script>
    alert("Estudiante registrado exitosamente");
    window.location = "/login_y_registro/modificar.php"
    </script>
    ';
     
    // echo '<img src= "'.$gen.basename($ruta).'"/>';
    
}else{
    echo '
    <script>
    alert("Estudiante no registrado, intentalo nuevamente");
    window.location = "/login_y_registro/registro.php";
    </script>
    ';
}
 mysqli_close($conexion);

 /*------------------------------------------------------------------------------------------*/

/* Procura no usar variables intermedias, usa siempre las originales */
/* $sql = "INSERT INTO estudiantes (periodo_id, nombre_est, apellido_est, cedula_est, cod_carrera, qr)
VALUES('$periodo_id', '$nombre_est', '$apellido_est', '$cedula_est', '$cod_carrera', '$qr')";

$resultado = $mysqli->query($sql);
if ($resultado === false) {
  die(htmlspecialchars('Error en inserción: '. $mysqli->error));
}
$id_insert = $mysqli->insert_id;

if ($_FILES["archivo1"]["error"] > 0) {
  echo "Error al cargar archivo"; 
} else {
  $permitidos = array(
    "image/gif",
    "image/png",
    "application/pdf"
  );
  $limite_kb = 800;

  /* La comprobación de tamaño es innecesaria(*) */
  /* if (in_array($_FILES["archivo1"]["type"], $permitidos)
    && $_FILES["archivo1"]["size"] <= $limite_kb * 1024
  ) {
    $ruta = '/codigo'. $id_insert .'/';
    $archivo = $ruta . $_FILES["archivo1"]["name"];
    if (!file_exists($ruta)) {
      mkdir($ruta);
    }
    if (!file_exists($archivo)) {
      $resultado = @move_uploaded_file(
        $_FILES["archivo1"]["tmp_name"],
        $archivo
      ); */
      /* Si se copió correctamente actualizaremos en la base de datos la ruta */
      /* if ($resultado !== false) {
        $sql = "UPDATE estudiantes SET 'codigo/qr_".$cedula_est.".png"' = '". mysqli::real_escape_string.($archivo) ."' WHERE id = '". mysqli::real_escape_string.($id_insert) ."'";
        $resultado = $mysqli->query($sql);
        if ($resultado === false) {
          die(htmlspecialchars('Error en actualización: '. $mysqli->error));
        }
      } else {
        echo "Error al guardar archivo";
      }
    } else {
      echo "Archivo ya existe";
    }
  } else {
    echo "Archivo no permitido o excede el tamaño";
  }
} */ 
/*----------------------------------------------------------------------------------*/
/* if(isset($_POST["submit"])){
    $revisar = getimagesize($_FILES["image"]["tmp_name"]);
    if($revisar !== false){
        $periodo_id = $_POST['periodo_id'];
        $nombre_est = $_POST['nombre_est'];
        $apellido_est = $_POST['apellido_est'];
        $cedula_est = $_POST['cedula_est'];
        $cod_carrera = $_POST['cod_carrera'];
        $generar =  QRcode::png($cedula_est,"codigo/qr_".$cedula_est.".png",'L',10,5);
        $image = $_FILES['image']['tmp_name'];
        $imgContenido = addslashes(file_get_contents($image));
        
        //Credenciales Mysql
        $Host = 'localhost';
        $Username = 'root';
        $Password = '';
        $dbName = 'controldeacceso';
        
        //Crear conexion con la abse de datos
        $db = new mysqli($Host, $Username, $Password, $dbName);
        
        // Cerciorar la conexion
        if($db->connect_error){
            die("Connection failed: " . $db->connect_error);
        }
        
        
        //Insertar imagen en la base de datos
        $insertar = $db->query("INSERT into estudiantes (periodo_id, nombre_est, apellido_est, cedula_est, cod_carrera, qr)
        VALUES('$periodo_id', '$nombre_est', '$apellido_est', '$cedula_est', '$cod_carrera', '$image')");
        // COndicional para verificar la subida del fichero
        if($insertar){
            echo "Archivo Subido Correctamente.";
        }else{
            echo "Ha fallado la subida, reintente nuevamente.";
        } 
        // Sie el usuario no selecciona ninguna imagen
    }else{
        echo "Por favor seleccione imagen a subir.";
    }
} */
?>