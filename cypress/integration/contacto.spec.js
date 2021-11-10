/// <reference types="cypress" />

describe('Prueba el formulario de contacto', ()=> {
    it('Prueba la página de contacto y el envio de mails', ()=>{
        cy.visit('/contacto');

        cy.get('[data-cy="heading-contacto"]').should('exist');
        cy.get('[data-cy="heading-contacto"]').invoke('text').should('not.equal', 'Formulario contacto');

        cy.get('[data-cy="heading-formulario"]').invoke('text').should('equal','Rellene el formulario de contacto');
        cy.get('[data-cy="formulario-contacto"]').should('exist');
    })

    it('LLenar los campos del formulario', ()=>{
        cy.get('[data-cy="input-nombre"]').type('Edgar');
        cy.get('[data-cy="input-mensaje"]').type('Mensaje para comprar o vender una casa');
        //Probando un select
        cy.get('[data-cy="input-opciones"]').select('Compra');
        cy.get('[data-cy="input-presupuesto"]').type('100000');
        //Probamos la opcion contacto por telefono
        cy.get('[data-cy="tipoContacto"]').eq(0).check();
        cy.get('[data-cy="input-telefono').type('123456789');
        cy.get('[data-cy="input-fecha').type('2021-12-22');
        cy.get('[data-cy="input-hora').type('13:30');
        cy.get('[data-cy="formulario-contacto"]').submit();
        cy.get('[data-cy="alerta-exito"]').invoke('text').should('equal','Mensaje enviado correctamente');

        //Comprobar que hay multiples clases
        cy.get('[data-cy="alerta-exito"]').should('have.class','alerta').and('have.class','exito').and('not.have.class','error');
        

        cy.wait(3000);
        //Probamos la ocpion contacto por mail
        cy.get('[data-cy="tipoContacto"]').eq(1).check();
        cy.get('[data-cy="input-email').type('edlopmor@hotmail.es');
        cy.get('[data-cy="formulario-contacto"]').submit();

        cy.get('[data-cy="alerta-exito"]').should('exist');
        cy.get('[data-cy="alerta-exito"]').invoke('text').should('equal','Mensaje enviado correctamente');

    })
})