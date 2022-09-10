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

$todasMaquinarias = $maquinarias->getMaquinariaTodos();

?>

<style>
	div.example {
		background-color: white;
		width: 100%;
		height: 110px;
		overflow: auto;
		border: 1px solid black;
	}

	table {
		border: 1px solid #E8E8E8;
		border-collapse: collapse;
		margin: 0;
		padding: 0;
		width: 100%;
		table-layout: fixed;
		text-align: center;
	}

	tr {
		background-color: #F3F3F3;
		border: 1px solid #E8E8E8;
		padding: .35em;
	}

	th {
		padding: 10px 0px;
		color: black;
	}
</style>

<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/bootstrap.bundle.min.js"></script>

<section class="full-width pageContent">
	<section class="full-width header-well">
		<div class="full-width header-well-icon">
			<i class="zmdi zmdi-truck"></i>
		</div>
		<div class="full-width header-well-text">
			<p class="text-condensedLight">
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde aut nulla accusantium minus corporis accusamus fuga harum natus molestias necessitatibus.
			</p>
		</div>
	</section>
	<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
		<div class="mdl-tabs__tab-bar">
			<a href="#tabListProvider" class="mdl-tabs__tab is-active">Registro de mantenimientos</a>
		</div>
		<div class="mdl-tabs__panel is-active" id="tabListProvider">
			<div class="mdl-grid">
				<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset-desktop">
					<div class="full-width panel mdl-shadow--2dp">
						<div class="full-width panel-tittle bg-success text-center tittles">
							Listado
						</div>
						<div class="full-width panel-content">

							<form action="#">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
									<label class="mdl-button mdl-js-button mdl-button--icon" for="searchProvider">
										<i class="zmdi zmdi-search"></i>
									</label>
									<div class="mdl-textfield__expandable-holder">
										<input class="mdl-textfield__input" type="text" id="searchProvider">
										<label class="mdl-textfield__label"></label>
									</div>
								</div>
							</form>
							<div class="mdl-list">
								<div class="accordion" id="accordionExample">
									<?php foreach ($todasMaquinarias as $particulares => $clientes) { ?>
										<div class="accordion-item">
											<h2 class="accordion-header" id="headingOne">
												<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $clientes->getId(); ?>" aria-expanded="true" aria-controls="collapse<?php echo $clientes->getId(); ?>">
													<?php echo $clientes->getEquipo(); ?> - <?php echo $clientes->getNumeroSerie(); ?>
												</button>
											</h2>
											<div id="collapse<?php echo $clientes->getId(); ?>" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
												<div class="accordion-body">
													<div class="example">
														<table>
															<tbody>
																<tr>
																	<th>Tipo Maq.</th>
																	<th>Frecuencia</th>
																	<th>Fecha Fin.</th>
																	<th>Observaciones</th>
																</tr>
																<?php

																$mantenimientoByID = $mantenimientos->getMantenimiento($clientes->getId());

																foreach ($mantenimientoByID as $particulares => $mant) {
																?>
																	<tr style="border: 1px solid black; background-color: white;">
																		<th style="border-right: 1px solid black;"><?php echo $mant->getTipoMantenimiento() ?></th>
																		<?php if($mant->getTipoMantenimiento() == "Preventivo") {?>
																		<th style="border-right: 1px solid black;"><?php echo $mant->getFrecuencia() ?></th>
																		<?php } else { ?>
																			<th style="border-right: 1px solid black;"> - </th>
																			<?php } ?>
																		<th style="border-right: 1px solid black;"><?php echo $mant->getFechaFin() ?></th>
																		<th style="border-right: 1px solid black;"><?php echo $mant->getObservaciones() ?></th>
																	</tr>
																<?php } ?>
															</tbody>
														</table>

													</div>

													<button id="button" style="margin-top: 2%;" class="btn btn-primary" onclick="show(formulario<?php echo $clientes->getId(); ?>)">Añadir mantenimiento</button>
													<div id="show<?php echo $clientes->getId(); ?>" style="display:none; margin-top: 2%;">
														<form class="row g-6" method="post" action="addMant.php?id=<?php echo $clientes->getId(); ?>" enctype="multipart/form-data">
															<div class="prueba">
																<select class="form-select" name="mantenimiento" aria-label="Default select example">
																	<option selected hidden>Tipo Mantenimiento</option>
																	<option value="Preventivo">Preventivo</option>
																	<option value="Correctivo">Correctivo</option>
																</select>
															</div>
															<div class="prueba">
																<select class="form-select" name="frecuencia" aria-label="Default select example">
																	<option selected hidden>Frecuencia</option>
																	<option value="Anual">Anual</option>
																	<option value="Mensual">Mensual</option>
																	<option value="Semanal">Semanal</option>
																</select>
															</div>
															<div class="prueba">
																<label for="date" class="visually-hidden">Fecha</label>
																<input type="date" name="fechaFinalizacion" class="form-control" id="date" placeholder="Fecha">
															</div>
															<div class="prueba">
																<label for="coste" class="visually-hidden">Coste</label>
																<input type="number" step="0.01" name="coste" class="form-control" id="coste" placeholder="Coste">
															</div>
															<div class="prueba">
																<label for="horasTrabajo" class="visually-hidden">Horas empleadas</label>
																<input type="number" step="0.1" name="horasTrabajo" class="form-control" id="horasTrabajo" placeholder="Horas empleadas">
															</div>
															<div class="prueba">
															<label for="w3review">Observaciones:</label>
															<textarea id="observaciones" class="form-control" name="observaciones" id="observaciones" rows="4" cols="50">
															</textarea>
															</div>
													
															<div class="prueba" style="margin-top: 2%;">
																<input type="file" name="fotoMantenimiento" class="form-control" id="fotoMantenimiento" placeholder="Foto">
															</div>

															<div class="prueba" style="margin-top: 2%; float:right">
																<button type="submit" name="crearMantenimiento" class="btn btn-primary mb-3">Añadir</button>
															</div>
														</form>


													</div>
													<script>
														formulario<?php echo $clientes->getId(); ?> = document.getElementById("show<?php echo $clientes->getId(); ?>");

														function show(d) {
															d.style.display = (d.style.display !== "none") ? "none" : "block";
														}
													</script>


												</div>
											</div>
										</div>
									<?php     }     ?>
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



</html>