<main class="contenedor seccion">
    <h1>Contacto</h1>
    <?php 
    if($mensaje){ ?>
         <p class= 'alerta exito'><?php echo $mensaje; ?></p>;
    
    <?php }?>
        <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <source srcset="build/img/destacada3.jpg" type="image/jpg">
            <img loading="lazy" src="build/img/destacada3.jpg" alt="imagenDestacada">
        </picture>
<h2>Rellene el formulario de contacto</h2>
<form class="formulario" action="/contacto" method="POST">
    <fieldset>
        <legend>Información personal</legend>
        <label for="nombre">Nombre</label>
        <input id= "nombre" type="text" placeholder=" Nombre" name="contacto[nombre]"required>
        <label for="mensaje">Mensaje</label>
        <textarea id="mensaje" name="contacto[mensaje]"></textarea>

    </fieldset>

    <fieldset>
        <legend>Información sobre la propiedad</legend>
        <label for="opciones">Vende o compra</label>

        <select id="opciones" name="contacto[tipo]">
            <option value="" disabled selected >--Seleccione--</option>
            <option value="compra">Compra</option>
            <option value="vende">Vende</option>
        </select>

        <label for="precioOpresupuesto">Precio o presupuesto</label>
        <input id="precioOpresupuesto"type="number" placeholder="Tu precio o presupuesto" name="contacto[presupuesto]" required></input>

    </fieldset>

    <fieldset>
        <legend>Contacto</legend>
        <p>Como desea ser contactado</p>
        <div class="formaContacto">
            <label for="contactarTelefono">Teléfono</label>
            <input type="radio" value="telefono" id="contactarTelefono" name="contacto[tipoContacto]">

            <label for="contactarEmail">E-mail</label>
            <input type="radio" value="email" id="contactarEmail" name="contacto[tipoContacto]" >
        </div>
        <div id="contacto">

        </div>

    </fieldset>
    <input type="submit" value="Enviar" class="boton-verde">
</form>