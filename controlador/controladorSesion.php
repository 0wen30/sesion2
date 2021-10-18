<?php

include __DIR__.'\\..\\vista\\crearSesion.php';
include __DIR__.'\\..\\modelo\\consultas.php';

if(!isset($_POST['user']) || !isset($_POST['pass'])){
    echo json_encode(0);
}else{
    if(Consultas::estaRegistrado($_POST['user']) && $_POST['pass'] == Consultas::comprobar($_POST['user'])){
        $_SESSION['user'] = $_POST['user'];
        echo json_encode(1);
    }else{
        echo json_encode(0);
    }
}

?>