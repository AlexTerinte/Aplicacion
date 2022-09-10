<?php

require('assets/header.php');
require_once('persistencia/ImagenesEmpleados.php');
require_once('pojos/ImagenEmpleado.php');
require_once('persistencia/Empleados.php');
require_once('pojos/Empleado.php');


if ($rolUsuario != 'Programador') {
    echo '<script>window.location="listarLlantas.php"</script>';
}

?>

<style>
    .circular--square {
        border-top-left-radius: 50% 50%;
        border-top-right-radius: 50% 50%;
        border-bottom-right-radius: 50% 50%;
        border-bottom-left-radius: 50% 50%;
    }
    
</style>

<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/bootstrap.bundle.min.js"></script>

<section class="full-width pageContent">
    <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
        <div class="mdl-tabs__tab-bar">
            <a href="#tabListProvider" class="mdl-tabs__tab is-active">Registro de Empleados</a>
        </div>
        <div class="mdl-tabs__panel is-active" id="tabListProvider">
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset-desktop">
                    <div class="full-width panel mdl-shadow--2dp">
                        <div class="full-width panel-tittle bg-success text-center tittles">
                            Listado
                        </div>
                        <div class="full-width panel-content">
                            <form action="rrss.php" method="post">
                                <input type="text" placeholder="nombre" name="nombre">
                                <div class="mdl-textfield2 mdl-js-textfield mdl-textfield--expandable">
                                    <select class="mdl-textfield__input" name="pais">
                                        <option value="sn">Contrato</option>
                                        <option value="España">España</option>
                                        <option value="Portugal">Portugal</option>
                                    </select>
                                </div>
                                <button type="submit" name="filtrar" class="btFilt"></button>
                            </form>
                            <section class="full-width">
                                <section class="full-width text-center" style="padding: 40px 0;">
                                    <a href="infoEmpleado.php" style="color: black;">
                                        <article class="full-width tile-pers article-pers">
                                            <img src="assets/img/persona.png">
                                            <h3 style="margin-top:8%; font-weight:bold; line-height:20px;">Alex Terinte</h3>
                                            <h3 style="font-size:20px;">Dpto. Programacion</h3>
                                        </article>
                                    </a>
                                    <a href="infoEmpleado.php" style="color: black;">
                                        <article class="full-width tile-pers article-pers">
                                            <img src="assets/img/persona.png">
                                            <h3 style="margin-top:8%; font-weight:bold; line-height:20px;">Alex Terinte</h3>
                                            <h3 style="font-size:20px">Dpto. Programacion</h3>
                                        </article>
                                    </a>
                                    <a href="infoEmpleado.php" style="color: black;">
                                        <article class="full-width tile-pers article-pers">
                                            <img src="assets/img/persona.png">
                                            <h3 style="margin-top:8%; font-weight:bold; line-height:20px;">Alex Terinte</h3>
                                            <h3 style="font-size:20px">Dpto. Programacion</h3>
                                        </article>
                                    </a>
                                    <a href="infoEmpleado.php" style="color: black;">
                                        <article class="full-width tile-pers article-pers">
                                            <img src="assets/img/persona.png">
                                            <h3 style="margin-top:8%; font-weight:bold; line-height:20px;">Alex Terinte</h3>
                                            <h3 style="font-size:20px">Dpto. Programacion</h3>
                                        </article>
                                    </a>
                                    <a href="infoEmpleado.php" style="color: black;">
                                        <article class="full-width tile-pers article-pers">
                                            <img src="assets/img/persona.png">
                                            <h3 style="margin-top:8%; font-weight:bold; line-height:20px;">Alex Terinte</h3>
                                            <h3 style="font-size:20px">Dpto. Programacion</h3>
                                        </article>
                                    </a>
                                    <a href="infoEmpleado.php" style="color: black;">
                                        <article class="full-width tile-pers article-pers">
                                            <img src="assets/img/persona.png">
                                            <h3 style="margin-top:8%; font-weight:bold; line-height:20px;">Alex Terinte</h3>
                                            <h3 style="font-size:20px">Dpto. Programacion</h3>
                                        </article>
                                    </a>
                                </section>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
</body>



</html>