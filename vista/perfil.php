<?php if(isset($_SESSION['user'])): ?>
<section id="body_sesion">
    <p>Bienvenido <?=$_SESSION['user']?></p>
    <a href="vista/cerrarSesion.php">Cerrar Sesion</a>
    <form action="index.php?navegar=url" method="get">
        <input type="url" name="navegar">
        <input type="submit">
    </form>
    <p><?=$intentos?></p>
<?php else:?>
    <p>que buscas aca??</p>
</section>
<?php endif; ?>

