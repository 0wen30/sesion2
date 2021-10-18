<?php
require_once __DIR__.'/conexion/conexion.php';

class Consultas extends Conexion{

    static function registrar($u,$p){
        $conexion = Conexion::iniciar();
        $sentencia = $conexion->prepare("INSERT INTO usuarios VALUES(:u,:p) ");
        $sentencia->bindParam('u',$u);
        $sentencia->bindParam('p',$p);
        $sentencia->execute();
        $sentencia->closeCursor();
        $conexion = null;
    }

    static function estaRegistrado($u){
        $conexion = Conexion::iniciar();
        $sentencia = $conexion->prepare("SELECT count(*) FROM usuarios where usuario = :u ");
        $sentencia->bindParam('u',$u);
        $sentencia->execute();
        $resultado = $sentencia->fetchColumn();
        $sentencia->closeCursor();
        $conexion = null;
        return $resultado == 1;
    }

    static function comprobar($u){
        $conexion = Conexion::iniciar();
        $sentencia = $conexion->prepare("SELECT contrasena FROM usuarios where usuario = :u ");
        $sentencia->bindParam('u',$u);
        $sentencia->execute();
        $resultado = $sentencia->fetchColumn();
        $sentencia->closeCursor();
        $conexion = null;
        return $resultado;
    }

}
?>