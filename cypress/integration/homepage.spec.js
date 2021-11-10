/// <reference types="cypress" />
describe('Carga la pagina principal', ()=> {
    it ('Prueba al header de la pagina principal',() =>{
        cy.visit('/')
        //Verificar que el elemento exista
        cy.get('[data-cy="heading-sitio"]').should('exist');
        
        cy.get('[data-cy="heading-sitio"]').invoke('text').should('equal','Venta de casas y apartamentos de lujo');
        
        
    });

    it ('Prueba el bloque de los iconos principales', ()=> {
        
        cy.get('[data-cy="heading-nosotros"]').should('exist');
        //Verificar que las etiquetas html sean las adecuadas
        cy.get('[data-cy="heading-nosotros"]').should('have.prop', 'tagName').should('equal','H2');

        //Selecciona los iconos 
        cy.get('[data-cy="iconos-nosotros"]').should('exist');
        //Comprueba el numero de iconos que se muestran
        cy.get('[data-cy="iconos-nosotros"]').find('.icono').should('have.length',3);
        cy.get('[data-cy="iconos-nosotros"]').find('.icono').should('not.have.length',4);
    })

    it ('Prueba la seccion de propiedades', ()=>{
        cy.get('[data-cy="heading-propiedades"]').should('exist');
        //Verifico que las etiquetas sean las correctas
        cy.get('[data-cy="heading-propiedades"]').should('have.prop', 'tagName').should('equal','H2');
        
        //Probar la cantidad de propiedades que se muestran en la clase principal, deben de ser 3.
        cy.get('[data-cy="anuncio"]').should('have.length',3);
        cy.get('[data-cy="anuncio"]').should('not.have.length',4);

        //Probar el enlace de la propiedad.
        //Probar la clase del enlace 
        cy.get('[data-cy="enlace-propiedad"]').should('have.class','boton-amarillo-block');
        cy.get('[data-cy="enlace-propiedad"]').should('not.have.class','boton-amarillo');
        //Comprobar el contenido del boton
        cy.get('[data-cy="enlace-propiedad"]').first().invoke('text').should('equal','Ver propiedad');

        //Probar el enlace a una propiedad
        cy.get('[data-cy="enlace-propiedad"]').first().click();
        cy.get('[data-cy="titulo-propiedad"]').should('exist');
        cy.wait(1000);
        cy.go('back');
        
    })

    it ('Prueba el routing a todas las propiedades', ()=>{
        cy.get('[data-cy="todas-propiedades"]').should('exist');
        cy.get('[data-cy="todas-propiedades"]').should('have.class', 'boton-verde');
        //Si la ruta es correcta
        cy.get('[data-cy="todas-propiedades"]').invoke('attr', 'href').should('equal', '/propiedades');

        cy.get('[data-cy="todas-propiedades"]').click();
        cy.get('[data-cy="heading-propiedades"]').should('exist');

        cy.wait(1000);
        cy.go('back');
    })

    it ('Prueba bloque contactos', ()=>{
        cy.get('[data-cy="imagen-contacto"]').should('exist');
        cy.get('[data-cy="imagen-contacto"]').find('h2').invoke('text').should('equal','Encuentra la casa de tus sueños');
        cy.get('[data-cy="imagen-contacto"]').find('p').invoke('text').should('equal','Rellena el formulario de contacto y un asesor se pondra en contacto contigo');

        cy.get('[data-cy="imagen-contacto"]').find('a').invoke('attr', 'href')
            .then (href => {
                cy.visit(href)
            });
        cy.get('[data-cy="heading-contacto"]').should('exist');

        cy.wait(1000);
        cy.visit('/');
    });

    it ('Pruebla bloque blog y testimonial pagina principal', ()=>{
        cy.get('[data-cy="blog"]').should('exist');
        cy.get('[data-cy="blog"]').find('h3').invoke('text').should('equal','Nuestro blog');
        cy.get('[data-cy="blog"]').find('img').should('have.length',2)
        
        cy.get('[data-cy="testimoniales"]').should('exist');
        cy.get('[data-cy="testimoniales"]').find('h3').invoke('text').should('equal','Testimoniales');
    });
    
   
});