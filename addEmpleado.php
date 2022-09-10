<?php

require('assets/header.php');
require_once('persistencia/Empleados.php');
require_once('pojos/Empleado.php');
require_once('pojos/ImagenEmpleado.php');
require_once('persistencia/ImagenesEmpleados.php');

if ($rolUsuario == 'Tecnico') {
    echo '<script>window.location="listarLlantas.php"</script>';
}

$empleados = Empleados::singletonEmpleados();
$imagenes = ImagenesEmpleados::singletonImagenesEmpleados();

if (isset($_POST['enviar'])) {
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $dniCif = $_POST['dniCif'];
    $numSS = $_POST['numSS'];
    $tallaPantalon = $_POST['tallaPantalon'];
    $tallaCamiseta = $_POST['tallaCamiseta'];
    $tallaZapato = $_POST['tallaZapatos'];
    $empresa = $_POST['empresa'];
    $idCarro = 4;
    $fechaEntrada = $_POST['fechaEntrada'];
    $fechaSalida = $_POST['fechaSalida'];
    $activo = 1;

    if ($fechaSalida != null) {
        $activo = 0;
    } else {
        $activo = 1;
    }

    $uploadOk = 1;

    $folderEmpleado = "assets/img/empleados/";
    $target_dir_empleado = $folderEmpleado . basename($_FILES["fotoEmpleado"]["name"]);

    $contrato = "assets/contratos/empleados/";
    $target_dir_contrato = $contrato . basename($_FILES["contrato"]["name"]);

    if (file_exists($target_dir_empleado)) {
        $alerta = '<div class="alert">
            <strong>La imágen ya existe en la base de datos, por favor, cambie el nombre de la imágen y vuelva a intentarlo</strong>
        </div>';
        $uploadOk = 0;
    }

    if (file_exists($target_dir_contrato)) {
        $alerta = '<div class="alert">
            <strong>El contrato ya existe en la base de datos, por favor, cambie el nombre del contrato y vuelva a intentarlo</strong>
        </div>';
        $uploadOk = 0;
    }

    if (move_uploaded_file($_FILES["fotoEmpleado"]["tmp_name"], $target_dir_empleado)) {
        if (move_uploaded_file($_FILES["contrato"]["tmp_name"], $target_dir_contrato)) {
            $e = new Empleado(0, $idCarro, $target_dir_empleado, $nombre, $direccion, $telefono, $email, $dniCif, $numSS, $tallaPantalon, $tallaCamiseta, $tallaZapato, $empresa, $target_dir_contrato, $activo, $fechaEntrada, null);

            $empleado = $empleados->addUnEmpleado($e);

            var_dump($empleado);

            if ($empleado) {
                $alert = $numSS;
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
    <div class="full-width divider-menu-h"></div>
    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset-desktop">
            <div class="full-width panel mdl-shadow--2dp">
                <div class="full-width panel-tittle bg-primary text-center tittles">
                    Nuevo Empleado
                </div>
                <div class="full-width panel-content">
                    <form action="addEmpleado.php" method="post" enctype="multipart/form-data">
                        <h5 class="text-condensedLight">Datos del empleado</h5>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="text" id="nombre" required name="nombre">
                            <label class="mdl-textfield__label" for="matricula">Nombre</label>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="text" id="direccion" required name="direccion">
                            <label class="mdl-textfield__label" for="direccion">Dirección</label>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="tel" id="telefono" required name="telefono">
                            <label class="mdl-textfield__label" for="telefono">Teléfono</label>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="email" id="email" required name="email">
                            <label class="mdl-textfield__label" for="email">Email</label>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="text" id="dniCif" required name="dniCif">
                            <label class="mdl-textfield__label" for="dniCif">DNI/CIF</label>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="text" id="numSS" required name="numSS">
                            <label class="mdl-textfield__label" for="numSS">Número de la Seguridad Social</label>

                        </div>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="text" id="tallaPantalon" required name="tallaPantalon">
                            <label class="mdl-textfield__label" for="tallaPantalon">Talla de pantalón</label>

                        </div>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="text" id="tallaCamiseta" required name="tallaCamiseta">
                            <label class="mdl-textfield__label" for="tallaCamiseta">Talla de camiseta</label>

                        </div>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="text" id="tallaZapatos" required name="tallaZapatos">
                            <label class="mdl-textfield__label" for="tallaZapatos">Talla de zapatos</label>

                        </div>

                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <select class="mdl-textfield__input" required name="empresa" id="empresa">
                                <option value="Atiliano y Antonio">Atiliano y Antonio</option>
                                <option value="Automecatrónica">Automecatrónica</option>
                            </select>
                            <label class="mdl-textfield__label" for="empresa">Empresa</label>

                        </div>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="date" id="fechaEntrada" required placeholder="Fecha de contratación" name="fechaEntrada">
                            <label class="mdl-textfield__label" for="fechaEntrada">Fecha de contratación</label>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="date" id="fechaSalida" placeholder="Fecha de fin contratación" name="fechaSalida">
                            <label class="mdl-textfield__label" for="fechaEntrada">Fecha de salida</label>
                        </div>
                        <div class="custom-input-file col-md-6 col-sm-6 col-xs-6">
                            <input type="file" name="fotoEmpleado" accept="image/png, image/jpeg, image/jpg" class="input-file" value="">
                            Subir foto
                        </div>
                        <div class="custom-input-file col-md-6 col-sm-6 col-xs-6">
                            <input type="file" name="contrato" accept="application/pdf,application/vnd.ms-excel" class="input-file" value="">
                            Subir contrato
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