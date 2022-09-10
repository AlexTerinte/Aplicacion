<?php

require('assets/header.php');
require_once('persistencia/Llantas.php');
require_once('pojos/Llanta.php');

if($idUsuario == null){
    echo '<script>window.location="index.php"</script>';
}

if ($rolUsuario != 'Administrador' && $rolUsuario != 'Programador' && $rolUsuario != 'Comercial') {
    echo '<script>window.location="listarLlantas.php"</script>';
}

if (isset($_POST['filtrar'])) {
    $fechaEntrada = $_POST['fechaEntrada'];
    $fechaSalida = $_POST['fechaSalida'];
    $pais = $_POST['pais'];

    if ($fechaEntrada != null) {
        $fechaEntrada = $_POST['fechaEntrada'];
    } else {
        $fechaEntrada = null;
    }

    if ($fechaSalida != null) {
        $fechaSalida = $_POST['fechaSalida'];
    } else {
        $fechaSalida = null;
    }

    if ($pais != null) {
        $pais = $_POST['pais'];
    } else {
        $pais = null;
    }

    $llantas = Llantas::singletonLlantas();
    $filtradoLlantas = $llantas->getNumeroLlantasByFilt($fechaEntrada, $fechaSalida, $pais);

    $resultado = $filtradoLlantas;
}

?>

<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/bootstrap.bundle.min.js"></script>

<section class="full-width pageContent">

    <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
        <div class="mdl-tabs__tab-bar">
            <a href="#tabListProvider" class="mdl-tabs__tab is-active">DATOS DE LLANTAS</a>
        </div>
        <div class="mdl-tabs__panel is-active" id="tabListProvider">
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset-desktop">
                    <div class="full-width panel mdl-shadow--2dp">
                        <div class="full-width panel-tittle bg-success text-center tittles">
                            LLANTAS
                        </div>
                        <div class="full-width panel-content">
                            <form action="infoLlantas.php" method="POST">
                                <div class="mdl-textfield2 mdl-js-textfield mdl-textfield--expandable">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input class="mdl-textfield__input" type="date" id="fechaEntrada" placeholder="Fecha de entrada" name="fechaEntrada">
                                        <label class="mdl-textfield__label" for="fechaEntrada">Desde</label>
                                    </div>
                                </div>
                                <div class="mdl-textfield2 mdl-js-textfield mdl-textfield--expandable">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input class="mdl-textfield__input" type="date" id="fechaSalida" placeholder="Fecha de entrada" name="fechaSalida">
                                        <label class="mdl-textfield__label" for="fechaSalida">Hasta</label>
                                    </div>
                                </div>
                                <div class="mdl-textfield2 mdl-js-textfield mdl-textfield--expandable">
                                    <select class="mdl-textfield__input" name="pais">
                                        <option value="sn">País</option>
                                        <option value="España">España</option>
                                        <option value="Portugal">Portugal</option>
                                    </select>
                                </div>
                                <button type="submit" name="filtrar" class="btFilt"></button>
                            </form>
                            <div class="mdl-list">
                                <?php if ($resultado != null) { ?>
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input class="mdl-textfield__input" type="text" id="fechaEntrada" disabled value="Se han encontrado: <?php echo $resultado; ?> llantas">
                                    </div>
                                <?php } ?>
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