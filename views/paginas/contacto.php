<main class="contenedor seccion">
    <h1>Contacto</h1>
        <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <source srcset="build/img/destacada3.jpg" type="image/jpg">
            <img loading="lazy" src="build/img/destacada3.jpg" alt="imagenDestacada">
        </picture>
<h2>Rellene el formulario de contacto</h2>
<form class="formulario">
    <fieldset>
        <legend>Información personal</legend>
        <label for="nombre">Nombre</label>
        <input id= "nombre" type="text" placeholder=" Nombre">

        <label for="email">E-mail</label>
        <input id= "email" type="email" placeholder="E-mail">

        <label for="telefono">Telefono</label>
        <input id= "telefono" type="tel" placeholder=" Telefono">

        <label for="mensaje">Mensaje</label>
        <textarea id="mensaje"></textarea>

    </fieldset>

    <fieldset>
        <legend>Información sobre la propiedad</legend>
        <label for="opciones">Vende o compra</label>

        <select id="opciones">
            <option value="" disabled selected >--Seleccione--</option>
            <option value="compra">Compra</option>
            <option value="vende">Vende</option>
        </select>

        <label for="precioOpresupuesto">Precio o presupuesto</label>
        <input id="precioOpresupuesto"type="number" placeholder="Tu precio o presupuesto"></input>

    </fieldset>

    <fieldset>
        <legend>Contacto</legend>
        <p>Como desea ser contactado</p>
        <div class="formaContacto">
            <label for="contactarTelefono">Teléfono</label>
            <input name="contacto" type="radio" value="telefono" id="contactarTelefono">

            <label for="contactarEmail">E-mail</label>
            <input name="contacto" type="radio" value="email" id="contactarEmail">
        </div>
        <p>Si eligió telefono elija la fecha y la hora</p>

        <label for="fecha">Fecha</label>
        <input id="fecha" type="date" >

        <label for="hora">Hora</label>
        <input id="hora" type="time" min="09:00" max="18:00" >


    </fieldset>
    <input type="submit" value="Enviar" class="boton-verde">
</form>