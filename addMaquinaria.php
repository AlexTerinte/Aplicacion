<?php

require('assets/header.php');
require_once('persistencia/Maquinarias.php');
require_once('pojos/Maquinaria.php');

if($rolUsuario != 'Programador'){
	echo '<script>window.location="listarLlantas.php"</script>';
}

$tMaquinarias = Maquinarias::singletonMaquinarias();
$fechaActual = date('Y-m-d');

if (isset($_POST['enviar'])) {
	$equipo = $_POST['equipo'];
	$numeroSerie = $_POST['numeroSerie'];
	$fechaAdquisicion = $_POST['fechaAdquisicion'];
	$ubicacion = $_POST['ubicacion'];
	$tipoMantenimiento = $_POST['tipoMantenimiento'];
	$costeAdquisicion = $_POST['costeAdquisicion'];
	$estado = $_POST['estado'];
	$observaciones = $_POST['observaciones'];

	$uploadOk = 1;

	$folderMaquinaria = "assets/img/maquinaria/";
	$target_dir = $folderMaquinaria . basename($_FILES["fotoMaquinaria"]["name"]);

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
		if (move_uploaded_file($_FILES["fotoMaquinaria"]["tmp_name"], $target_dir)) {
			$m = new Maquinaria(0, $idUsuario, $equipo, $numeroSerie, $fechaAdquisicion, $ubicacion, $tipoMantenimiento, $costeAdquisicion, $estado, $observaciones, $target_dir);
			$maquinaria = $tMaquinarias->addMaquinaria($m);


			if ($maquinaria) {
				$alert = '<div class="succ">
                    <strong>¡La actividad se ha añadido correctamente!</strong>
                </div>';
			} else {
				$alert = '<div class="alert">
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
					Nueva Maquinaria
				</div>
				<div class="full-width panel-content">
					<form action="addMaquinaria.php" method="post" enctype="multipart/form-data">
						<h5 class="text-condensedLight">Datos de la maquinaria</h5>
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							<input class="mdl-textfield__input" type="text" id="equipo" name="equipo">
							<label class="mdl-textfield__label" for="equipo">Equipo</label>
							<span class="mdl-textfield__error">Dato no válido</span>
						</div>
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							<input class="mdl-textfield__input" type="text" id="numeroSerie" name="numeroSerie">
							<label class="mdl-textfield__label" for="numeroSerie">Número de serie</label>
							<span class="mdl-textfield__error">Dato no válido</span>
						</div>
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							<input class="mdl-textfield__input" type="date" id="fechaAdquisicion" placeholder="Fecha de adquisición" name="fechaAdquisicion">
							<label class="mdl-textfield__label" for="fechaEntrada">Fecha de adquisición</label>
							<span class="mdl-textfield__error">Dato no válido</span>
						</div>
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							<input class="mdl-textfield__input" type="text" id="ubicacion" name="ubicacion">
							<label class="mdl-textfield__label" for="Ubicación">Ubicación</label>
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
							<input class="mdl-textfield__input" type="number" id="costeAdquisicion" step="0.01" name="costeAdquisicion">
							<label class="mdl-textfield__label" for="costeAdquisicion">Coste de adquisición</label>
							<span class="mdl-textfield__error">Dato no válido</span>
						</div>
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							<input class="mdl-textfield__input" type="text" id="estado" name="estado">
							<label class="mdl-textfield__label" for="estado">Estado de la maquinaria</label>
							<span class="mdl-textfield__error">Dato no válido</span>
						</div>
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							<textarea id="observaciones" class="mdl-textfield__input" name="observaciones" rows="4" cols="50"></textarea>
							<label class="mdl-textfield__label" for="observaciones">Observaciones</label>
						</div>

						<div class="custom-input-file col-md-6 col-sm-6 col-xs-6">
							<input type="file" name="fotoMaquinaria" accept="image/png, image/jpeg, image/jpg" class="input-file" value="">
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