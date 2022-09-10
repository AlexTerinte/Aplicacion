<?php

    
    require 'phpqrcode/qrlib.php';

    $id = $_GET['id'];

    $dir = 'temp/';

    if(!file_exists($dir)){
        mkdir($dir);
    }

    $filename = $dir.'test.png';

    $tamanio = 10;

    $level = 'M';

    $frameSize = 3;

    $contenido = '192.168.1.211/SFI-master/maquinariaID.php?id='.$id.'';

    QRcode::png($contenido, $filename, $level, $tamanio, $frameSize);

    echo '<img src="'.$filename.'"/>'

?>