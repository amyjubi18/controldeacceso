
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>QR</title>
</head>
<body>
<div class="menu">
        <a href="../login_y_registro/index.html">Inicio</a>
        <a href="../qr/lector_qr.php">Acceso</a>
        <a href="../login_y_registro/registro.php">Registrar</a>
        <a href="../login_y_registro/modificar.php">Modificar</a>
        <a href="../login_y_registro/eliminar.php">Eliminar</a>
    </div>
    <div class="contenedor">
    <h1>CONTROL DE ACCCESO DE ESTUDIANTES</h1>
            <br>
        <div class="row">
            <br>
           
            <div class="col-md-6">
                <video id="vista" width="80%" style="margin-left: 50px;"></video>
                
            </div>
            <div class="col-md-6">
                <form action="insertar.php" method="POST" class="form-horizontal">
                <label> LECTOR DE CÓDIGO QR</label>
                <input type="text" name="cedula_est" id="cedula_est" readonly="true" placeholder="Datos del QR" class="form-control">
                </form>
                <br>
                <table class="table table-bordered">
                <thead>
                    <tr>
                        <td><b>CÉDULA DE ESTUDIANTES</b></td>
                        <td><b>FECHA Y HORA DE ENTRADA</b></td>
                    </tr>
                </thead>
                <tbody>
                    <?php

                        include ("../login_y_registro/conexion.php");
                        $query = "SELECT cedula_est, fecha_hora FROM entrada WHERE DATE(fecha_hora)=CURDATE()";
                        $ejecutar = mysqli_query($conexion, $query);
                        while($row = mysqli_fetch_assoc($ejecutar)){   
                    ?>
                        <tr>
                            <td><?php echo $row['cedula_est']; ?></td>
                            <td><?php echo $row['fecha_hora']; ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        let scanner = new Instascan.Scanner({ video: document.getElementById('vista')}); 
        Instascan.Camera.getCameras().then(function(cameras) {

            if(cameras.length > 0) {
                scanner.start(cameras[0]);
            } else {
                alert('La camara no esta funcionando');
            }
        }).catch(function(e) {
            console.error(e);
        });

        scanner.addListener('scan', function(c) {
            document.getElementById('cedula_est').value=c;
            document.forms[0].submit();
        });

    </script>
</body>
</html>