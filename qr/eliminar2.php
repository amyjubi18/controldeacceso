

    <?php
   

$cnx = mysqli_connect("localhost", "root", "", "controldeacceso");
$sql = "DELETE FROM entradas WHERE id_entrada";
$rta = mysqli_query($cnx, $sql);
if ($rta){
    echo '
    <script>
    alert("Datos eliminados correctamente");
    window.location = "/qr/lector_qr.php"
    </script>
    ';
}else{
    echo '
    <script>
    alert("error en modificacion");
    window.location = "/qr/lector_qr.php"
    </script>
    ';
}

?>