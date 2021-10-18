<?php
include 'modelo/consultas.php';
$intentos = "";

$hoy = date("y-m-d");
$date1 = str_replace('-', '/', $hoy);
$tomorrow = date('y-m-d',strtotime($date1 . "+1 days"));

$bd_dia = date("y-m-d", strtotime(Consultas::fecha()));
if ($hoy > $bd_dia) {
    Consultas::reiniciar();
}
if (isset($_GET['navegar'])) {
    Consultas::modifVisitas($_SESSION['user']);
    if (Consultas::numVisitas($_SESSION['user']) > 0) {
        $intentos = "Intentos restantes: ".Consultas::numVisitas($_SESSION['user']);
        header("location:$_GET[navegar]");
    }else{
        $intentos = "has realizado todas tus visitas";
    }
}

?>