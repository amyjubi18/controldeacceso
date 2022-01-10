<?php
    require ('phpqrcode/qrlib.php');
    if(isset($_POST['generar']))
    {
        if(!empty($_POST['cod']))
        {
            $dir = 'temp/';

            if(!file_exists($dir))
                mkdir ($dir);
            {
                $cod = $_POST['cod'];
                $tam = htmlentities($_POST['tam']);
                $niv = htmlentities($_POST['niv']);
                $filename = $dir.'test.png';
                $marco = 3;

                QRcode::png($cod, $filename, $niv, $tam, $marco);
    
                echo '<img src= "'.$filename.'" align = "left" />';
            }
            
            
            } 
    
    }
    
?>