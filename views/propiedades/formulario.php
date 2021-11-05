<fieldset>
                <legend>Información general</legend>

                <label for="tituloPropiedad">titulo</label>
                <input type="text" 
                    id="tituloPropiedad"
                    name="propiedad[titulo]" 
                    placeholder="Titulo propiedad" 
                    value="<?php echo s($propiedad->titulo) ;?>">

                <label for="precio">precio</label>
                <input type="number" 
                    id="precio" 
                    name="propiedad[precio]" 
                    placeholder="Precio propiedad" 
                    value="<?php echo s($propiedad->precio); ?>">

                <label for="imagen">imagen:</label>
                <input                
                type="file" 
                id="imagen"
                name="propiedad[imagen]" 
                accept="image/jpeg ,image/png"
                
                >
                <?php if(!$propiedad->imagen) {  ?>
                    <img src="/imagenes/<?php echo $propiedad->imagen ?>" class="imagen-small">
                <?php } ?>    
                <label for="description">Descripción</label>
                <textarea  id="descrition" name="propiedad[descripcion]"><?php echo s($propiedad->descripcion); ?></textarea>

            </fieldset>

            <fieldset>
                <legend>Información de la propiedad</legend>
                <label for="nhabitaciones">Número de habitaciones</label>
                <input type="number" 
                    id="nhabitaciones" 
                    placeholder="Número de habitaciones" 
                    name="propiedad[nhabitaciones]" 
                    min ="1" 
                    max="9"
                    value="<?php echo s($propiedad->nhabitaciones); ?>">
                <label for="nbaños">Número de baños</label>
                <input type="number" 
                    id="nbaños" 
                    placeholder="Número baños" 
                    name="propiedad[nbaños]" 
                    value="<?php echo s($propiedad->nbaños); ?>" 
                    min ="1" 
                    max="9">
                <label for="nplazasparking">Número de plazas de parking</label>
                <input type="number" 
                    id="nplazasparking" 
                    placeholder="Número de plazas de parking" 
                    value="<?php echo s($propiedad->nplazasparking); ?>" name="propiedad[nplazasparking]" min ="1" max="9">
            </fieldset>

            <fieldset>
                <legend>Vendedor</legend>
                <label for="vendedor">Vendedor</label>

                <select name="propiedad[idvendedor]" id="vendedor">
                <option selected value="">--Seleccione--</option>
                    <?php foreach($vendedores as $vendedor){ ?>
                        
                        <option
                        <?php echo $propiedad->idvendedor === $vendedor->id ? 'selected' : '' ?>
                        value="<?php echo s($vendedor->id); ?>" ><?php echo s($vendedor->nombre) . " " . s($vendedor->apellido); ?> </option>            
                    <?php } ?>
                </select>

            </fieldset>