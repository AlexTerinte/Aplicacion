<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php

require('assets/header.php');
require_once('persistencia/Maquinarias.php');
require_once('pojos/Maquinaria.php');

$idMaquinaria = $_GET['id'];
$maquinarias = Maquinarias::singletonMaquinarias();

$maquinariaActual = $maquinarias->getMaquinaria($idMaquinaria);


/* 	$m = new Maquinaria($idMaquinaria, $idUs, $equipo, $numeroSerie, $fechaAdquisicion, $ubicacion, $tipoMantenimiento, $costeAdquisicion, $estado, $fotoMaquinaria);


	$maquinaria = $maquinarias->updateMaquinaria($m);


	if ($maquinaria) {
		echo '<script>window.location="listarMaquinarias.php"</script>';
	} else {
		$alert = '<div class="alert">
<strong>La actividad no se ha podido modificar, por favor, verifique los datos o consulte con el informático</strong>
</div>';
	} */

/* $uploadOk = 1;

    $folderLlanta = "assets/img/llantas/";
    $target_dir = $folderLlanta . basename($_FILES["fotoLlanta"]["name"]);

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
        if (move_uploaded_file($_FILES["fotoLlanta"]["tmp_name"], $target_dir)) { */


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
					Modificar Llanta
				</div>
				<div class="full-width panel-content">
					<form action="modificarPrueba.php?id=<?php echo $idMaquinaria ?> method="post" enctype="multipart/form-data">
						<h5 class="text-condensedLight">Datos de la maquinaria</h5>
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							<input class="mdl-textfield__input" type="text" id="equipo" name="equipo" value="<?php echo $maquinariaActual[0]->getEquipo(); ?>">
							<label class="mdl-textfield__label" for="equipo">Nombre maquinaria</label>
							<span class="mdl-textfield__error">Matrícula inválida</span>
						</div>
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							<input class="mdl-textfield__input" type="text" id="numeroSerie" name="numeroSerie" value="<?php echo $maquinariaActual[0]->getNumeroSerie(); ?>">
							<label class="mdl-textfield__label" for="numeroSerie">Número de serie</label>
							<span class="mdl-textfield__error">Matrícula inválida</span>
						</div>
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							<input class="mdl-textfield__input" type="date" id="fechaAdquisicion" name="fechaAdquisicion" value="<?php echo $maquinariaActual[0]->getFechaAdquisicion(); ?>">
							<label class="mdl-textfield__label" for="fechaAdquisicion">Fecha de adquisición</label>
							<span class="mdl-textfield__error">Invalid name</span>
						</div>
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							<input class="mdl-textfield__input" type="text" id="ubicacion" name="ubicacion" value="<?php echo $maquinariaActual[0]->getUbicacion(); ?>">
							<label class="mdl-textfield__label" for="ubicacion">Ubicación</label>
							<span class="mdl-textfield__error">Invalid address</span>
						</div>
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							<input class="mdl-textfield__input" type="text" id="tipoMantenimiento" name="tipoMantenimiento" value="<?php echo $maquinariaActual[0]->getTipoMantenimiento(); ?>">
							<label class="mdl-textfield__label" for="tipoMantenimiento">Tipo de mantenimiento</label>
							<span class="mdl-textfield__error">Invalid coin</span>
						</div>
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							<input class="mdl-textfield__input" type="number" step="0.01" id="costeAdquisicion" name="costeAdquisicion" value="<?php echo $maquinariaActual[0]->getCosteAdquisicion(); ?>">
							<label class="mdl-textfield__label" for="costeAdquisicion">Coste de la maquinaria</label>
							<span class="mdl-textfield__error">Invalid E-mail</span>
						</div>
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							<input class="mdl-textfield__input" type="text" id="estado" name="estado" value="<?php echo $maquinariaActual[0]->getEstado(); ?>">
							<label class="mdl-textfield__label" for="estado">Estado de la maquinaria</label>
							<span class="mdl-textfield__error">Invalid coin</span>
						</div>
						<!-- 						<div class="custom-input-file col-md-6 col-sm-6 col-xs-6">
							<input type="file" name="fotoLlanta" accept="image/png, image/jpeg, image/jpg" class="input-file" value="">
							Subir foto
						</div> -->
						<p class="text-center">
							<button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" id="btn-modificar" name="modificar">
								<i class="zmdi zmdi-plus"></i>
							</button>
						<div class="mdl-tooltip" for="btn-addCompany">Modificar</div>
						</p>
					</form>
				</div>
			</div>
			<?php echo ($alert); ?>
		</div>

	</div>
</section>

</body>

<script>
	<?php if (isset($_POST['modificar'])) { ?>
		Swal.fire({
			title: 'Do you want to save the changes?',
			showDenyButton: true,
			showCancelButton: true,
			confirmButtonText: 'Save',
			denyButtonText: `Don't save`,
		}).then((result) => {
			/* Read more about isConfirmed, isDenied below */
			if (result.isConfirmed) {
				<?php 
					$equipo =  $_POST['equipo'];
					$numeroSerie =  $_POST['numeroSerie'];
					$fechaAdquisicion = $_POST['fechaAdquisicion'];
					$ubicacion =  $_POST['ubicacion'];
					$costeAdquisicion =  $_POST['costeAdquisicion'];
					$tipoMantenimiento = $_POST['tipoMantenimiento'];
					$estado =  $_POST['estado'];

					if ($fechaFin != null) {
						$fechaFin = $_POST['fechaFin'];
					} else {
						$fechaFin = null;
					}
				
					if (empty($observaciones)) {
						$observaciones = null;
					} else {
						$observaciones = $_POST['observaciones'];
					}
				
					$m = new Maquinaria($idMaquinaria, $idUs, $equipo, $numeroSerie, $fechaAdquisicion, $ubicacion, $tipoMantenimiento, $costeAdquisicion, $estado, $fotoMaquinaria);
				
				
					$maquinaria = $maquinarias->updateMaquinaria($m);
				
				
					if ($maquinaria) {
						echo '<script>window.location="listarMaquinarias.php"</script>';
					} else {
						$alert = '<div class="alert">
				<strong>La actividad no se ha podido modificar, por favor, verifique los datos o consulte con el informático</strong>
				</div>';
					}
				?>
				location.reload();
			} else if (result.isDenied) {
				Swal.fire('Changes are not saved', '', 'info')
			}
		})
	<?php } ?>
</script>

</html>