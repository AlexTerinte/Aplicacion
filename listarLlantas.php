<link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<?php

require('assets/header.php');
require_once('persistencia/Llantas.php');
require_once('pojos/Llanta.php');
require_once('persistencia/ImagenesLlantas.php');
require_once('pojos/ImagenLlanta.php');

$llantas = Llantas::singletonLlantas();
$imagenes = ImagenesLlantas::singletonImagenesLlantas();

$todasLLantas = $llantas->getLlantasTodos();


if (isset($_POST['filtrar'])) {

	$estado = $_POST['estado'];
	$matricula = $_POST['matricula'];

	if ($estado == 'sn') {
		$estado = null;
	} else {
		$estado = $_POST['estado'];
	}

	if ($matricula == null) {
		$matricula = null;
	} else {
		$matricula = $_POST['matricula'];
	}

	if ($matricula == null) {
		$llantasFiltEstado = $llantas->getLlantasFiltEstado($estado);
	}

	if ($estado == null) {
		$llantasFiltMat = $llantas->getLlantaByMat($matricula);
	}

}

?>


<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="css/lightbox.min.css">
<script src="js/lightbox-plus-jquery.min.js"></script>

<section class="full-width pageContent">
	<!-- 	<section class="full-width header-well">
		<div class="full-width header-well-icon">
			<i class="zmdi zmdi-truck"></i>
		</div>
		<div class="full-width header-well-text">
			<p class="text-condensedLight">
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde aut nulla accusantium minus corporis accusamus fuga harum natus molestias necessitatibus.
			</p>
		</div>
	</section> -->
	<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
		<div class="mdl-tabs__tab-bar">
			<a href="#tabListProvider" class="mdl-tabs__tab is-active">Registro de llantas</a>
		</div>
		<div class="mdl-tabs__panel is-active" id="tabListProvider">
			<div class="mdl-grid">
				<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset-desktop">
					<div class="full-width panel mdl-shadow--2dp">
						<div class="full-width panel-tittle bg-success text-center tittles">
							Listado
							<?php if ($rolUsuario != 'Tecnico') { ?><a href="descargarLlantas.php?idUsuario=<?php echo $idUsuario; ?>" style="color:white;"><i class="zmdi zmdi-download img-descarga"></i></a><?php } ?>
						</div>
						<div class="full-width panel-content">
							<form action="listarLlantas.php" method="POST">
								<div class="mdl-textfield2 mdl-js-textfield mdl-textfield--expandable">
									<select class="mdl-textfield__input" name="estado">
										<option value="sn">Estado</option>
										<option value="Recibido">Recibido</option>
										<option value="Preparacion">Preparacion</option>
										<option value="Mecanizado">Mecanizado</option>
										<option value="Pintado">Pintado</option>
										<option value="Entregado">Entregado</option>
										<option value="Cancelado">Cancelado</option>
									</select>
								</div>
								<div class="mdl-textfield2 mdl-js-textfield mdl-textfield--expandable">
									<input class="mdl-textfield__input" type="text" id="matricula" placeholder="Matricula" name="matricula">
								</div>
								<button type="submit" name="filtrar" class="btFilt"></button>
							</form>
							<div class="mdl-list">
								<div class="accordion" id="accordionExample">
									<?php if (!empty($llantasFiltEstado)) {
										foreach ($llantasFiltEstado as $particulares => $clientes) {
											$imagenesLlantasByCod = $imagenes->getImagenesByCod($clientes[2]); ?>
											<div class="accordion-item">
												<h2 class="accordion-header" id="heading<?php echo $clientes[0]; ?>">
													<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $clientes[0]; ?>" aria-expanded="true" aria-controls="collapse<?php echo $clientes[0]; ?>">
														<?php echo $clientes[3]; ?> - <?php echo $clientes[6]; ?> <?php if ($clientes[14] == 'Recibido') { ?> <span class="red">.</span> <?php } ?> <?php if ($clientes[14] == 'Preparacion') { ?> <span class="orange">.</span> <?php } ?> <?php if ($clientes[14] == 'Mecanizado') { ?> <span class="orange">.</span> <?php } ?> <?php if ($clientes[14] == 'Pintado') { ?> <span class="orange">.</span> <?php } ?> <?php if ($clientes[14] == 'Entregado') { ?> <span class="green">.</span> <?php } ?> <?php if ($clientes[14] == 'Cancelado') { ?> <span class="black">.</span> <?php } ?><a href="modificarLlanta.php?id=<?php echo $clientes[0]; ?>"><span class="span3"> </span></a>
													</button>
												</h2>
												<div id="collapse<?php echo $clientes[0]; ?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo $clientes[0]; ?>" data-bs-parent="#accordionExample">
													<div class="accordion-body">
														<?php if ($rolUsuario != 'Tecnico') { ?>
															<?php if ($imagenesLlantasByCod != null) { ?>
																<a href="descargarLlanta.php?idLlanta=<?php echo $clientes[0]; ?>" style="float:right">Exportar excel</a>
															<?php } else { ?>
																<a href="descargarLlanta.php?idLlanta=<?php echo $clientes[0]; ?>" style="margin-left: auto; display: table; margin-bottom: 4%;">Exportar excel</a>
															<?php } ?>
														<?php } ?>
														<?php if ($imagenesLlantasByCod != null) { ?>
															<div class="swiper mySwiper">
																<div class="swiper-wrapper" style="height: auto;">
																	<?php
																	foreach ($imagenesLlantasByCod as $particulares => $img) {
																	?>
																		<div class="swiper-slide">
																			<a href="<?php echo $img->getRutaFoto(); ?>" data-lightbox="gallery">
																				<img src="<?php echo $img->getRutaFoto(); ?>" />
																			</a>
																		</div>
																	<?php
																	}
																	?>
																</div>
																<div class="swiper-pagination"></div>
															</div>
														<?php } ?>
														<div class="row">
															<div class="col-6">
																<p class="text-izquierda">
																	Matrícula<br>
																	Fecha de entrada<br>
																	Hora de inicio<br>
																	Empresa<br>
																	Unidades<br>
																	<?php if ($idRol != '3') { ?>
																		Precio<br>
																	<?php } ?>
																	Operación<br>
																	Fecha de finalización<br>
																	Hora de finalización<br>
																	Tipo de vehículo<br>
																	Tipo de daño<br>
																	Estado<br>
																	¿Transporte externo?<br>
																	Transportista<br>
																	Origen<br>
																	<?php if ($idRol != '3') { ?>
																		Importe total<br>
																	<?php } ?>
																	Facturado<br>
																	Observaciones<br>
																</p>
															</div>

															<div class="col-6">
																<p class="text-derecha">
																	<?php echo $clientes[3]; ?><br>
																	<?php echo $clientes[4]; ?><br>
																	<?php echo $clientes[5]; ?><br>
																	<?php echo $clientes[6]; ?><br>
																	<?php echo $clientes[7]; ?><br>
																	<?php if ($idRol != '3') { ?>
																		<?php echo $clientes[8]; ?><br>
																	<?php } ?>
																	<?php echo $clientes[9]; ?><br>
																	<?php if ($clientes[10] != null) {
																		echo $clientes[10];
																	} else {
																		echo "Pendiente";
																	} ?><br>
																	<?php if ($clientes[11] != null) {
																		echo $clientes[11];
																	} else {
																		echo "Pendiente";
																	} ?><br>
																	<?php echo $clientes[12]; ?><br>
																	<?php echo $clientes[13]; ?><br>
																	<?php echo $clientes[14]; ?><br>
																	<?php echo $clientes[15]; ?><br>
																	<?php echo $clientes[16]; ?><br>
																	<?php echo $clientes[17]; ?><br>
																	<?php if ($idRol != '3') { ?>
																		<?php if ($clientes[19] != 0) {
																			echo $clientes[19];
																		} else {
																			echo "Pendiente";
																		} ?><br>
																	<?php } ?>
																	<?php if ($clientes[20] == 'Si') {
																		echo "Si";
																	} else {
																		echo "No";
																	} ?><br>
																	<?php echo $clientes[18]; ?><br>
																</p>
															</div>
														</div>
													</div>
												</div>
											</div>
										<?php     }     ?>
									<?php } else if (!empty($llantasFiltMat)) { ?>
										<?php foreach ($llantasFiltMat as $particulares => $clientes) {
											$imagenesLlantasByCod = $imagenes->getImagenesByCod($clientes[2]); ?>
											<div class="accordion-item">
												<h2 class="accordion-header" id="heading<?php echo $clientes[0]; ?>">
													<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $clientes[0]; ?>" aria-expanded="true" aria-controls="collapse<?php echo $clientes[0]; ?>">
														<?php echo $clientes[3]; ?> - <?php echo $clientes[6]; ?> <?php if ($clientes[14] == 'Recibido') { ?> <span class="red">.</span> <?php } ?> <?php if ($clientes[14] == 'Preparacion') { ?> <span class="orange">.</span> <?php } ?> <?php if ($clientes[14] == 'Mecanizado') { ?> <span class="orange">.</span> <?php } ?> <?php if ($clientes[14] == 'Pintado') { ?> <span class="orange">.</span> <?php } ?> <?php if ($clientes[14] == 'Entregado') { ?> <span class="green">.</span> <?php } ?> <?php if ($clientes[14] == 'Cancelado') { ?> <span class="black">.</span> <?php } ?><a href="modificarLlanta.php?id=<?php echo $clientes[0]; ?>"><span class="span3"> </span></a>
													</button>
												</h2>
												<div id="collapse<?php echo $clientes[0]; ?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo $clientes[0]; ?>" data-bs-parent="#accordionExample">
													<div class="accordion-body">
														<?php if ($rolUsuario != 'Tecnico') { ?>
															<?php if ($imagenesLlantasByCod != null) { ?>
																<a href="descargarLlanta.php?idLlanta=<?php echo $clientes[0]; ?>" style="float:right">Exportar excel</a>
															<?php } else { ?>
																<a href="descargarLlanta.php?idLlanta=<?php echo $clientes[0]; ?>" style="margin-left: auto; display: table; margin-bottom: 4%;">Exportar excel</a>
															<?php } ?>
														<?php } ?>
														<?php if ($imagenesLlantasByCod != null) { ?>
															<div class="swiper mySwiper">
																<div class="swiper-wrapper" style="height: auto;">
																	<?php
																	foreach ($imagenesLlantasByCod as $particulares => $img) {
																	?>
																		<div class="swiper-slide">
																			<a href="<?php echo $img->getRutaFoto(); ?>" data-lightbox="gallery">
																				<img src="<?php echo $img->getRutaFoto(); ?>" />
																			</a>
																		</div>
																	<?php
																	}
																	?>
																</div>
																<div class="swiper-pagination"></div>
															</div>
														<?php } ?>
														<div class="row">
															<div class="col-6">
																<p class="text-izquierda">
																	Matrícula<br>
																	Fecha de entrada<br>
																	Hora de inicio<br>
																	Empresa<br>
																	Unidades<br>
																	<?php if ($idRol != '3') { ?>
																		Precio<br>
																	<?php } ?>
																	Operación<br>
																	Fecha de finalización<br>
																	Hora de finalización<br>
																	Tipo de vehículo<br>
																	Tipo de daño<br>
																	Estado<br>
																	¿Transporte externo?<br>
																	Transportista<br>
																	Origen<br>
																	<?php if ($idRol != '3') { ?>
																		Importe total<br>
																	<?php } ?>
																	Facturado<br>
																	Observaciones<br>
																</p>
															</div>

															<div class="col-6">
																<p class="text-derecha">
																	<?php echo $clientes[3]; ?><br>
																	<?php echo $clientes[4]; ?><br>
																	<?php echo $clientes[5]; ?><br>
																	<?php echo $clientes[6]; ?><br>
																	<?php echo $clientes[7]; ?><br>
																	<?php if ($idRol != '3') { ?>
																		<?php echo $clientes[8]; ?><br>
																	<?php } ?>
																	<?php echo $clientes[9]; ?><br>
																	<?php if ($clientes[10] != null) {
																		echo $clientes[10];
																	} else {
																		echo "Pendiente";
																	} ?><br>
																	<?php if ($clientes[11] != null) {
																		echo $clientes[11];
																	} else {
																		echo "Pendiente";
																	} ?><br>
																	<?php echo $clientes[12]; ?><br>
																	<?php echo $clientes[13]; ?><br>
																	<?php echo $clientes[14]; ?><br>
																	<?php echo $clientes[15]; ?><br>
																	<?php echo $clientes[16]; ?><br>
																	<?php echo $clientes[17]; ?><br>
																	<?php if ($idRol != '3') { ?>
																		<?php if ($clientes[19] != 0) {
																			echo $clientes[19];
																		} else {
																			echo "Pendiente";
																		} ?><br>
																	<?php } ?>
																	<?php if ($clientes[20] == 'Si') {
																		echo "Si";
																	} else {
																		echo "No";
																	} ?><br>
																	<?php echo $clientes[18]; ?><br>
																</p>
															</div>
														</div>
													</div>
												</div>
											</div>
										<?php  }   ?>
										<?php } else {
										if (!isset($_POST['filtrar'])) {
											foreach ($todasLLantas as $particulares => $clientes) {
												$imagenesLlantasByCod = $imagenes->getImagenesByCod($clientes->getCodImagen());
										?>
												<div class="accordion-item">
													<h2 class="accordion-header" id="heading<?php echo $clientes->getId(); ?>">
														<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $clientes->getId(); ?>" aria-expanded="true" aria-controls="collapse<?php echo $clientes->getId(); ?>">
															<?php echo $clientes->getMatricula(); ?> - <?php echo $clientes->getEmpresa(); ?> <?php if ($clientes->getEstado() == 'Recibido') { ?> <span class="red">.</span> <?php } ?> <?php if ($clientes->getEstado() == 'Preparacion') { ?> <span class="orange">.</span> <?php } ?> <?php if ($clientes->getEstado() == 'Mecanizado') { ?> <span class="orange">.</span> <?php } ?> <?php if ($clientes->getEstado() == 'Cancelado') { ?> <span class="black">.</span> <?php } ?> <?php if ($clientes->getEstado() == 'Pintado') { ?> <span class="orange">.</span> <?php } ?> <?php if ($clientes->getEstado() == 'Entregado') { ?> <span class="green">.</span> <?php } ?><a href="modificarLlanta.php?id=<?php echo $clientes->getId(); ?>"><span class="span3"> </span></a>
														</button>
													</h2>
													<div id="collapse<?php echo $clientes->getId(); ?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo $clientes->getId(); ?>" data-bs-parent="#accordionExample">
														<div class="accordion-body">
															<?php if ($rolUsuario != 'Tecnico') { ?>
																<?php if ($imagenesLlantasByCod != null) { ?>
																	<a href="descargarLlanta.php?idLlanta=<?php echo $clientes->getId(); ?>&idUsuario = <?php echo $clientes->getIdUsuario(); ?>" style="float:right">Exportar excel</a>
																<?php } else { ?>
																	<a href="descargarLlanta.php?idLlanta=<?php echo $clientes->getId(); ?>" style="margin-left: auto; display: table; margin-bottom: 4%;">Exportar excel</a>
																<?php } ?>
															<?php } ?>
															<?php if ($imagenesLlantasByCod != null) { ?>
																<div class="swiper mySwiper">
																	<div class="swiper-wrapper" style="height: auto;">
																		<?php
																		foreach ($imagenesLlantasByCod as $particulares => $img) {
																		?>
																			<div class="swiper-slide">
																				<a href="<?php echo $img->getRutaFoto(); ?>" data-lightbox="gallery">
																					<img src="<?php echo $img->getRutaFoto(); ?>" />
																				</a>
																			</div>
																		<?php
																		}
																		?>
																	</div>
																	<div class="swiper-pagination"></div>
																</div>
															<?php } ?>
															<div class="row">
																<div class="col-6">
																	<p class="text-izquierda">
																		Matrícula<br>
																		Fecha de entrada<br>
																		Hora de inicio<br>
																		Empresa<br>
																		Unidades<br>
																		<?php if ($idRol != '3') { ?>
																			Precio<br>
																		<?php } ?>
																		Operación<br>
																		Fecha de finalización<br>
																		Hora de finalización<br>
																		Tipo de vehículo<br>
																		Tipo de daño<br>
																		Estado<br>
																		¿Transporte externo?<br>
																		Transportista<br>
																		Origen<br>
																		<?php if ($idRol != '3') { ?>
																			Importe total<br>
																			Facturado<br>
																		<?php } ?>
																		Observaciones<br>
																	</p>
																</div>

																<div class="col-6">
																	<p class="text-derecha" >
																		<?php echo $clientes->getMatricula(); ?><br>
																		<?php echo $clientes->getFechaInicio(); ?><br>
																		<?php echo $clientes->getHoraInicio(); ?><br>
																		<?php echo $clientes->getEmpresa(); ?><br>
																		<?php echo $clientes->getUnidades(); ?><br>
																		<?php if ($idRol != '3') { ?>
																			<?php echo $clientes->getPrecio(); ?><br>
																		<?php } ?>
																		<?php echo $clientes->getOperacion(); ?><br>
																		<?php if ($clientes->getFechaFin() != null) {
																			echo $clientes->getFechaFin();
																		} else {
																			echo "Pendiente";
																		} ?><br>
																		<?php if ($clientes->getHoraFin() != null) {
																			echo $clientes->getHoraFin();
																		} else {
																			echo "Pendiente";
																		}
																		?><br>
																		<?php echo $clientes->getTipoVehiculo(); ?><br>
																		<?php echo $clientes->getTipoDmg(); ?><br>
																		<?php echo $clientes->getEstado(); ?><br>
																		<?php echo $clientes->getTransporteExterno(); ?><br>
																		<?php echo $clientes->getTransportista(); ?><br>
																		<?php echo $clientes->getProveniencia(); ?><br>
																		<?php if ($idRol != '3') { ?>
																			<?php if ($clientes->getImporteTotal() != 0) {
																				echo $clientes->getImporteTotal();
																			} else {
																				echo "Pendiente";
																			} ?><br>
																		<?php } ?>
																		<?php if ($idRol != '3') { ?>
																			<?php if ($clientes->getFacturado() == 'Si') {
																				echo "Si";
																			} else {
																				echo "No";
																			} ?><br>
																		<?php } ?>
																		<?php echo $clientes->getObservaciones(); ?><br>
																	</p>
																</div>
															</div>
														</div>
													</div>
												</div>
											<?php     }     ?>
										<?php } else { ?>
											<p class="pNoRes">No se han encontrado resultados</p>
											<img src="assets/img/match.png" class="imgMatch">
									<?php }
									} ?>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</section>

</body>

<script>
	var swiper = new Swiper(".mySwiper", {
		effect: "coverflow",
		grabCursor: true,
		centeredSlides: true,
		slidesPerView: "auto",
		coverflowEffect: {
			rotate: 50,
			stretch: 0,
			depth: 100,
			modifier: 1,
			slideShadows: true,
		},
		pagination: {
			el: ".swiper-pagination",
		},
	});
</script>

<script>
	imageZoom()
</script>

</html>