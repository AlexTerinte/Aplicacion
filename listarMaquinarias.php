<?php

require('assets/header.php');
require_once('persistencia/Maquinarias.php');
require_once('pojos/Maquinaria.php');

if($rolUsuario != 'Programador'){
	echo '<script>window.location="listarLlantas.php"</script>';
}

$maquinarias = Maquinarias::singletonMaquinarias();

$todasMaquinarias = $maquinarias->getMaquinariaTodos();


?>

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
			<a href="#tabListProvider" class="mdl-tabs__tab is-active">Registro de maquinarias</a>
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
													<?php echo $clientes->getId(); ?> - <?php echo $clientes->getNumeroSerie(); ?><a style="margin-left: auto;" href="modificarMaquinaria.php?id=<?php echo $clientes->getId(); ?>"><span class="span3"> </span></a>
												</button>
											</h2>
											<div id="collapse<?php echo $clientes->getId(); ?>" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
												<div class="accordion-body">
													<div class="left">
														<p style="font-weight:bold;">
															Equipo<br>
															Número de serie<br>
															Fecha de adquisición<br>
															Ubicación<br>
															Tipo de mantenimiento<br>
															Coste de adquisición<br>
															Estado<br>
															Foto<br>
														</p>
													</div>

													<div class="right">
														<p>
															<?php echo $clientes->getEquipo(); ?><br>
															<?php echo $clientes->getNumeroSerie(); ?><br>
															<?php echo $clientes->getFechaAdquisicion(); ?><br>
															<?php echo $clientes->getUbicacion(); ?><br>
															<?php echo $clientes->getTipoMantenimiento(); ?><br>
															<?php echo $clientes->getCosteAdquisicion(); ?><br>
															<?php echo $clientes->getEstado(); ?><br>
															<a href="<?php echo $clientes->getRutaFoto() ?>" download>Descargar</a>
														</p>
													</div>
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