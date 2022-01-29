<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/estilos/css/login.css">

</head>
<style></style>
<body>
    <main>
    <div class="contenedor-principal">
        <div class="contenedor_1">
            <div class="caja-posterior">
                <p>Inicia sesión para entrar en la pagina</p>
                <button id="boton-inicio-sesion">Iniciar Sesión</button>
            </div>

        </div>
        <div class="contenedor_2">

            <form action="/login_y_registro/login_bd.php" method="POST" class="formulario-login">
                <h2>Iniciar Sesión</h2>
                <input type="text" placeholder="Usuario" name = "usuario">
                <br>
                <input type="password" placeholder="Contraseña" name = "contrasena">
                <br>
                <button>Ingresar</button>
                <!-- <input type="submit" value="Ingresar" class="boton-ingresar"> -->

            </form>            

        </div>
    </div>
    </main>
    <script src="/estilos/js/login.js"></script>
</body>
</html>