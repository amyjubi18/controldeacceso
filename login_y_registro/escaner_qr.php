<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
    <!-- <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script> -->
    <script type="text/javascript" src="instascan.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <title>Escaner QR</title>
</head>
<body>
    <div class="contenedor">
        <div class ="row">
    <h4 class="text-center text-dark">Escaner QR </h4>
    <hr>
    <div class="col-md-6">
    
            <video id="preview" width="100%"></video>
            </div>
    <div class="col-md-6">
        <label>Qr</label>
        <br>
        <input type="text" name="text" id="text" readonly="" class="form-control">
        </div>
        </div>
    </div>
   <script type="text/javascript">
       navigator.mediaDevices.getUserMedia({ audio: false, video: true}).then((stream)=>{
           console.log(stream);
           let video = document.getElementById('video');
           video.srcObject = stream;
           video.onloadedmetadata = (ev) => video.play();
       }).catch((error)=>console.log(error));
      
    </script>
</body>
</html>