document.getElementById('miFormulario').addEventListener('submit', function() {
    const boton = document.getElementById('btn-guardar');

    boton.disabled = true;
    boton.innerText = 'Guardando...';
});