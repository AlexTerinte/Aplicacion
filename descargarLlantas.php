<?php
session_start();
?>
<?php
$id = $_GET['idUsuario'];
if (isset($_SESSION['idUsuario']) and $id != null) {
    header("Content-Type: application/vnd.ms-excel; charset=UTF-8");
    header("Content-Disposition: attachment; filename=historial.xls");
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Cache-Control: private", false);
?>
    <!DOCTYPE html>
    <html class="no-js">

    <head>
        <meta charset="UTF-8">
        <style>
            table {
                font-family: 'Cairo', sans-serif;
                font-size: 10px;
            }

            .celda {
                text-align: center;
                vertical-align: middle;
                height: 30px;
                background-color: white;
            }

            .celda2 {
                text-align: center;
                vertical-align: middle;
                height: 30px;
                background-color: #F2F2F2;
            }
        </style>

    </head>



    <body>
        <table>
            <tr>
                <th style="background-color: #11496E;         height: 40px;background-color: #11496E; color: white;">ID</th>
                <th style="background-color: #11496E;         height: 40px;background-color: #11496E; color: white;">Matrícula</th>
                <th style="background-color: #11496E;         height: 40px;background-color: #11496E; color: white;">Entrada</th>
                <th style="background-color: #11496E;         height: 40px;background-color: #11496E; color: white;">Hora de inicio</th>
                <th style="background-color: #11496E;         height: 40px;background-color: #11496E; color: white;">Cliente</th>
                <th style="background-color: #11496E;         height: 40px;background-color: #11496E; color: white;">Uds.</th>
                <th style="background-color: #11496E;         height: 40px;background-color: #11496E; color: white;">Precio</th>
                <th style="background-color: #11496E;         height: 40px;background-color: #11496E; color: white;">Operación</th>
                <th style="background-color: #11496E;         height: 40px;background-color: #11496E; color: white;">Finalización</th>
                <th style="background-color: #11496E;         height: 40px;background-color: #11496E; color: white;">Hora de fin</th>
                <th style="background-color: #11496E;         height: 40px;background-color: #11496E; color: white;">Vehículo</th>
                <th style="background-color: #11496E;         height: 40px;background-color: #11496E; color: white;">Daño</th>
                <th style="background-color: #11496E;         height: 40px;background-color: #11496E; color: white;">Estado</th>
                <th style="background-color: #11496E;         height: 40px;background-color: #11496E; color: white;">Transportista</th>
                <th style="background-color: #11496E;         height: 40px;background-color: #11496E; color: white;">Origen</th>
                <th style="background-color: #11496E;         height: 40px;background-color: #11496E; color: white;">PVP</th>
                <th style="background-color: #11496E;         height: 40px;background-color: #11496E; color: white;">Facturado</th>
            </tr>


            <?php

            require_once('conexion/conexion.php');
            require_once('persistencia/Llantas.php');
            require_once('pojos/Llanta.php');



            $tLlantas = Llantas::singletonLlantas();

            $llanta = $tLlantas->getLlantasTodos();

            foreach ($llanta as $particulares => $clientes) { ?>

                <?php
                if ($clientes->getId() % 2 == 0) {
                ?>
                    <tr>
                        <td class="celda"><?php echo $clientes->getId() ?></td>
                        <td class="celda" style="width: 65px"><?php echo $clientes->getMatricula() ?></td>
                        <td class="celda" style="width: 65px"><?php echo $clientes->getFechaInicio() ?></td>
                        <td class="celda" style="width: 65px"><?php echo $clientes->getHoraInicio() ?></td>
                        <td class="celda" style="width: 55px"><?php echo $clientes->getEmpresa() ?></td>
                        <td class="celda" style="width: 33px"><?php echo $clientes->getUnidades() ?></td>
                        <td class="celda" style="width: 44px"><?php echo $clientes->getPrecio() . "€" ?></td>
                        <td class="celda" style="width: 67px"><?php echo $clientes->getOperacion() ?></td>
                        <?php if ($clientes->getFechaFin() != null) { ?>
                            <td class="celda" style="width: 74px"><?php echo $clientes->getFechaFin() ?></td>
                        <?php } else { ?>
                            <td class="celda" style="width: 74px">En proceso</td>
                        <?php } ?>
                        <?php if ($clientes->getHoraFin() != null) { ?>
                            <td class="celda" style="width: 65px"><?php echo $clientes->getHoraFin() ?></td>
                        <?php } else { ?>
                            <td class="celda" style="width: 65px">En proceso</td>
                        <?php } ?>
                        <td class="celda" style="width: 58px"><?php echo $clientes->getTipoVehiculo() ?></td>
                        <td class="celda" style="width: 37px"><?php echo $clientes->getTipoDmg() ?></td>
                        <td class="celda" style="width: 69px"><?php echo $clientes->getEstado(); ?></td>
                        <td class="celda" style="width: 87px"><?php echo $clientes->getTransportista() ?></td>
                        <td class="celda" style="width: 47px"><?php echo $clientes->getProveniencia() ?></td>
                        <td class="celda" style="width: 57px"><?php echo $clientes->getImporteTotal() . "€" ?></td>
                        <td class="celda" style="width: 65px"><?php echo $clientes->getFacturado() ?></td>
                    </tr>
                <?php
                } else {
                ?>
                    <tr>
                        <td class="celda2"><?php echo $clientes->getId() ?></td>
                        <td class="celda2" style="width: 65px"><?php echo $clientes->getMatricula() ?></td>
                        <td class="celda2" style="width: 65px"><?php echo $clientes->getFechaInicio() ?></td>
                        <td class="celda2" style="width: 65px"><?php echo $clientes->getHoraInicio() ?></td>
                        <td class="celda2" style="width: 55px"><?php echo $clientes->getEmpresa() ?></td>
                        <td class="celda2" style="width: 33px"><?php echo $clientes->getUnidades() ?></td>
                        <td class="celda2" style="width: 44px"><?php echo $clientes->getPrecio() . "€" ?></td>
                        <td class="celda2" style="width: 67px"><?php echo $clientes->getOperacion() ?></td>
                        <?php if ($clientes->getFechaFin() != null) { ?>
                            <td class="celda2" style="width: 74px"><?php echo $clientes->getFechaFin() ?></td>
                        <?php } else { ?>
                            <td class="celda2" style="width: 74px">En proceso</td>
                        <?php } ?>
                        <?php if ($clientes->getHoraFin() != null) { ?>
                            <td class="celda2" style="width: 65px"><?php echo $clientes->getHoraFin() ?></td>
                        <?php } else { ?>
                            <td class="celda2" style="width: 65px">En proceso</td>
                        <?php } ?>
                        <td class="celda2" style="width: 58px"><?php echo $clientes->getTipoVehiculo() ?></td>
                        <td class="celda2" style="width: 37px"><?php echo $clientes->getTipoDmg() ?></td>
                        <td class="celda2" style="width: 69px"><?php echo $clientes->getEstado(); ?></td>
                        <td class="celda2" style="width: 87px"><?php echo $clientes->getTransportista() ?></td>
                        <td class="celda2" style="width: 47px"><?php echo $clientes->getProveniencia() ?></td>
                        <td class="celda2" style="width: 57px"><?php echo $clientes->getImporteTotal() . "€" ?></td>
                        <td class="celda2" style="width: 65px"><?php echo $clientes->getFacturado() ?></td>
                    </tr>
                <?php
                }
                ?>
            <?php } ?>
        </table>
    </body>

    </html>
<?php } else {
    echo '<script>window.location="file403.php"</script>';
} ?>