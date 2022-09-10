<?php

require('assets/header.php');
require_once('persistencia/Llantas.php');
require_once('pojos/Llanta.php');
require_once('pojos/ImagenLlanta.php');
require_once('persistencia/ImagenesLlantas.php');

if($rolUsuario == 'Tecnico'){
	echo '<script>window.location="listarLlantas.php"</script>';
}

$llantas = Llantas::singletonLlantas();
$imagenes = ImagenesLlantas::singletonImagenesLlantas();

if (isset($_POST['enviar'])) {
	$empresa = strtoupper($_POST['empresa']);
	$unidades = $_POST['unidades'];
	$matricula = strtoupper($_POST['matricula']);
	$precio = $_POST['precio'];
	$operacion = $_POST['operacion'];
	$fechaFin = null;
	$horaFin = null;
	$estado = $_POST['estado'];
	$transporteExterno = $_POST['transporteExterno'];
	$proveniencia = $_POST['proveniencia'];
	$observaciones = $_POST['observaciones'];
	$horaInicio = $_POST['horaInicio'];
	$tipoVehiculo = $_POST['tipoVehiculo'];
	$nombreTransportista = strtoupper($_POST['transportista']);
	$tipoDmg = $_POST['tipoDmg'];
	$importeTotal = 0;
	$facturado = 'No';
	$fechaInicio = $_POST['fechaEntrada'];


	if (empty($observaciones)) {
		$observaciones = null;
	} else {
		$observaciones = $_POST['observaciones'];
	}

	$l = new Llanta(0, $idUsuario, null, $matricula, $fechaInicio, $horaInicio, $empresa, $unidades, $precio, $operacion, $fechaFin, $horaFin, $tipoVehiculo, $tipoDmg, $estado, $transporteExterno, $nombreTransportista, $proveniencia, $observaciones, $importeTotal, $facturado);

	$llanta = $llantas->addLlanta($l);

	if ($_FILES["fotoLlanta"] != null) {
		foreach ($_FILES["fotoLlanta"]['tmp_name'] as $key => $tmp_name) {
			if ($_FILES["fotoLlanta"]["name"][$key]) {
				$filename = $_FILES["fotoLlanta"]["name"][$key];
				$source = $_FILES["fotoLlanta"]["tmp_name"][$key];

				$directorio = 'assets/img/llantas';
				if (!file_exists($directorio)) {
					mkdir($directorio, 0777) or die("No se puede crear el directorio");
				}

				$dir = opendir($directorio);
				$target_path = $directorio . '/' . $filename;

				if (move_uploaded_file($source, $target_path)) {
					$idLlanta = $llantas->lastId();
					$codImagen = 10000000 + ($idLlanta);
					$image = new ImagenLlanta(0, $idUsuario, $idLlanta, $codImagen, $target_path);
					$imagen = $imagenes->addUnaImagen($image);
				} else {
					echo "Ha ocurrido un error";
				}
				closedir($dir);
			}
		}
	} else {
		$codImagen = null;
	}


	$idLlantaLast = $llantas->lastId();
	$lastLlanta = $llantas->getLlanta($idLlantaLast);

	$idImagenLast = $imagenes->lastId();
	$lastImagenes = $imagenes->getImagenesByID($idImagenLast);
	if ($codImagen != null) {
		$codImagen = $lastImagenes[0]->getCodImagen();
	} else {
		$codImagen = null;
	}


	$horaInicio = $lastLlanta[0]->getHoraInicio();
	$idLlantaa = $lastLlanta[0]->getId();
	$matricula =  $lastLlanta[0]->getMatricula();
	$unidades =  $lastLlanta[0]->getUnidades();
	$fechaActual = $lastLlanta[0]->getFechaInicio();
	$precio =  $lastLlanta[0]->getPrecio();
	$proveniencia =  $lastLlanta[0]->getProveniencia();
	$operacion = $lastLlanta[0]->getOperacion();
	$fechaFin = $lastLlanta[0]->getFechaFin();
	$horaFin = $lastLlanta[0]->getHoraFin();
	$tipoVehiculo = $lastLlanta[0]->getTipoVehiculo();
	$tipoDmg = $lastLlanta[0]->getTipoDmg();
	$estado = $lastLlanta[0]->getEstado();
	$transporteExterno = $lastLlanta[0]->getTransporteExterno();
	$transportista = $lastLlanta[0]->getTransportista();
	$proveniencia = $lastLlanta[0]->getProveniencia();
	$observaciones = $lastLlanta[0]->getObservaciones();
	$importeTotal = $lastLlanta[0]->getImporteTotal();
	$facturado = $lastLlanta[0]->getFacturado();

	$l = new Llanta($idLlantaa, $idUsuario, $codImagen, $matricula, $fechaActual, $horaInicio, $empresa, $unidades, $precio, $operacion, $fechaFin, $horaFin, $tipoVehiculo, $tipoDmg, $estado, $transporteExterno, $transportista, $proveniencia, $observaciones, $importeTotal, $facturado);

	$llanta = $llantas->updateLlanta($l);

	if ($llanta) {
		$alert = '<div class="succ">
			   <strong>¡La actividad se ha añadido correctamente!</strong>
		   </div>';
	} else {
		$alert = '<div class="alert">
			   <strong>La actividad no se ha podido añadir, por favor, verifique los datos o consulte con el informático</strong>
		   </div>';
	}
}

?>
<section class="full-width pageContent">
	<div class="full-width divider-menu-h"></div>
	<div class="mdl-grid">
		<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset-desktop">
			<div class="full-width panel mdl-shadow--2dp">
				<div class="full-width panel-tittle bg-primary text-center tittles">
					Nueva Llanta
				</div>
				<div class="full-width panel-content">
					<form action="addLlanta.php" method="post" enctype="multipart/form-data">
						<h5 class="text-condensedLight">Datos de la llanta</h5>
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							<input class="mdl-textfield__input" type="text" id="matricula" required name="matricula">
							<label class="mdl-textfield__label" for="matricula">Matrícula</label>
						</div>
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							<input class="mdl-textfield__input" type="date" id="fechaEntrada" required placeholder="Fecha de entrada" name="fechaEntrada">
							<label class="mdl-textfield__label" for="fechaEntrada">Fecha de entrada</label>
						</div>
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							<input class="mdl-textfield__input" type="time" id="horaInicio" required placeholder="Hora de inicio" name="horaInicio">
							<label class="mdl-textfield__label" for="horaInicio">Hora de inicio</label>
						</div>
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							<input class="mdl-textfield__input" type="text" id="empresa" required name="empresa">
							<label class="mdl-textfield__label" for="empresa">Empresa</label>
						</div>
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							<input class="mdl-textfield__input" type="number" id="unidades" required name="unidades">
							<label class="mdl-textfield__label" for="unidades">Unidades</label>
						</div>
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							<input class="mdl-textfield__input" type="number" id="precio" required name="precio">
							<label class="mdl-textfield__label" for="precio">Precio</label>

						</div>
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							<select class="mdl-textfield__input" name="operacion" required id="operacion">
								<option value="Reparar">Reparar</option>
								<option value="Añadido de material">Añadido de material</option>
							</select>
							<label class="mdl-textfield__label" for="operacion">Operación</label>

						</div>
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							<select class="mdl-textfield__input" name="tipoVehiculo" required id="tipoVehiculo">
								<option value="Turismo">Turismo</option>
								<option value="Vehículo alta gama">Vehículo alta gama</option>
								<option value="Motocicleta">Motocicleta</option>
								<option value="Vehículo pesado">Vehículo pesado</option>
							</select>
							<label class="mdl-textfield__label" for="tipoVehiculo">Tipo de vehículo</label>

						</div>
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							<select class="mdl-textfield__input" name="tipoDmg" required id="tipoDmg">
								<option value="Leve">Leve</option>
								<option value="Medio">Medio</option>
								<option value="Grave">Grave</option>
							</select>
							<label class="mdl-textfield__label" for="tipoDmg">Tipo de daño</label>

						</div>
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							<select class="mdl-textfield__input" name="estado" required id="estado">
								<option value="Recibido">Recibido</option>
								<option value="Preparacion">Preparación</option>
								<option value="Mecanizado">Mecanizado</option>
								<option value="Pintado">Pintado</option>
								<option value="Entregado">Entregado</option>
								<option value="Cancelado">Cancelado</option>
							</select>
							<label class="mdl-textfield__label" for="estado">Estado</label>

						</div>
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							<select class="mdl-textfield__input" required name="transporteExterno" id="transporteExterno">
								<option value="Si">Si</option>
								<option value="No">No</option>
							</select>
							<label class="mdl-textfield__label" for="transporteExterno">¿Transporte Externo?</label>

						</div>
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							<input class="mdl-textfield__input" type="text" id="transportista" required name="transportista">
							<label class="mdl-textfield__label" for="transportista">Transportista</label>

						</div>
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							<select class="mdl-textfield__input" name="proveniencia" required id="proveniencia">
								<option value="España">España</option>
								<option value="Portugal">Portugal</option>
							</select>
							<label class="mdl-textfield__label" for="proveniencia">Origen</label>
						</div>
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							<textarea id="observaciones" class="mdl-textfield__input" name="observaciones" rows="4" cols="50"></textarea>
							<label class="mdl-textfield__label" for="observaciones">Observaciones</label>
						</div>
						 <div class="custom-input-file col-md-6 col-sm-6 col-xs-6">
							<input type="file" name="fotoLlanta[]" accept="image/png, image/jpeg, image/jpg" multiple class="input-file" value="">
							Subir fotos
						</div>
						
						<p class="text-center" style="margin-top: 1%;">
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