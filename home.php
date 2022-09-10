<?php

require('assets/header.php');

require_once('pojos/Llanta.php');
require_once('persistencia/Llantas.php');
require_once('pojos/Maquinaria.php');
require_once('persistencia/Maquinarias.php');
require_once('pojos/Mantenimiento.php');
require_once('persistencia/MantenimientoMaquinaria.php');

if($idRol != '5' && $idRol != '1'){
	echo '<script>window.location="listarLlantas.php"</script>';
}


$llantas = Llantas::singletonLlantas();
$maquinarias = Maquinarias::singletonMaquinarias();
$mantenimientos = MantenimientoMaquinaria::singletonMantenimientoMaquinaria();

$numeroLlantas = $llantas->getNumeroLlantas();
$numeroLlantasSin = $llantas->getNumeroLlantasSinFacturar();
$importeTotal = $llantas->getImporteTotalLlantas();
$maquinariaTotal = $maquinarias->getMaquinariasTotal();
$totalCostePreventivo = $mantenimientos->getCostePreventivo();
$totalCosteCorrectivo = $mantenimientos->getCosteCorrectivo();
$totalMantenimientos = $mantenimientos->getMantenimientosTotal();
$promedioLlantas = $llantas->getMediaLlantasTotal();

?>
	<!-- pageContent -->
	<section class="full-width pageContent">
		<section class="full-width text-center" style="padding: 40px 0;">
			<h3 class="text-center tittles">DATOS DE INTERÉS</h3>
			<!-- Tiles -->
			<article class="full-width tile">
				<div class="tile-text">
					<span class="text-condensedLight">
						<?php echo $importeTotal . ' €' ?><br>
						<small>Total Ingresos</small>
					</span>
				</div>
				<i class="zmdi zmdi-account tile-icon"></i>
			</article>
			<article class="full-width tile">
				<div class="tile-text">
					<span class="text-condensedLight">
						<?php echo $numeroLlantas; ?><br>
						<small>Llantas facturadas</small>
					</span>
				</div>
				<i class="zmdi zmdi-accounts tile-icon"></i>
			</article>
			<article class="full-width tile">
				<div class="tile-text">
					<span class="text-condensedLight">
					<?php echo $numeroLlantasSin; ?><br>
						<small>Llantas sin facturar</small>
					</span>
				</div>
				<i class="zmdi zmdi-truck tile-icon"></i>
			</article>
						<article class="full-width tile">
				<div class="tile-text">
					<span class="text-condensedLight">
					<?php echo $promedioLlantas; ?><br>
						<small>Días que se tarda en completar una llanta</small>
					</span>
				</div>
				<i class="zmdi zmdi-truck tile-icon"></i>
			</article>
			<?php if($idRol == 5) { ?>
			<article class="full-width tile">
				<div class="tile-text">
					<span class="text-condensedLight">
						<?php echo $maquinariaTotal; ?><br>
						<small>Número maquinarias adquiridas</small>
					</span>
				</div>
				<i class="zmdi zmdi-label tile-icon"></i>
			</article>
			<article class="full-width tile">
				<div class="tile-text">
					<span class="text-condensedLight">
						<?php echo $totalCosteCorrectivo . ' €';  ?><br>
						<small>Coste mantenimientos correctivos</small>
					</span>
				</div>
				<i class="zmdi zmdi-washing-machine tile-icon"></i>
			</article>
			<article class="full-width tile">
				<div class="tile-text">
					<span class="text-condensedLight">
						<?php echo $totalCostePreventivo . ' €'; ?><br>
						<small>Coste mantenimientos preventivos</small>
					</span>
				</div>
				<i class="zmdi zmdi-shopping-cart tile-icon"></i>
			</article>
			<article class="full-width tile">
				<div class="tile-text">
					<span class="text-condensedLight">
						<?php echo $totalMantenimientos; ?><br>
						<small>Total mantenimientos realizados</small>
					</span>
				</div>
				<i class="zmdi zmdi-shopping-cart tile-icon"></i>
			</article>
		</section>
		<?php } ?>
		<!-- <section class="full-width" style="margin: 30px 0;">
			<h3 class="text-center tittles">RESPONSIVE TIMELINE</h3>

			<div id="timeline-c" class="timeline-c">
				<div class="timeline-c-box">
	                <div class="timeline-c-box-icon bg-info">
	                    <i class="zmdi zmdi-twitter"></i>
	                </div>
	                <div class="timeline-c-box-content">
	                    <h4 class="text-center text-condensedLight">Tittle timeline</h4>
	                    <p class="text-center">
	                    	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta nobis rerum iure nostrum dolor. Quo totam possimus, ex, sapiente rerum vel maxime fugiat, ipsam blanditiis veniam, suscipit labore excepturi veritatis.
	                    </p>
	                    <span class="timeline-date"><i class="zmdi zmdi-calendar-note zmdi-hc-fw"></i>05-04-2016</span>
	                </div>
	            </div>
				<div class="timeline-c-box">
	                <div class="timeline-c-box-icon bg-success">
	                    <i class="zmdi zmdi-whatsapp"></i>
	                </div>
	                <div class="timeline-c-box-content">
	                    <h4 class="text-center text-condensedLight">Tittle timeline</h4>
	                    <p class="text-center">
	                    	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta nobis rerum iure nostrum dolor. Quo totam possimus, ex, sapiente rerum vel maxime fugiat, ipsam blanditiis veniam, suscipit labore excepturi veritatis.
	                    </p>
	                    <span class="timeline-date"><i class="zmdi zmdi-calendar-note zmdi-hc-fw"></i>06-04-2016</span>
	                </div>
	            </div>
	            <div class="timeline-c-box">
	                <div class="timeline-c-box-icon bg-primary">
	                    <i class="zmdi zmdi-facebook"></i>
	                </div>
	                <div class="timeline-c-box-content">
	                    <h4 class="text-center text-condensedLight">Tittle timeline</h4>
	                    <p class="text-center">
	                    	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta nobis rerum iure nostrum dolor. Quo totam possimus, ex, sapiente rerum vel maxime fugiat, ipsam blanditiis veniam, suscipit labore excepturi veritatis.
	                    </p>
	                    <span class="timeline-date"><i class="zmdi zmdi-calendar-note zmdi-hc-fw"></i>07-04-2016</span>
	                </div>
	            </div>
	            <div class="timeline-c-box">
	                <div class="timeline-c-box-icon bg-danger">
	                    <i class="zmdi zmdi-youtube"></i>
	                </div>
	                <div class="timeline-c-box-content">
	                    <h4 class="text-center text-condensedLight">Tittle timeline</h4>
	                    <p class="text-center">
	                    	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta nobis rerum iure nostrum dolor. Quo totam possimus, ex, sapiente rerum vel maxime fugiat, ipsam blanditiis veniam, suscipit labore excepturi veritatis.
	                    </p>
	                    <span class="timeline-date"><i class="zmdi zmdi-calendar-note zmdi-hc-fw"></i>08-04-2016</span>
	                </div>
	            </div>
			</div>
		</section> -->
	</section>
</body>
</html>