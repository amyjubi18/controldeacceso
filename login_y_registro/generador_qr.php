<?php
    require ('C:/Users/Amanda/Desktop/controldeacceso/phpqrcode/qrlib.php');
     $dir = 'temp/';
     if(!file_exists($dir))
     mkdir ($dir);

     $filename = $dir.'test.png';
     $tamanio = 10;
     $level ='L';
     $frameSize =3;
     $contenido ="25565678";

     QRcode::png($contenido, $filename, $level, $tamanio, $frameSize);
    
              echo '<img src= "'.$dir.basename($filename).'"/><hr/>';

?>