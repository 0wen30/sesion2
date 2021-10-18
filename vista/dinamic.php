<?php

session_start();

$nombreArchivo = __DIR__."\\assets\\contador.json";

if (!file_exists($nombreArchivo)) {
    touch($nombreArchivo);
}

$hoy = (int) date("Ymd");

$contenido = json_decode(file_get_contents($nombreArchivo));

$visitas = $contenido->contador;

if ($hoy > (int)$contenido->dia || $_SESSION['user'] != $contenido->usuario) {
    $visitas = 0;
}

$visitas++;

$arr = array('usuario' => $_SESSION['user'], 'contador' => $visitas, 'dia' => $hoy);

$json_obj = json_encode($arr);

file_put_contents($nombreArchivo, $json_obj);

if ($visitas < 10) {
    echo '{"resultado":"'.$_POST['url'].'","visita":"'.$visitas.'"}';
}else{
    echo '{"resultado":"#"}';
}

?>