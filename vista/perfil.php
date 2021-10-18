<?php if(isset($_SESSION['user'])): ?>
<body id="body_sesion">
    <p>Bienvenido <?=$_SESSION['user']?></p>
    <a href="vista/cerrarSesion.php">Cerrar Sesion</a>
    <input type="url" id="url">
    <button id="ir">click</button>
    <p id="intentos"></p>
    <script src="vista/assets/app.js"></script>
<?php else:?>
    <p>que buscas aca??</p>
</body>
<?php endif; ?>

