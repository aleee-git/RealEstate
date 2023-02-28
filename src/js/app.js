// Funcion para el menu de hamburguesa
document.addEventListener('DOMContentLoaded', function () {

    eventListener();

    darkMode();
});

function darkMode () {
    const botonDark = document.querySelector('.dark-mode');

    botonDark.addEventListener('click', function(){
        document.body.classList.toggle('dark-mood');
    });
}


function eventListener () {
    const mobile = document.querySelector('.mobile-menu');

    mobile.addEventListener('click', responsive);
}

function responsive () {
    const nav = document.querySelector('.navegacion');

    // if (nav.classList.contains('mostrar')) {
    //     nav.classList.remove('mostrar');
    // } else {
    //     nav.classList.add('mostrar');
    // }
    
    nav.classList.toggle('mostrar');
}