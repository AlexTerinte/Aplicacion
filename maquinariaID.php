<?php


require('assets/header.php');

if($idUsuario == null){
    echo '<script>window.location="index.php"</script>';
}

if($rolUsuario != 'Programador'){
	echo '<script>window.location="listarLlantas.php"</script>';
}

require_once('persistencia/Maquinarias.php');
require_once('pojos/Maquinaria.php');

$idMaquinaria = $_GET['id'];
$maquinarias = Maquinarias::singletonMaquinarias();

$maquinariaActual = $maquinarias->getMaquinaria($idMaquinaria);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php echo $maquinariaActual[0]->getEquipo(); ?><br>
    <?php echo $maquinariaActual[0]->getNumeroSerie(); ?><br>
    <?php echo $maquinariaActual[0]->getFechaAdquisicion(); ?><br>
    <?php echo $maquinariaActual[0]->getUbicacion(); ?><br>
    <?php echo $maquinariaActual[0]->getTipoMantenimiento(); ?><br>
    <?php echo $maquinariaActual[0]->getCosteAdquisicion(); ?><br>
    <?php echo $maquinariaActual[0]->getEstado(); ?><br>
    <a href="<?php echo $maquinariaActual[0]->getRutaFoto() ?>" download>Descargar</a>
</body>
</html>