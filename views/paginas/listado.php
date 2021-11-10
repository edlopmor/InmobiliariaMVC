<div class="contenedor-anuncios">
    <?php foreach($propiedades as $propiedad): ?>                             
        <div class="anuncio" data-cy="anuncio">
            <picture>                    
                <img loading="lazy" src="/imagenes/<?php echo $propiedad->imagen; ?>" alt="ImagenAnuncio">
            </picture>
            <div class="contenido-anuncio">
                <h3><?php echo $propiedad->titulo; ?></h3>
                <p><?php echo $propiedad->descripcion; ?></p>
                <p class="precio">$<?php echo $propiedad->precio; ?></p>

                <ul class="iconos-caracteristicas">
                    <li>
                        <img class="icono" src="build/img/icono_wc.svg" alt="icono_wc">
                        <p><?php echo $propiedad->nbaños; ?></p>
                    </li>
                    <li>
                        <img class="icono" src="build/img/icono_estacionamiento.svg" alt="icono_estacionamiento">
                        <p><?php echo $propiedad->nplazasparking; ?></p>
                    </li>
                    <li>
                        <img class="icono" src="build/img/icono_dormitorio.svg" alt="icono_dormitorio">
                        <p><?php echo $propiedad->nhabitaciones; ?></p>
                    </li>
                </ul>
                <a data-cy="enlace-propiedad" href="/propiedad?id=<?php echo $propiedad->id; ?>" class="boton-amarillo-block">Ver propiedad</a>
            </div><!--Fin contenido-anuncio-->
        </div><!--Fin anuncio-->
    <?php endforeach?>  
</div><!--contenedor anuncios-->