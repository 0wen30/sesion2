<body id='body_login'>
    <div id='contenedor_login' class="contenedor">
        <div class="contenedor_item"><p class="tit">Login</p></div>
        <input type="text" placeholder="Nombre de Usuario" class="contenedor_item" id="usuario">
        <input type="password" placeholder='Contraseña' onfocus="this.placeholder=''" 
               onblur="this.placeholder='Contraseña'" class="contenedor_item" id="clave">
        <button id="entrar" class="contenedor_item">Ingresar</button>
        <div class="contenedor_enlace contenedor_item"><p id="enlaceRegistro" class="enlace">Registrarse</p></div>
    </div>
    <div id='contenedor_registro' class="contenedor">
        <div class="contenedor_item"><p class="tit">Registro</p></div>
        <input type="text" placeholder="Nombre de Usuario" class="contenedor_item" id="usuarior">
        <input type="password" placeholder='Contraseña' onfocus="this.placeholder=''" 
            onblur="this.placeholder='Contraseña'" class="contenedor_item" id="clave1">
        <input type="password" placeholder='Comfirmar Contraseña' onfocus="this.placeholder=''" 
            onblur="this.placeholder='Comfirmar Contraseña'" class="contenedor_item" id="clave2">
        <button id="registrar" class="contenedor_item">Registrar</button>
        <div class="contenedor_enlace contenedor_item"><p id="enlaceLogin" class="enlace">Login</p></div>
    </div>
    <script src="vista/assets/login.js"></script>
</body>