<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
require_once('pojos/Usuario.php');
require_once('persistencia/Usuarios.php');



if (isset($_POST['acceder'])) {
	$email = $_POST['email'];
	$password = $_POST['pass'];

	$passCif = hash('sha256', $password);

	$usuarios = Usuarios::singletonUsuarios();
	$usuario = $usuarios->getUsuario($email, $passCif);


	if ($usuario) {
		$passBD = $usuario[0]->getPassword();
		if ($password = $passBD) {
			$_SESSION['idUsuario'] = $usuario[0]->getIdUsuario();
			echo '<script>window.location="home.php"</script>';
		}
	} else {
		$alert = '<div style="margin-top: 15%; width:84%; border-radius: 5px;" class="alert">
				<strong>Los datos de inicio no existen, por favor, vuelva a intentarlo</strong>
			</div>';
	}
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
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

<body class="cover">
	<div class="container-login">
		<p class="text-center" style="font-size: 80px;">
			<i class="zmdi zmdi-account-circle"></i>
		</p>
		<p class="text-center text-condensedLight">Iniciar Sesión</p>
		<form action="index.php" method="post">
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<input name="email" class="mdl-textfield__input" type="email" id="email" required>
				<label class="mdl-textfield__label" for="email">Email</label>
			</div>
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<input name="pass" class="mdl-textfield__input" type="password" id="pass" required>
				<label class="mdl-textfield__label" for="pass">Contraseña</label>
			</div>
			<button name="acceder" id="SingIn" class="mdl-button mdl-js-button mdl-js-ripple-effect" style="color: #3F51B5; float:right;">
				Acceder <i class="zmdi zmdi-mail-send"></i>
			</button>
		</form>
		<?php echo $alert; ?>
	</div>
</body>

</html>