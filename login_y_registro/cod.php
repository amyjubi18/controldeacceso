<?php
 include "c:/Users/Amanda/Desktop/controldeacceso/phpqrcode/qrlib.php";
 
 $file='';
 if(isset($_POST['sub']))
 {
     $text = $_POST['text'];
     $file ="codigo/".uniqid().".png";
     QRcode::png($text, $file);
 }
 if(isset($_GET['image'])){
     $file_name= $_GET['image'];
if(file_exists($file_name)){
    header('Content-Description: File Transfer');
    header('Content-Type: aplication/image');
    header('Content-Disposition: attachment; filename="'.basename($file_name).'"');
    header('Content-Length:'.filesize($file_name));
    readfile($file_name);
}
 }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Document</title>
</head>
<div>
<form method="POST" class="form-horizontal" enctype="multipart/form-data" autocomplete="off">
<div class="form-group">
    <label>Text:</label>
    <input type="text" name="text" class="form-control" required="required">

</div>
<div class="text-center">
<input type="submit" value="Generar" name="sub" class="btn btn-primary">
</div>

</form>
</div>

<?php
        if(isset($_GET['image'])){
        $file_name= $_GET['image'];
            if(file_exists($file_name)){
                header('Content-Description: File Transfer');
                header('Content-Type: aplication/image');
                header('Content-Disposition: attachment; filename="'.basename($file_name).'"');
                header('Content-Length:'.filesize($file_name));
                readfile($file_name);
            }
        }
        if(!empty($file)){
            ?>
       
        <img src="<?php echo $file;?>" class="img-responsive">
        <a href="cod.php?image=<?php echo $file?>" class="btn btn-success">Descargar</a>
   <?php
    }
        ?>
<body>
    
</body>
</html>

