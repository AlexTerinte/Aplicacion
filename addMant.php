<?php


require('assets/header.php');
require_once('persistencia/Maquinarias.php');
require_once('pojos/Maquinaria.php');
require_once('persistencia/MantenimientoMaquinaria.php');
require_once('pojos/Mantenimiento.php');

if($rolUsuario != 'Programador'){
	echo '<script>window.location="listarLlantas.php"</script>';
}

$maquinarias = Maquinarias::singletonMaquinarias();
$mantenimientos = MantenimientoMaquinaria::singletonMantenimientoMaquinaria();

$idMaquinariass = $_GET['id'];

if (isset($_POST['crearMantenimiento'])) {
    $horasTrabajo = $_POST['horasTrabajo'];
    $fechaFin = $_POST['fechaFinalizacion'];
    $tipoMantenimiento = $_POST['mantenimiento'];
    $frecuencia = $_POST['frecuencia'];
    $coste = $_POST['coste'];
    $observaciones = $_POST['observaciones'];
    $fechaInicio = date('Y-m-d');

    $uploadOk = 1;

    $folderLlanta = "assets/img/mantenimiento/";
    $target_dir = $folderLlanta . basename($_FILES["fotoMantenimiento"]["name"]);

    if (file_exists($target_dir)) {
        $alerta = '<div class="alert">
                    <strong>La imágen ya existe en la base de datos, por favor, cambie el nombre de la imágen y vuelva a intentarlo</strong>
                </div>';
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        $alert = '<div class="alert">
                    <strong>Ha ocurrido un error con la subida de la imágen, inténtelo de nuevo</strong>
                </div>';
    } else {
        if (move_uploaded_file($_FILES["fotoMantenimiento"]["tmp_name"], $target_dir)) {
                $m = new Mantenimiento(0, $idMaquinariass, $idUsuario, $fechaInicio, $horasTrabajo, $tipoMantenimiento, $frecuencia, $coste, $fechaFin, $observaciones, $target_dir);
                $mantenimientoMaquinaria = $mantenimientos->addMantenimiento($m);

                if ($mantenimientoMaquinaria) {
                    echo '<script>window.location="listarMantenimientos.php"</script>';
                } else {
                    $mantenimientoMaquinaria = '<div class="alert">
                            <strong>La actividad no se ha podido añadir, por favor, verifique los datos o consulte con el informático</strong>
                        </div>';
                }
                    }
                }
            }
