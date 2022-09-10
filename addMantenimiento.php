<?php

if($rolUsuario != 'Programador'){
	echo '<script>window.location="listarLlantas.php"</script>';
}
require('assets/header.php');
require_once('persistencia/Maquinarias.php');
require_once('pojos/Maquinaria.php');
require_once('persistencia/MantenimientoMaquinaria.php');
require_once('pojos/Mantenimiento.php');

$tMaquinarias = Maquinarias::singletonMaquinarias();
$tMantenimiento = MantenimientoMaquinaria::singletonMantenimientoMaquinaria();

$nomEquipo = $tMaquinarias->getNomMaquinaria();

$mantenimiento = $tMantenimiento->getMantenimientoTodos();

$fechaActual = date('Y-m-d');

if (isset($_POST['enviar'])) {
	$idMaquinaria = $_POST['idMaquinaria'];
    $horasTrabajo = $_POST['horasTrabajo'];
    $coste = $_POST['costeMantenimiento'];
    $fechaFinalizacion = $_POST['fechaFinalizacion'];
    $tipoMantenimiento = $_POST['tipoMantenimiento'];

	echo $idMaquinaria;

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
            /* $m = new Mantenimiento(0, $idMaquinaria, $idUsuario, $fechaActual, $horasTrabajo, $tipoMantenimiento, $coste, $fechaFinalizacion, $target_dir); */
            $mantenimientoMaquinaria = $tMantenimiento->addMantenimiento($m);

            if ($mantenimientoMaquinaria) {
                $alert = '<div class="succ">
                    <strong>¡La actividad se ha añadido correctamente!</strong>
                </div>';
            } else {
                $mantenimientoMaquinaria = '<div class="alert">
                    <strong>La actividad no se ha podido añadir, por favor, verifique los datos o consulte con el informático</strong>
                </div>';
            }
        }
    }

}

?>
<section class="full-width pageContent">
	<section class="full-width header-well">
		<div class="full-width header-well-icon">
			<i class="zmdi zmdi-balance"></i>
		</div>
		<div class="full-width header-well-text">
			<p class="text-condensedLight">
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde aut nulla accusantium minus corporis accusamus fuga harum natus molestias necessitatibus.
			</p>
		</div>
	</section>
	<div class="full-width divider-menu-h"></div>
	<div class="mdl-grid">
		<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset-desktop">
			<div class="full-width panel mdl-shadow--2dp">
				<div class="full-width panel-tittle bg-primary text-center tittles">
					Nuevo Mantenimiento
				</div>
				<div class="full-width panel-content">
					<form action="addMantenimiento.php" method="post" enctype="multipart/form-data">
						<h5 class="text-condensedLight">Datos de la maquinaria</h5>
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							<select class="mdl-textfield__input" name="idMaquinaria" id="idMaquinaria">
							<?php foreach ($nomEquipo as $particulares => $clientes) { ?>
                                <option value="<?php echo $clientes[0]; ?>"><?php echo $clientes[1] ?> - <?php echo $clientes[2]; ?></option>
                            <?php } ?>
							</select>
							<label class="mdl-textfield__label" for="idMaquinaria">Maquinaria</label>
							<span class="mdl-textfield__error">Dato no válido</span>
						</div>
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							<input class="mdl-textfield__input" type="date" id="fechaInicio" name="fechaInicio" disabled value="<?php echo $fechaActual; ?>">
							<span class="mdl-textfield__error">Dato no válido</span>
						</div>
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							<input class="mdl-textfield__input" type="number" step="0.1" id="horasTrabajo" name="horasTrabajo">
							<label class="mdl-textfield__label" for="horasTrabajo">Horas de trabajo</label>
							<span class="mdl-textfield__error">Dato no válido</span>
						</div>
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							<select class="mdl-textfield__input" name="tipoMantenimiento" id="tipoMantenimiento">
								<option value="Preventivo">Mantenimiento preventivo</option>
								<option value="Correctivo">Mantenimiento correctivo</option>
							</select>
							<label class="mdl-textfield__label" for="tipoMantenimiento">Tipo de mantenimiento</label>
							<span class="mdl-textfield__error">Dato no válido</span>
						</div>
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							<input class="mdl-textfield__input" type="number" step="0.01" id="costeMantenimiento" name="costeMantenimiento">
							<label class="mdl-textfield__label" for="costeMantenimiento">Coste de mantenimiento</label>
							<span class="mdl-textfield__error">Dato no válido</span>
						</div>
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							<input class="mdl-textfield__input" type="date" id="fechaFinalizacion" placeholder="Fecha de finalización" name="fechaFinalizacion">
							<label class="mdl-textfield__label" for="fechaEntrada">Fecha de finalización</label>
							<span class="mdl-textfield__error">Dato no válido</span>
						</div>
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							<textarea id="observaciones" class="mdl-textfield__input" name="observaciones" rows="4" cols="50"></textarea>
							<label class="mdl-textfield__label" for="observaciones">Observaciones</label>
							<span class="mdl-textfield__error">Dato no válido</span>
						</div>
				
						<div class="custom-input-file col-md-6 col-sm-6 col-xs-6">
							<input type="file" name="fotoMantenimiento" accept="image/png, image/jpeg, image/jpg" class="input-file" value="">
							Subir foto
						</div>
						<p class="text-center">
							<button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" id="btn-addCompany" name="enviar">
								<i class="zmdi zmdi-plus"></i>
							</button>
						<div class="mdl-tooltip" for="btn-addCompany">Añadir</div>
						</p>
					</form>
				</div>
			</div>
			<?php echo ($alert); ?>
		</div>

	</div>
</section>

</body>

</html>