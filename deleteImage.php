<?php
session_start();

$idUsuario = $_SESSION['idUsuario'];

if ($idUsuario == null) {
	echo '<script>window.location="index.php"</script>';
}


require_once('conexion/conexion.php');
require_once('persistencia/ImagenesLlantas.php');
require_once('pojos/ImagenLlanta.php');
require_once('persistencia/Llantas.php');
require_once('pojos/Llanta.php');

$llantas = Llantas::singletonLlantas();

$imagenes = ImagenesLlantas::singletonImagenesLlantas();

$idImagen = $_GET['id'];
$idLlanta = $_GET['idLlanta'];
$rutaImagen = $_GET['ruta'];

$llantaActual = $llantas->getLlanta($idLlanta);

$imagenesLlantasByCod = $imagenes->getImagenesByCod($llantaActual[0]->getCodImagen());

if(unlink($rutaImagen)){
    $delImagen = $imagenes->deleteImage($idImagen);
    $imagenesLlantasByCod = $imagenes->getImagenesByCod($llantaActual[0]->getCodImagen());
    if($imagenesLlantasByCod == null) {
        $cambiarCodImagen = $llantas->updateCodImagen($idLlanta);
    }
}

header("Location: modificarLlanta.php?id=$idLlanta"); 
 
?>