const containerContent = document.querySelectorAll(".faq");
const despliegueContent = document.querySelectorAll(".fa-caret-down");
const descripcionPregunta = document.querySelectorAll(".desc-pregunta");
const containerFAQ = document.querySelectorAll(".faq");

containerContent.forEach((e, i) => {
    e.addEventListener('click', function () {
        // quito el cartel que me indica la cantidad elementos encontrados
        resultados.classList.add('d-none');
        // desmarco el contenedor que clickeo (si es que fue encontrado)
        titulosFAQ[i].classList.remove('encontrado');

        if (despliegueContent[i].classList.contains('fa-caret-down')) {
            // selecciono el índice del contenedor clickeado y le aplico estilo a la flecha
            despliegueContent[i].classList.remove('desc-up')
            containerFAQ[i].classList.add('openFAQ');
            despliegueContent[i].classList.add('desc-down')
            despliegueContent[i].classList.replace('fa-caret-down', 'fa-caret-up');
            descripcionPregunta[i].classList.replace('d-none', 'd-flex');
            descripcionPregunta[i].classList.add('justify-content-start','flex-column');
        } else {
            containerFAQ[i].classList.remove('openFAQ');
            despliegueContent[i].classList.remove('desc-down')
            despliegueContent[i].classList.add('desc-up')
            despliegueContent[i].classList.replace('fa-caret-up', 'fa-caret-down');
            descripcionPregunta[i].classList.replace('d-flex', 'd-none');
        }
    })
})