<?php

if (!empty($_POST["usuario"]) && !empty($_POST["contrasena"])){
    $usuario = $_POST  ["usuario"];
    $contrasena = $_POST ["contrasena"];
    if($usuario == "admin" && $contrasena == "1234"){
    
        echo '
        <script>
        window.location = "/login_y_registro/index.html";
        </script>
        ';    }else {
        echo '
    <script>
    alert("Usuario o Contraseña incorrecto");
    window.location = "/login_y_registro/login.php";
    </script>
    ';
    }
}else{
    echo '
    <script>
    alert("Campos Vacios");
    window.location = "/login_y_registro/login.php";
    </script>
    ';
}
?>