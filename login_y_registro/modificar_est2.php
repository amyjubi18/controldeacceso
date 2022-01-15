<?php
 
     ModificarDatos($_POST ['id_estudiantes'],$_POST ['periodo_id'], $_POST ['nombre_est'], $_POST ['apellido_est'], $_POST ['cedula_est'], $_POST ['cod_carrera']);

     function ModificarDatos ($id_estudiantes, $periodo, $nombre, $apellido, $cedula, $codigo)
     {
        include 'conexion.php';
     $sentencia = "UPDATE estudiantes SET periodo_id='".$periodo."', nombre_est='".$nombre."', apellido_est='".$apellido."', cedula_est='".$cedula."', cod_carrera='".$codigo."' WHERE id_estudiantes='".$id_estudiantes."'";
     $resultado=  mysqli_query($conexion, $sentencia) or die (mysqli_error($conexion));

    
     }if ($resultado){
        echo '
        <script>
        alert("Datos modificados correctamente");
        window.location = "controldeacceso-1/login_y_registro/modificar.php"
        </script>
        ';
    }else{
        echo '
        <script>
        alert("error en modificacion");
        window.location = "controldeacceso-1/login_y_registro/modificar.php"
        </script>
        ';
    }
?>

