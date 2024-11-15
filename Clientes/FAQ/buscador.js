const buscador = document.querySelector(".buscador-palabras");
const titulosFAQ = document.querySelectorAll(".pregunta");
const resultados = document.querySelector(".contenedor-resultados-encontrados");
const parrafoResultados = document.querySelector(".resultados-encontrados-p");
const lupaBuscador = document.querySelector(".lupa-buscador");

const detectarBúsqueda = function (key, click) {
    // key: detecta la tecla presionada
    // click: detecta si clickeo la lupa
    let encontrados = 0; // Resultados de busqueda encontrados
    resultados.classList.remove('d-none');

    titulosFAQ.forEach(e => {
        e.classList.remove('encontrado')
        if ((key === 'Enter' || click) && buscador.value) {
            // Si presiono enter o clickeo la lupa y en el buscador hay algo escrito...
            if (e.textContent.toUpperCase().includes(buscador.value.toLowerCase()) || 
            e.textContent.toUpperCase().includes(buscador.value.toUpperCase()) || 
            e.textContent.toLowerCase().includes(buscador.value.toLowerCase()) || 
            e.textContent.toLowerCase().includes(buscador.value.toUpperCase())) { 
            // si el contenido de la pregunta contiene algún caracter que tiene el buscador... (convierto los titulos y lo ingresado en el buscador en minuscula o mayusculas para tomarlos sin ser case sensitive)
                encontrados++;
                e.classList.add('encontrado'); // marco el mensaje que tenga las coincidencias
            }
        }
    })

    if (encontrados === 1) {
        parrafoResultados.textContent = `Se encontró ${encontrados} resultado`;
    } else if(encontrados > 1){
        parrafoResultados.textContent = `Se encontraron ${encontrados} resultados`;
    }else{
        parrafoResultados.textContent = `No se encontraron resultados en tu búsqueda`;
    }
}
// busco presionando "Enter"
buscador.addEventListener('keydown', function (e) {
    if (e.key === 'Enter') {
        detectarBúsqueda('Enter', false)
    }
})
// busco clickeando la lupa
lupaBuscador.addEventListener('click',function () { 
    detectarBúsqueda('',true);
})