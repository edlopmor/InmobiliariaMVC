<fieldset>
    <legend>Información general</legend>

        <label for="nombre">nombre</label>
            <input type="text" 
                    id="nombre"
                    name="vendedor[nombre]" 
                    placeholder="Nombre" 
                    value="<?php echo s($vendedor->nombre) ;?>">
        <label for="apellido">apellidos</label>
            <input type="text" 
                    id="apellidos"
                    name="vendedor[apellido]" 
                    placeholder="Apellidos" 
                    value="<?php echo s($vendedor->apellido) ;?>">
</fieldset>
<fieldset>  
    <legend>Información extra</legend>                   
        <label for="telefono">telefono</label>
            <input type="tel" 
                    id="telefono"
                    name="vendedor[telefono]" 
                    placeholder="Telefono" 
                    value="<?php echo s($vendedor->telefono) ;?>">
</fieldset>