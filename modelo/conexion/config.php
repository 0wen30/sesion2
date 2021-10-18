<?php
    const SERVER = "localhost";
    const DB = "practicas";
    const USER = "root";
    const PASS = "";
    const UTF8 = "utf8";
    const SGBD = "mysql:host=".SERVER.";dbname=".DB.";charset=".UTF8;
    const ERRORES = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
?>