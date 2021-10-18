document.getElementById('ir').addEventListener('click',()=>{
    const datos = new FormData();
    datos.append("url", document.getElementById('url').value);
    fetch('vista/dinamic.php',{
        method: 'POST',
        body: datos
    })
        .then(respuesta=>respuesta.json())
        .then(respuesta=>{
            window.location = respuesta.resultado
            mostrarIntentos(respuesta.visita)
        })
});

function mostrarIntentos(num = "no puedes hacer mas intentos"){
    document.getElementById('intentos').innerText = num;
}