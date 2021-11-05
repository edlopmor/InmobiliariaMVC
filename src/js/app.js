
document.addEventListener('DOMContentLoaded',function() {
    eventListeners ();

    darkMode();
});

function darkMode (){
    //Entrar a las variables del sistema para ver si esta activo el modo oscuro . 
    const prefiereDarkMode = window.matchMedia('(prefers-color-scheme:dark)');
    //Comprobacion de funcionamiento 
    // console.log(prefiereDarkMode.matches);
    if(prefiereDarkMode.matches){
        document.body.classList.add('dark-mode');
        }else{
        document.body.classList.remove('dark-mode');
        }
    prefiereDarkMode.addEventListener('change',function() {
        if(prefiereDarkMode.matches){
            document.body.classList.add('dark-mode');
        }else{
            document.body.classList.remove('dark-mode');
        }
    });

    const botonDarkMode = document.querySelector('.dark-mode-boton');
    botonDarkMode.addEventListener('click',function () {
        document.body.classList.toggle('dark-mode');
    });

}
function eventListeners(){
    const mobileMenu = document.querySelector('.mobile-menu');

    mobileMenu.addEventListener('click',navegacionResponsive);
    
}

function navegacionResponsive(){
    const navegacion = document.querySelector('.navegacion');

    navegacion.classList.toggle('mostrar');
}


