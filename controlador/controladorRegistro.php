<?php
include __DIR__.'\\..\\modelo\\consultas.php';

if(Consultas::estaRegistrado($_POST['user'])){
    echo 'El usuario ya esta registrado';
}else if($_POST['pass'] !== $_POST['confirm']){
    echo 'Las contraseñas no coinciden';
}else if($_POST['pass'] == "" || $_POST['user'] == ""){
    echo 'Llena todos los campos';
}else if(tieneespacios($_POST['user'])){
    echo 'El nombre de usuario no debe tener caracteres especiales';
}else{
    Consultas::registrar($_POST['user'],$_POST['pass']);
    echo 'Registro realizado';
}

function tieneespacios($tex){
    $esp = preg_match_all("/[\t\n\r\f\v\s?.|&-,:;=+*%]/", $tex);
    return $esp != 0;   
}
?>
