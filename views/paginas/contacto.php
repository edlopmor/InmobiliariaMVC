<main class="contenedor seccion">
    <h1 data-cy="heading-contacto">Contacto</h1>
    <?php 
    if($mensaje){ ?>
         <p data-cy="alerta-exito" class= 'alerta exito'><?php echo $mensaje; ?></p>
    
    <?php }?>
        <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <source srcset="build/img/destacada3.jpg" type="image/jpg">
            <img loading="lazy" src="build/img/destacada3.jpg" alt="imagenDestacada">
        </picture>
<h2 data-cy="heading-formulario">Rellene el formulario de contacto</h2>
<form data-cy="formulario-contacto" class="formulario" action="/contacto" method="POST">
    <fieldset>
        <legend>Información personal</legend>
        <label for="nombre">Nombre</label>
        <input data-cy="input-nombre" id= "nombre" type="text" placeholder=" Nombre" name="contacto[nombre]"required>
        <label for="mensaje">Mensaje</label>
        <textarea data-cy="input-mensaje" id="mensaje" name="contacto[mensaje]"></textarea>

    </fieldset>

    <fieldset>
        <legend>Información sobre la propiedad</legend>
        <label for="opciones">Vende o compra</label>

        <select data-cy="input-opciones" id="opciones" name="contacto[tipo]">
            <option value="" disabled selected >--Seleccione--</option>
            <option value="compra">Compra</option>
            <option value="vende">Vende</option>
        </select>

        <label for="precioOpresupuesto">Precio o presupuesto</label>
        <input data-cy="input-presupuesto"id="precioOpresupuesto"type="number" placeholder="Tu precio o presupuesto" name="contacto[presupuesto]" required></input>

    </fieldset>

    <fieldset>
        <legend>Contacto</legend>
        <p>Como desea ser contactado</p>
        <div class="formaContacto">
            <label for="contactarTelefono">Teléfono</label>
            <input data-cy="tipoContacto" type="radio" value="telefono" id="contactarTelefono" name="contacto[tipoContacto]">

            <label for="contactarEmail">E-mail</label>
            <input data-cy="tipoContacto" type="radio" value="email" id="contactarEmail" name="contacto[tipoContacto]" >
        </div>
        <div id="contacto">

        </div>

    </fieldset>
    <input type="submit" value="Enviar" class="boton-verde">
</form>