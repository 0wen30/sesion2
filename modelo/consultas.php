<?php
require_once __DIR__.'/conexion/conexion.php';

class Consultas extends Conexion{

    static function registrar($u,$p){
        $conexion = Conexion::iniciar();
        $sentencia = $conexion->prepare("INSERT INTO usuarios (usuario, contrasena) VALUES(:u,:p)");
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

    static function modifVisitas($u){
        $subconsulta = "SELECT visitas FROM usuarios where usuario = :u ";
        $consulta = "UPDATE usuarios SET visitas = ($subconsulta)-1 where usuario = :u;";
        $conexion = Conexion::iniciar();
        $sentencia = $conexion->prepare($consulta);
        $sentencia->bindParam('u',$u);
        $sentencia->execute();
        $sentencia->closeCursor();
        $conexion = null;
    }
    
    static function reiniciar(){
        $hoy = date("y-m-d");
        $conexion = Conexion::iniciar();
        $sentencia = $conexion->prepare("UPDATE usuarios SET visitas = 10, dia = '$hoy';");
        $sentencia->execute();
        $sentencia->closeCursor();
        $conexion = null;
    }

    static function fecha(){
        $conexion = Conexion::iniciar();
        $sentencia = $conexion->prepare("SELECT dia FROM usuarios");
        $sentencia->execute();
        $resultado = $sentencia->fetchColumn();
        $sentencia->closeCursor();
        $conexion = null;
        return $resultado;
    }

    static function numVisitas($u){
        $consulta = "SELECT visitas FROM usuarios where usuario = :u ";
        $conexion = Conexion::iniciar();
        $sentencia = $conexion->prepare($consulta);
        $sentencia->bindParam('u',$u);
        $sentencia->execute();
        $resultado = (int)$sentencia->fetchColumn();
        $sentencia->closeCursor();
        $conexion = null;
        return $resultado;
    }

}
?>