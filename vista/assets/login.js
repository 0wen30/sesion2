let boton_log = document.getElementById('entrar');
let boton_reg = document.getElementById('registrar');
let modo_login = document.getElementById('enlaceLogin');
let modo_registro = document.getElementById('enlaceRegistro');

boton_log.addEventListener('click',()=>{
    let usuario = document.getElementById('usuario').value;
    let clave = document.getElementById('clave').value;
    if(usuario != "" && clave != "") {
        let datos = new FormData();
        datos.append('user',usuario);
        datos.append('pass',clave);
        let envio = {method:'POST',body:datos}
        fetch('controlador/controladorSesion.php',envio)
            .then(resp=>resp.json())
            .then(resp=>resp == 1 ? window.location.reload() : mensaje('revisa tus datos'))
    }else{
        mensaje('no has llenado el formulario correctamente');
    }
});

boton_reg.addEventListener('click',()=>{
    let usuario = document.getElementById('usuarior').value;
    let a = document.getElementById('clave1').value;
    let b = document.getElementById('clave2').value;
    let datos = new FormData();
    datos.append('user',usuario);
    datos.append('pass',a);
    datos.append('confirm',b);
    let envio = {method:'POST',body:datos}
    fetch('controlador/controladorRegistro.php',envio)
    .then(msj=>msj.text())
    .then(t=>mensaje(t))
});

function mensaje(texto){
    console.log(texto)
    let msj = document.createElement('div');
    msj.setAttribute('id','msj');
    msj.innerHTML = texto;
    document.body.appendChild(msj);
    setTimeout( () => {
        document.body.removeChild(msj);
    }, 1500);
    if (texto == 'Registro realizado') {
        mostrar(0)
    }
}

document.getElementById('enlaceRegistro').addEventListener('click',mostrar);

modo_login.addEventListener('click',mostrar);

function mostrar(e){
    if (e.target == modo_login || e == 0) {
        document.getElementById('contenedor_registro').style.display = 'none';
        document.getElementById('contenedor_login').style.display = 'flex';
    } else if(e.target == modo_registro){
        document.getElementById('contenedor_registro').style.display = 'flex';
        document.getElementById('contenedor_login').style.display = 'none';
    }
};