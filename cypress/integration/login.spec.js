/// <reference types="cypress" />

describe('Probar la Autenticación',() =>{
    it('Prueba la autenticacion en /login',()=>{
        cy.visit('/login');

        cy.get('[data-cy="heading-login"]').should('exist');
        cy.get('[data-cy="heading-login"]').invoke('text').should('equal', 'Iniciar Sesión');
        //Comprobar que el formulario existe
        cy.get('[data-cy="formulario-login"]').should('exist');
        //Enviar el submit con los campos sin rellenar
        cy.get('[data-cy="formulario-login"]').submit();
        //Debe de existir al no haber campos rellenos
        cy.get('[data-cy="alerta-login"').should('exist');
        cy.get('[data-cy="alerta-login"').eq(0).should('have.class','error');
        cy.get('[data-cy="alerta-login"').eq(0).should('have.text','Debes escribir el email');
        cy.get('[data-cy="alerta-login"').eq(1).should('have.class','error');
        cy.get('[data-cy="alerta-login"').eq(1).should('have.text','Debes escribir la password');
        cy.wait(1000);
        
        cy.visit('/login');
        //Verificamos el valor de que el usuario exista
        cy.get('[data-cy="input-email"]').type('correo@correo.com');
        cy.get('[data-cy="input-password"]').type('123678');
        cy.get('[data-cy="formulario-login"]').submit();
        cy.get('[data-cy="alerta-login"').eq(0).should('have.class','error');
        cy.get('[data-cy="alerta-login"').eq(0).should('have.text','El usuario no existe');
        //Recargamos la pagina
        cy.visit('/login');
        //Insertamos un usuario que exista , clave erronea
        cy.get('[data-cy="input-email"]').type('corre@correo.com');
        cy.get('[data-cy="input-password"]').type('123678');
        cy.get('[data-cy="formulario-login"]').submit();
        cy.get('[data-cy="alerta-login"').eq(0).should('have.class','error');
        cy.get('[data-cy="alerta-login"').eq(0).should('have.text','El password es incorrecto');
        //Recargamos la pagina
        cy.visit('/login');
        //Insertamos usuario y contraseña correctas
        cy.get('[data-cy="input-email"]').type('corre@correo.com');
        cy.get('[data-cy="input-password"]').type('123456');
        cy.get('[data-cy="formulario-login"]').submit();
        
        
        
        

        
    })

});