<?php

require('assets/header.php');
require_once('persistencia/Empleados.php');
require_once('pojos/Empleado.php');

$empleados = Empleados::singletonEmpleados();

$idEmpleado = $_GET['id'];

?>

<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/bootstrap.bundle.min.js"></script>

<style>
    .sizeCont {
        margin-top: 6%;
    }


    .circular--square {
        width: 60%;
        border-top-left-radius: 50% 50%;
        border-top-right-radius: 50% 50%;
        border-bottom-right-radius: 50% 50%;
        border-bottom-left-radius: 50% 50%;
        border: 5px solid mediumseagreen;
        padding: 5px;
    }

    .h5Per {
        background-color: #636363;
        color: white;
        font-weight: bold;
        text-align: center;
        padding: 10px 0px;
    }

    .infoUsuario {
        font-weight: bold;
        line-height: 40px
    }

    .margenes {
        padding-top: 4%;
        padding-bottom: 4%;
    }

    .logoCent {
        font-size: 30px;
        padding-left: 30px;
        color: #545454;
    }

    .contCent {
        display: flex;
        align-items: center;
    }

    .centrado {
        padding: 40px;
    }

    @media (max-width: 479px) {
        .centrado {
            padding: 40px;
            text-align: center;
        }

        .logoCent {
            font-size: 30px;
            padding-left: 0px;
            color: #545454;
        }

        .contCent {
            justify-content: center;
        }
    }

    @media (min-width: 480px) and (max-width: 1024px) {
        .infoUsuario {
            font-size: 15px;
        }

        .circular--square {
            width: 80%;
            border-top-left-radius: 50% 50%;
            border-top-right-radius: 50% 50%;
            border-bottom-right-radius: 50% 50%;
            border-bottom-left-radius: 50% 50%;
            border: 5px solid mediumseagreen;
            padding: 5px;
        }

        .h5Per {
            background-color: #636363;
            color: white;
            font-weight: bold;
            text-align: center;
            padding: 10px 0px;
        }

        .infoUsuario {
            font-weight: bold;
            line-height: 40px
        }

        .logoCent {
            font-size: 20px;
            padding-left: 5px;
            color: #545454;
        }

        .contCent {
            display: flex;
            align-items: center;
        }

        .centrado {
            padding: 20px;
        }

        .sizeCont {
            margin-top: 0%;
        }
    }
</style>

<section class="full-width pageContent">
    <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
        <div class="mdl-tabs__tab-bar">
            <a href="rrss.php" style="color:black;"><i class="zmdi zmdi-more-vert" style="position: absolute;left: 10px;top: 15px;"></i></a>
            <a href="#tabListProvider" class="mdl-tabs__tab is-active">Registro de empleados</a>
        </div>
        <div class="mdl-tabs__panel is-active" id="tabListProvider">
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset-desktop">
                    <div class="full-width panel mdl-shadow--2dp">
                        <div class="full-width" style="display:block;">
                            <div style="background-color: #f5f5f5;">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-4 centrado">
                                            <img src="assets/img/persona.png" class="circular--square">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="contCent sizeCont"><i class=" zmdi zmdi-smartphone-android"></i><span class="infoUsuario">&nbsp; Pepito Perez Gutierrez</span><br></div>
                                            <div class="contCent"><i class="zmdi zmdi-email"></i><span class="infoUsuario">&nbsp; Calle Pepito Perez, 2 Badajoz, 06009</span><br></div>
                                            <div class="contCent"><i class="zmdi zmdi-pin"></i><span class="infoUsuario">&nbsp; 954 456 789</span><br></div>
                                            <div class="contCent" style="padding-bottom: 20px;"><i class="zmdi zmdi-globe-alt"></i><span class="infoUsuario">&nbsp; pepitoperez@gmail.com</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 margenes">
                                    <h5 class="h5Per">Tallas</h1>
                                        <div class="contCent" style="background-color: #e5e5e5; margin-bottom: 5px;"><i class="zmdi zmdi-palette logoCent"></i><span class="infoUsuario" style="color: #545454">&nbsp; Camiseta L</span></div>
                                        <div class="contCent" style="background-color: #e5e5e5; margin-bottom: 5px;"><i class="zmdi zmdi-assignment-account logoCent"></i><span class="infoUsuario" style="color: #545454">&nbsp; Pantalón L</span></div>
                                        <div class="contCent" style="background-color: #e5e5e5;"><i class="zmdi zmdi-airline-seat-legroom-normal logoCent"></i><span class="infoUsuario" style="color: #545454">&nbsp; Zapatos 43</span></div>
                                </div>
                                <div class="col-md-9 margenes">
                                    <h5 class="h5Per">Información</h5>
                                    <div class="contCent" style="margin-bottom: 5px; line-height: 40px; border-bottom: 2px solid #e5e5e5;">DNI/CIF: X8955098W</div>
                                    <div class="contCent" style="margin-bottom: 5px; line-height: 40px; border-bottom: 2px solid #e5e5e5;">NºSS: 123456789123</div>
                                    <div class="row">
                                        <div class="col-md-6 contCent" style="line-height: 40px;"><span style="border-bottom: 2px solid #e5e5e5;">Empresa: Atianmar S.L</span></div>
                                        <div class="col-md-6 contCent" style="line-height: 40px;"><span style="border-bottom: 2px solid #e5e5e5;">Contrato: <a style="color: blue; border-bottom: 1px solid blue;">Descargar</a></span></div>
                                    </div>
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