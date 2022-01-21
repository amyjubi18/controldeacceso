<?php
 
     ModificarDatos($_POST ['id_estudiantes'],$_POST ['periodo_id'], $_POST ['nombre_est'], $_POST ['apellido_est'], $_POST ['cedula_est'], $_POST ['cod_carrera']);

     function ModificarDatos ($id_estudiante, $periodo, $nombre, $apellido, $cedula, $codigo)
     {
        include 'conexion.php';
     $sentencia = "UPDATE estudiantes SET periodo_id='".$periodo."', nombre_est='".$nombre."', apellido_est='".$apellido."', cedula_est='".$cedula."', cod_carrera='".$codigo."' WHERE id_estudiantes='".$id_estudiante."'";
     $conexion->query($sentencia) or die ("Error al actualizar datos".mysqli_error($conexion));

    
     }
?>
 <script type="text/javascript">
        alert("Datos modificados correctamente");
        window.location = "/login_y_registro/modificar.php"
        </script>

