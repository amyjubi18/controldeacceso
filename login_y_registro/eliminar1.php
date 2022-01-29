

    <?php
    include 'conexion.php';
    EliminarEstudiante($_GET['id_estudiantes']);
function EliminarEstudiante($id_estudiantes){
    include 'conexion.php';
$sentencia = "DELETE FROM estudiantes WHERE id_estudiantes ='".$id_estudiantes."' ";
$conexion->query($sentencia) or die ("Error al eliminar".mysqli_error($conexion));

}

?>
<script>
    alert("Datos eliminados correctamente");
    window.location = "/login_y_registro/modificar.php"
    </script>