<?php
$hnombre=$_POST['nombre'];
$hdireccion=$_POST['direccion'];
$hdescripcion=$_POST['descripcion'];
$hprecio=$_POST['precio'];	
$htelefono=$_POST['telefono'];
$hencargado=$_POST['encargado'];
$himage=$_FILES["hotelimage"]["name"];
move_uploaded_file($_FILES["hotelimage"]["tmp_name"],"hotelimages/".$_FILES["hotelimage"]["name"]);

$hservicio=$_POST["servicio"];
$hcaracteristica=$_POST["caracteristica"];
$htipohab=$_POST["tipohab"];
$hidioma=$_POST["idioma"];

echo $hnombre."</br>";
echo $hdireccion."</br>";
echo $hdescripcion."</br>";
echo $hprecio."</br>";
echo $htelefono."</br>";
echo $hencargado."</br>";
$aimage=$_FILES["hotelimage"]["name"];
echo $aimage."</br>";
print_r($hservicio)."</br>";
print_r($hcaracteristica)."</br>";
print_r($htipohab)."</br>";
print_r($hidioma)."</br>";
?>