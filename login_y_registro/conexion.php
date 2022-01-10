<?php

$conexion = mysqli_connect("localhost" , "root", "", "controldeacceso");

if($conexion){
echo "conexion"; 
}else{
    echo "no hay conexion";
}
?>

