
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

    //Muestra campos condicionales
    //Cargamos en una variable bundle los metodoContacto , despues recorremos esta bundle, y le añadimos un eventlistener a cada 1 de ellos. 
    const metodoContacto = document.querySelectorAll('input[name="contacto[tipoContacto]"]');
    metodoContacto.forEach(input => {
        return input.addEventListener('click', mostrarMetodosContacto);
    });
    
}

function navegacionResponsive(){
    const navegacion = document.querySelector('.navegacion');

    navegacion.classList.toggle('mostrar');
}

function mostrarMetodosContacto(e){
    const contactoDiv = document.querySelector('#contacto');
    if (e.target.value === 'telefono'){
        contactoDiv.innerHTML = `
        <input id= "telefono" type="tel" placeholder=" Telefono" name="contacto[telefono]" >
        <p>Elija la fecha y la hora para la llamada</p>

        <label for="fecha">Fecha</label>
        <input id="fecha" type="date" name="contacto[fecha]" >

        <label for="hora">Hora</label>
        <input id="hora" type="time" min="09:00" max="18:00" name="contacto[hora]">
        `;
    }else{
        contactoDiv.innerHTML = `
        <input id= "email" type="email" placeholder="E-mail" name="contacto[email]">
        `;

    }
    
}

