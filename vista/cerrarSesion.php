<?php
include __DIR__."\\crearSesion.php";
session_destroy();
header("location:__DIR__\\..\\..\\index.php");
?>