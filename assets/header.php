<?php

session_start();

require_once('pojos/Usuario.php');
require_once('persistencia/Usuarios.php');
require_once('pojos/Rol.php');
require_once('persistencia/Roles.php');

$idUsuario = $_SESSION['idUsuario'];

if ($idUsuario == null) {
	echo '<script>window.location="index.php"</script>';
}

$usuarios = Usuarios::singletonUsuarios();
$roles = Roles::singletonRoles();

$usuario = $usuarios->getUsuarioById($idUsuario);

$idRol = $nombreUsuario = $usuario[0]->getIdRol();
$rol = $roles->getRolById($idRol);

$nombreUsuario = $usuario[0]->getNombreCompleto();
$rolUsuario = $rol[0]->getNombre();
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/sweetalert2.css">
	<link rel="stylesheet" href="css/material.min.css">
	<link rel="stylesheet" href="css/material-design-iconic-font.min.css">
	<link rel="stylesheet" href="css/jquery.mCustomScrollbar.css">
	<link rel="stylesheet" href="css/main.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script>
		window.jQuery || document.write('<script src="js/jquery-1.11.2.min.js"><\/script>')
	</script>
	<script src="js/material.min.js"></script>
	<script src="js/sweetalert2.min.js"></script>
	<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="js/main.js"></script>

</head>

<body>
	<!-- Notifications area -->
	<!-- 	<section class="full-width container-notifications">
		<div class="full-width container-notifications-bg btn-Notification"></div>
	    <section class="NotificationArea">
	        <div class="full-width text-center NotificationArea-title tittles">Notifications <i class="zmdi zmdi-close btn-Notification"></i></div>
	        <a href="#" class="Notification" id="notifation-unread-1">
	            <div class="Notification-icon"><i class="zmdi zmdi-accounts-alt bg-info"></i></div>
	            <div class="Notification-text">
	                <p>
	                    <i class="zmdi zmdi-circle"></i>
	                    <strong>New User Registration</strong> 
	                    <br>
	                    <small>Just Now</small>
	                </p>
	            </div>
	        	<div class="mdl-tooltip mdl-tooltip--left" for="notifation-unread-1">Notification as UnRead</div> 
	        </a>
	        <a href="#" class="Notification" id="notifation-read-1">
	            <div class="Notification-icon"><i class="zmdi zmdi-cloud-download bg-primary"></i></div>
	            <div class="Notification-text">
	                <p>
	                    <i class="zmdi zmdi-circle-o"></i>
	                    <strong>New Updates</strong> 
	                    <br>
	                    <small>30 Mins Ago</small>
	                </p>
	            </div>
	            <div class="mdl-tooltip mdl-tooltip--left" for="notifation-read-1">Notification as Read</div>
	        </a>
	        <a href="#" class="Notification" id="notifation-unread-2">
	            <div class="Notification-icon"><i class="zmdi zmdi-upload bg-success"></i></div>
	            <div class="Notification-text">
	                <p>
	                    <i class="zmdi zmdi-circle"></i>
	                    <strong>Archive uploaded</strong> 
	                    <br>
	                    <small>31 Mins Ago</small>
	                </p>
	            </div>
	            <div class="mdl-tooltip mdl-tooltip--left" for="notifation-unread-2">Notification as UnRead</div>
	        </a> 
	        <a href="#" class="Notification" id="notifation-read-2">
	            <div class="Notification-icon"><i class="zmdi zmdi-mail-send bg-danger"></i></div>
	            <div class="Notification-text">
	                <p>
	                    <i class="zmdi zmdi-circle-o"></i>
	                    <strong>New Mail</strong> 
	                    <br>
	                    <small>37 Mins Ago</small>
	                </p>
	            </div>
	            <div class="mdl-tooltip mdl-tooltip--left" for="notifation-read-2">Notification as Read</div>
	        </a>
	        <a href="#" class="Notification" id="notifation-read-3">
	            <div class="Notification-icon"><i class="zmdi zmdi-folder bg-primary"></i></div>
	            <div class="Notification-text">
	                <p>
	                    <i class="zmdi zmdi-circle-o"></i>
	                    <strong>Folder delete</strong> 
	                    <br>
	                    <small>1 hours Ago</small>
	                </p>
	            </div>
	            <div class="mdl-tooltip mdl-tooltip--left" for="notifation-read-3">Notification as Read</div>
	        </a>  
	    </section>
	</section> -->
	<!-- navBar -->
	<div class="full-width navBar">
		<div class="full-width navBar-options">
			<i class="zmdi zmdi-more-vert btn-menu" id="btn-menu"></i>
			<div class="mdl-tooltip" for="btn-menu">Menu</div>
			<nav class="navBar-options-list">
				<ul class="list-unstyle">
					<!-- 					<li class="btn-Notification" id="notifications">
						<i class="zmdi zmdi-notifications"></i>
						 <i class="zmdi zmdi-notifications-active btn-Notification" id="notifications"></i> 
						<div class="mdl-tooltip" for="notifications">Notifications</div>
					</li> -->

					<li class="text-condensedLight noLink"><small><?php echo $nombreUsuario ?></small></li>
					<li class="btn-exit" id="btn-exit">
						<i class="zmdi zmdi-power"></i>
						<div class="mdl-tooltip" for="btn-exit"><a href="logout.php" style="text-decoration:none">LogOut</a></div>
					</li>
				</ul>
			</nav>
		</div>
	</div>
	<!-- navLateral -->
	<section class="full-width navLateral">
		<div class="full-width navLateral-bg btn-menu"></div>
		<div class="full-width navLateral-body">
			<div class="full-width navLateral-body-logo text-center tittles">
				<i class="zmdi zmdi-close btn-menu"></i> 4SolutionsGroup
			</div>
			<figure class="full-width" style="height: 77px;">
				<div class="navLateral-body-cl">
					<img src="assets/img/avatar-male.png" alt="Avatar" class="img-responsive">
				</div>
				<figcaption class="navLateral-body-cr hide-on-tablet">
					<span>
						<?php echo $nombreUsuario ?><br>
						<small><?php echo $rolUsuario ?></small>
					</span>
				</figcaption>
			</figure>
			<div class="full-width tittles navLateral-body-tittle-menu">
				<i class="zmdi zmdi-desktop-mac"></i><span class="hide-on-tablet">&nbsp; PANEL</span>
			</div>
			<nav class="full-width">
				<ul class="full-width list-unstyle menu-principal">
					<?php if($rolUsuario == 'Administrador' or $rolUsuario == 'Programador'){ ?>
					<li class="full-width">
						<a href="home.php" class="full-width" style="font-weight:bold;">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-view-dashboard" style="line-height: 45px;"></i>
							</div>
							<div class="navLateral-body-cr hide-on-tablet">
								HOME
							</div>
						</a>
					</li>
					<li class="full-width divider-menu-h"></li>
					<?php } ?>
					<li class="full-width">
						<a href="#!" class="full-width btn-subMenu" style="font-weight:bold;">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-settings" style="line-height: 45px;"></i>
							</div>
							<div class="navLateral-body-cr hide-on-tablet">
								GESTIÓN LLANTAS
							</div>
							<span class="zmdi zmdi-chevron-left"></span>
						</a>
						<ul class="full-width menu-principal sub-menu-options">
							<li class="full-width">
								<a href="listarLlantas.php" class="full-width" style="background-color: white;">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-arrow-right" style="line-height: 45px;"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
										LISTA LLANTAS
									</div>
								</a>
							</li>
							<?php if($rolUsuario != 'Tecnico') { ?>
							<li class="full-width">
								<a href="addLlanta.php" class="full-width" style="background-color: white;">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-arrow-right" style="line-height: 45px;"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
										AÑADIR LLANTA
									</div>
								</a>
							</li>
							<li class="full-width">
								<a href="infoLlantas.php" class="full-width" style="background-color: white;">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-arrow-right" style="line-height: 45px;"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
										DATOS LLANTAS
									</div>
								</a>
							</li>
							<?php } ?>
						</ul>
					</li>
					<li class="full-width divider-menu-h"></li>
					<?php if($rolUsuario == 'Programador'){ ?>
					<li class="full-width">
						<a href="#!" class="full-width btn-subMenu" style="font-weight:bold;">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-wrench" style="line-height: 45px;"></i>
							</div>
							<div class="navLateral-body-cr hide-on-tablet">
								GESTIÓN MAQUINARIA
							</div>
							<span class="zmdi zmdi-chevron-left"></span>
						</a>
						<ul class="full-width menu-principal sub-menu-options">
							<li class="full-width">
								<a href="addMaquinaria.php" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-arrow-right" style="line-height: 45px;"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
										AÑADIR MAQUINARIA
									</div>
								</a>
							</li>
							<li class="full-width">
								<a href="listarMaquinarias.php" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-arrow-right" style="line-height: 45px;"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
										LISTAR MAQUINARIAS
									</div>
								</a>
							</li>
							<li class="full-width">
								<a href="listarMantenimientos.php" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-arrow-right" style="line-height: 45px;"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
										LISTAR MANTENIMIENTOS
									</div>
								</a>
							</li>
						</ul>
					</li>
					<li class="full-width divider-menu-h"></li>
					<?php } ?>
					<!-- <li class="full-width">
						<a href="#!" class="full-width btn-subMenu">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-wrench"></i>
							</div>
							<div class="navLateral-body-cr hide-on-tablet">
								GESTIÓN MAQUINARIA INDIVIDUAL
							</div>
							<span class="zmdi zmdi-chevron-left"></span>
						</a>
						<ul class="full-width menu-principal sub-menu-options">
							<li class="full-width">
								<a href="#!" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-widgets"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
										AÑADIR ELEMENTO
									</div>
								</a>
							</li>
							<li class="full-width">
								<a href="#!" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-widgets"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
										MAQUINARIA
									</div>
								</a>
							</li>
						</ul>
					</li> -->
				</ul>
			</nav>
		</div>
	</section>