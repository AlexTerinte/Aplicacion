<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.min.css" crossorigin="anonymous">

<link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />

<script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/js/plugins/piexif.min.js" type="text/javascript"></script>

<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/js/plugins/sortable.min.js" type="text/javascript"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/js/fileinput.js"></script>

<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/js/locales/es.js"></script>

<?php
error_reporting(E_ALL ^ E_NOTICE);

require('assets/header.php');
require_once('persistencia/Llantas.php');
require_once('pojos/Llanta.php');
require_once('persistencia/ImagenesLlantas.php');
require_once('pojos/ImagenLlanta.php');

$idLlanta = $_GET['id'];
$llantas = Llantas::singletonLlantas();
$imagenes = ImagenesLlantas::singletonImagenesLlantas();

$llantaActual = $llantas->getLlanta($idLlanta);

if (isset($_POST['modificar'])) {
	$idLlantaa = $llantaActual[0]->getId();
	$matricula =  $_POST['matricula'];
	$fechaActual = $_POST['fechaInicio'];
	$horaInicio = $_POST['horaInicio'];
	$empresa =  $_POST['empresa'];
	$unidades = $_POST['unidades'];
	$precio = $_POST['precio'];
	$operacion = $_POST['operacion'];
	$tipoVehiculo = $_POST['tipoVehiculo'];
	$tipoDmg = $_POST['tipoDmg'];
	$estado = $_POST['estado'];
	$transporteExterno = $_POST['transporteExterno'];
	$nombreTransportista = $_POST['transportista'];
	$proveniencia = $_POST['proveniencia'];
	$importeTotal = $_POST['importeTotal'];
	$observaciones = $_POST['observaciones'];
	$fechaFin = $_POST['fechaFin'];
	$horaFin = $_POST['horaFin'];
	$facturado = $_POST['facturado'];
	$idUsuario = $llantaActual[0]->getIdUsuario();

	if ($matricula != null) {
		$matricula = $_POST['matricula'];
	} else {
		$matricula = $llantaActual[0]->getMatricula();
	}

	if ($fechaActual != null) {
		$fechaActual = $_POST['fechaInicio'];
	} else {
		$fechaActual = $llantaActual[0]->getFechaInicio();
	}

	if ($horaInicio != null) {
		$horaInicio = $_POST['horaInicio'];
	} else {
		$horaInicio = $llantaActual[0]->getHoraInicio();
	}

	if ($empresa != null) {
		$empresa = $_POST['empresa'];
	} else {
		$empresa = $llantaActual[0]->getEmpresa();
	}

	if ($unidades != null) {
		$unidades = $_POST['unidades'];
	} else {
		$unidades = $llantaActual[0]->getUnidades();
	}

	if ($precio != null) {
		$precio = $_POST['precio'];
	} else {
		$precio = $llantaActual[0]->getPrecio();
	}

	if ($operacion != null) {
		$operacion = $_POST['operacion'];
	} else {
		$operacion = $llantaActual[0]->getOperacion();
	}

	if ($tipoVehiculo != null) {
		$tipoVehiculo = $_POST['tipoVehiculo'];
	} else {
		$tipoVehiculo = $llantaActual[0]->getTipoVehiculo();
	}

	if ($tipoDmg != null) {
		$tipoDmg = $_POST['tipoDmg'];
	} else {
		$tipoDmg = $llantaActual[0]->getTipoDmg();
	}

	if ($estado != null) {
		$estado = $_POST['estado'];
		if ($estado == 'Entregado') {
			if ($fechaFin != null and $horaFin != null) {
				$estado = $_POST['estado'];
			} else {
				$estado = $llantaActual[0]->getEstado();
?>
				<script>
					Swal.fire({
						icon: 'warning',
						title: 'Oops...',
						html: 'No puedes cambiar el estado a "Entregado" sin poner una <b>fecha</b> y una <b>hora</b> de <b>finalización</b>',
						confirmButtonText: 'Volver',
					}).then((result) => {

						if (result.isConfirmed) {
							window.location.href = 'modificarLlanta.php?id=<?php echo $idLlanta; ?>';
						}
					})
				</script>
			<?php
				die();
			}
		}
	} else {
		$estado = $llantaActual[0]->getEstado();
	}

	if ($transporteExterno != null) {
		$transporteExterno = $_POST['transporteExterno'];
	} else {
		$transporteExterno = $llantaActual[0]->getTransporteExterno();
	}

	if ($nombreTransportista != null) {
		$nombreTransportista = $_POST['transportista'];
	} else {
		$nombreTransportista = $llantaActual[0]->getTransportista();
	}

	if ($proveniencia != null) {
		$proveniencia = $_POST['proveniencia'];
	} else {
		$proveniencia = $llantaActual[0]->getProveniencia();
	}

	if ($importeTotal != null) {
		$importeTotal = $_POST['importeTotal'];
	} else {
		$importeTotal = $llantaActual[0]->getImporteTotal();
	}

	if ($observaciones != null) {
		$observaciones = $_POST['observaciones'];
	} else {
		$observaciones = $llantaActual[0]->getObservaciones();
	}

	if ($fechaFin != null) {
		$fechaFin = $_POST['fechaFin'];
	} else {
		$fechaFin = $llantaActual[0]->getFechaFin();
	}

	if ($horaFin != null) {
		$horaFin = $_POST['horaFin'];
	} else {
		$horaFin = $llantaActual[0]->getHoraFin();
	}


	if ($facturado != null) {
		if ($fechaFin != null and $horaFin != null and $importeTotal != 0) {
			$facturado = $_POST['facturado'];
		} else {
			$facturado = "No";
		}
	} else {
		$facturado = $llantaActual[0]->getFacturado();
	}

	foreach ($_FILES["fotoLlanta"]['tmp_name'] as $key => $tmp_name) {
		if ($_FILES["fotoLlanta"]["name"][$key]) {
			$filename = $_FILES["fotoLlanta"]["name"][$key];
			$source = $_FILES["fotoLlanta"]["tmp_name"][$key];

			$directorio = 'assets/img/llantas/';
			if (!file_exists($directorio)) {
				mkdir($directorio, 0777) or die("No se puede crear el directorio");
			}
			$dir = opendir($directorio);
			$target_path = $directorio . '/' . $filename;

			if (file_exists($target_path)) {
			?>
				<div class="frame">
					<div class="modal">
						<img src="https://100dayscss.com/codepen/alert.png" width="44" height="38" />
						<span class="title">Imágen duplicada</span>
						<p>Ya hay una imágen con ese nombre, por favor, cámbiale el nombre</p>
						<a href="listarLlantas.php">
							<div class="button">Cerrar</div>
						</a>
					</div>
				</div>
			<?php
				die();
			}


			if (move_uploaded_file($source, $target_path)) {
				$codImagen = $llantaActual[0]->getCodImagen();
				if ($codImagen == null) {
					$codImagen = 10000000 + ($idLlantaa);
				} else {
					$codImagen = $llantaActual[0]->getCodImagen();
				}
				$image = new ImagenLlanta(0, $idUsuario, $idLlantaa, $codImagen, $target_path);
				$imagen = $imagenes->addUnaImagen($image);
			} else {
				echo "Ha ocurrido un error";
			}
			closedir($dir);
		}
	}



	$codImagen = $llantaActual[0]->getCodImagen();
	$comprobacionImagenId = $imagenes->getCompById($idLlanta);

	if ($codImagen == null and $comprobacionImagenId != null) {
		$codImagen = 10000000 + ($idLlantaa);
	} else {
		$codImagen = $llantaActual[0]->getCodImagen();
	}

	if ($estado == 'Entregado' and  $fechaFin != null and $horaFin != null) {
		if ($facturado == 'No' or $importeTotal == 0) {
			?>
			<script>
				Swal.fire({
					icon: 'warning',
					title: 'Oops...',
					html: 'No puedes finalizar la tarea sin facturarla y sin asignar un importe total.</b>',
					confirmButtonText: 'Volver',
				}).then((result) => {

					if (result.isConfirmed) {
						window.location.href = 'modificarLlanta.php?id=<?php echo $idLlanta; ?>';
					}
				})
			</script>
<?php
			die();
		}
	}

	$l = new Llanta($idLlantaa, $idUsuario, $codImagen, $matricula, $fechaActual, $horaInicio, $empresa, $unidades, $precio, $operacion, $fechaFin, $horaFin, $tipoVehiculo, $tipoDmg, $estado, $transporteExterno, $nombreTransportista, $proveniencia, $observaciones, $importeTotal, $facturado);

	$llanta = $llantas->updateLlanta($l);

	if ($llanta) {
		echo '<script>window.location="listarLlantas.php"</script>';
	} else {
		$alert = '<div class="alert">
				<strong>La actividad no se ha podido modificar, por favor, verifique los datos o consulte con el informático</strong>
			</div>';
	}
}

?>
<section class="full-width pageContent">
	<!-- 	<section class="full-width header-well">
		<div class="full-width header-well-icon">
			<i class="zmdi zmdi-balance"></i>
		</div>
		<div class="full-width header-well-text">
			<p class="text-condensedLight">
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde aut nulla accusantium minus corporis accusamus fuga harum natus molestias necessitatibus.
			</p>
		</div>
	</section> -->
	<div class="full-width divider-menu-h"></div>
	<div class="mdl-grid">
		<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset-desktop">
			<div class="full-width panel mdl-shadow--2dp">
				<div class="full-width panel-tittle bg-primary text-center tittles">
					Modificar Llanta
				</div>
				<div class="full-width panel-content">
					<form action="modificarLlanta.php?id=<?php echo $idLlanta; ?>" method="post" enctype="multipart/form-data">
						<h5 class="text-condensedLight">Datos de la llanta</h5>
						<?php if ($idRol != '3') { ?>
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
								<input class="mdl-textfield__input" type="text" id="matricula" name="matricula" value="<?php echo $llantaActual[0]->getMatricula(); ?>">
								<label class="mdl-textfield__label" for="matricula">Matrícula</label>
								<span class="mdl-textfield__error">Datos no válidos</span>
							</div>
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
								<input class="mdl-textfield__input" type="date" id="fechaInicio" name="fechaInicio" value="<?php echo $llantaActual[0]->getFechaInicio(); ?>">
								<label class="mdl-textfield__label" for="fechaInicio">Fecha de entrada</label>
								<span class="mdl-textfield__error">Datos no válidos</span>
							</div>
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
								<input class="mdl-textfield__input" type="time" id="horaInicio" placeholder="Hora de inicio" value="<?php echo $llantaActual[0]->getHoraInicio(); ?>" name="horaInicio">
								<label class="mdl-textfield__label" for="horaInicio">Hora de inicio</label>
								<span class="mdl-textfield__error">Dato no válido</span>
							</div>
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
								<input class="mdl-textfield__input" type="text" id="empresa" name="empresa" value="<?php echo $llantaActual[0]->getEmpresa(); ?>">
								<label class="mdl-textfield__label" for="empresa">Empresa</label>
								<span class="mdl-textfield__error">Datos no válidos</span>
							</div>
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
								<input class="mdl-textfield__input" type="number" id="unidades" name="unidades" value="<?php echo $llantaActual[0]->getUnidades(); ?>">
								<label class="mdl-textfield__label" for="unidades">Unidades</label>
								<span class="mdl-textfield__error">Datos no válidos</span>
							</div>
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
								<input class="mdl-textfield__input" type="number" id="precio" step="0.01" name="precio" value="<?php echo $llantaActual[0]->getPrecio(); ?>">
								<label class="mdl-textfield__label" for="precio">Precio</label>
								<span class="mdl-textfield__error">Datos no válidos</span>
							</div>
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
								<select class="mdl-textfield__input" name="operacion" id="operacion" value="<?php echo $llantaActual[0]->getOperacion(); ?>">
									<option value="Reparar" <?php if ($llantaActual[0]->getOperacion() == "Reparar") {
																echo ("Selected");
															} ?>>Reparar</option>
									<option value="Añadido de material" <?php if ($llantaActual[0]->getOperacion() == "Añadido de material") {
																			echo ("Selected");
																		} ?>>Añadido de material</option>
								</select>
								<label class="mdl-textfield__label" for="operacion">Operación</label>
								<span class="mdl-textfield__error">Datos no válidos</span>
							</div>
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
								<select class="mdl-textfield__input" name="tipoVehiculo" id="tipoVehiculo">
									<option value="Turismo" <?php if ($llantaActual[0]->getTipoVehiculo() == "Turismo") {
																echo ("Selected");
															} ?>>Turismo</option>
									<option value="Vehículo alta gama" <?php if ($llantaActual[0]->getTipoVehiculo() == "Vehículo alta gama") {
																			echo ("Selected");
																		} ?>>Vehículo alta gama</option>
									<option value="Motocicleta" <?php if ($llantaActual[0]->getTipoVehiculo() == "Motocicleta") {
																	echo ("Selected");
																} ?>>Motocicleta</option>
									<option value="Vehículo pesado" <?php if ($llantaActual[0]->getTipoVehiculo() == "Vehículo pesado") {
																		echo ("Selected");
																	} ?>>Vehículo pesado</option>
								</select>
								<label class="mdl-textfield__label" for="tipoVehiculo">Tipo de vehículo</label>
								<span class="mdl-textfield__error">Datos no válidos</span>
							</div>
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
								<select class="mdl-textfield__input" name="tipoDmg" id="tipoDmg">
									<option value="Leve" <?php if ($llantaActual[0]->getTipoDmg() == "Leve") {
																echo ("Selected");
															} ?>>Leve</option>
									<option value="Medio" <?php if ($llantaActual[0]->getTipoDmg() == "Medio") {
																echo ("Selected");
															} ?>>Medio</option>
									<option value="Grave" <?php if ($llantaActual[0]->getTipoDmg() == "Grave") {
																echo ("Selected");
															} ?>>Grave</option>
								</select>
								<label class="mdl-textfield__label" for="tipoDmg">Tipo de daño</label>
								<span class="mdl-textfield__error">Datos no válidos</span>
							</div>
						<?php } ?>
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							<select class="mdl-textfield__input" name="estado" id="estado">
								<option value="Recibido" <?php if ($llantaActual[0]->getEstado() == "Recibido") {
																echo ("Selected");
															} ?>>Recibido</option>
								<option value="Preparacion" <?php if ($llantaActual[0]->getEstado() == "Preparacion") {
																echo ("Selected");
															} ?>>Preparacion</option>
								<option value="Mecanizado" <?php if ($llantaActual[0]->getEstado() == "Mecanizado") {
																echo ("Selected");
															} ?>>Mecanizado</option>
								<option value="Pintado" <?php if ($llantaActual[0]->getEstado() == "Pintado") {
															echo ("Selected");
														} ?>>Pintado</option>
								<option value="Entregado" <?php if ($llantaActual[0]->getEstado() == "Entregado") {
																echo ("Selected");
															} ?>>Entregado</option>
								<option value="Cancelado" <?php if ($llantaActual[0]->getEstado() == "Cancelado") {
																echo ("Selected");
															} ?>>Cancelado</option>
							</select>
							<label class="mdl-textfield__label" for="estado">Estado</label>
							<span class="mdl-textfield__error">Datos no válidos</span>
						</div>
						<?php if ($idRol != '3') { ?>
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
								<select class="mdl-textfield__input" name="transporteExterno" id="transporteExterno">
									<option value="Si" <?php if ($llantaActual[0]->getTransporteExterno() == "Si") {
															echo ("Selected");
														} ?>>Si</option>
									<option value="No" <?php if ($llantaActual[0]->getTransporteExterno() == "No") {
															echo ("Selected");
														} ?>>No</option>
								</select>
								<label class="mdl-textfield__label" for="transporteExterno">¿Transporte Externo?</label>
								<span class="mdl-textfield__error">Datos no válidos</span>
							</div>
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
								<input class="mdl-textfield__input" type="text" id="transportista" name="transportista" value="<?php echo $llantaActual[0]->getTransportista(); ?>">
								<label class="mdl-textfield__label" for="transportista">Transportista</label>
								<span class="mdl-textfield__error">Datos no válidos</span>
							</div>
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
								<select class="mdl-textfield__input" name="proveniencia" id="proveniencia">
									<option value="España" <?php if ($llantaActual[0]->getProveniencia() == "España") {
																echo ("Selected");
															} ?>>España</option>
									<option value="Portugal" <?php if ($llantaActual[0]->getProveniencia() == "Portugal") {
																	echo ("Selected");
																} ?>>Portugal</option>
								</select>
								<label class="mdl-textfield__label" for="proveniencia">Origen</label>
							</div>
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
								<input class="mdl-textfield__input" type="number" step="0.01" id="importeTotal" value="<?php echo $llantaActual[0]->getImporteTotal(); ?>" name="importeTotal">
								<label class="mdl-textfield__label" for="importeTotal">Importe Total</label>
								<span class="mdl-textfield__error">Datos no válidos</span>
							</div>
						<?php } ?>
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							<textarea id="observaciones" class="mdl-textfield__input" name="observaciones" rows="4" cols="50"><?php echo $llantaActual[0]->getObservaciones(); ?></textarea>
							<label class="mdl-textfield__label" for="observaciones">Observaciones</label>
							<span class="mdl-textfield__error">Datos no válidos</span>
						</div>
						<?php if ($idRol != '3') { ?>
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
								<input class="mdl-textfield__input" type="date" id="fechaFin" name="fechaFin" value="<?php echo $llantaActual[0]->getFechaFin(); ?>">
								<label class="mdl-textfield__label" for="fechaFin">Fecha de finalización</label>
								<span class="mdl-textfield__error">Datos no válidos</span>
							</div>
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
								<input class="mdl-textfield__input" type="time" id="horaFin" placeholder="Hora de finalización" value="<?php echo $llantaActual[0]->getHoraFin(); ?>" name="horaFin">
								<label class="mdl-textfield__label" for="horaFin">Hora de finalización</label>
								<span class="mdl-textfield__error">Dato no válido</span>
							</div>
						<?php } ?>
						<?php if ($idRol != '3') { ?>
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
								<select class="mdl-textfield__input" name="facturado" id="facturado">
									<option value="No" <?php if ($llantaActual[0]->getFacturado() == "No") {
															echo ("Selected");
														} ?>>No</option>
									<option value="Si" <?php if ($llantaActual[0]->getFacturado() == "Si") {
															echo ("Selected");
														} ?>>Si</option>
								</select>
								<label class="mdl-textfield__label" for="facturado">Facturado</label>
								<span class="mdl-textfield__error">Datos no válidos</span>
							</div>
						<?php } ?>
						<?php if ($llantaActual[0]->getCodImagen() != null) { ?>
							<section id="galeria">
								<header style="margin-top: -2%;">
									<h4 style="text-align: center">Imágenes actuales</h4>
								</header>
								<?php
								$imagenesLlantasByCod = $imagenes->getImagenesByCod($llantaActual[0]->getCodImagen());
								foreach ($imagenesLlantasByCod as $particulares => $img) { ?>
									<article>
										<figure>
											<img src="<?php echo $img->getRutaFoto(); ?>" />
											<a style="text-decoration: none;" href="deleteImage.php?id=<?php echo $img->getId(); ?>&ruta=<?php echo $img->getRutaFoto(); ?>&idLlanta=<?php echo $idLlanta; ?>">
												<figcaption style="margin-top: 4%;">Eliminar</figcaption>
											</a>
										</figure>
									</article>
								<?php } ?>
							</section>
						<?php } ?>

						<div class="custom-input-file col-md-6 col-sm-6 col-xs-6">
							<input type="file" name="fotoLlanta[]" accept="image/png, image/jpeg, image/jpg" multiple class="input-file" value="">
							Subir fotos
						</div>
						<div class="custom-input-file col-md-6 col-sm-6 col-xs-6 resp-mob" style="background-color: #000f32; margin-bottom: 0%; margin-top: 4%;">
							<button style="color: white; background-color: #000f32; border:none" id="btn-addCompany" name="modificar">
								Guardar cambios
							</button>
						</div>
					</form>
				</div>
			</div>
			<?php echo ($alert); ?>
		</div>

	</div>
</section>

</body>

</html>

<script>
	$('.btnClose').bind('click', function() {
		$('.modal').addClass('hide');
	});
</script>