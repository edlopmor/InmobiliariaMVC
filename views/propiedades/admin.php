<main class="conteneder seccion">
        <h1 data-cy="heading-admin">Administrador inmbobiliaria</h1><?php
        if($resultado ?? null){
            $mensaje = mostrarNotificacion( intval( $resultado) );
            if($mensaje){ ?>
                <p class="alerta exito"><?php echo s($mensaje)?></p>            
            <?php }} ?>
        
    
    <a href="/propiedades/crear" class="boton boton-verde">Nueva propiedad</a> 
    <a href="/vendedores/crear" class="boton boton-amarillo">Nuevo(a) vendedor</a> 
    
    <h2>Propiedades</h2>
        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody><!--Mostrar resultados de la consulta a base de datos-->
            <?php foreach( $propiedades as $propiedad ):?>            
                <tr>
                    <td><?php echo $propiedad->id; ?></td>
                    <td><?php echo $propiedad->titulo; ?></td>
                    <td><img src="/imagenes/<?php echo $propiedad->imagen;?>" alt="Imagen-tabla" class="imagen-tabla"></td>
                    <td><?php echo $propiedad->precio;?> $</td>
                    <td>
                        <form method="POST" class="w-100" action="/propiedades/eliminar">
                            <!-- input type HIDEN -->
                            <input type="hidden" name="id" value="<?php echo $propiedad->id;?>">
                            <input type="hidden" name="tipo" value="propiedad">
                            <input type="submit" class="boton boton-rojo-block" value="Eliminar">
                        </form>
                        
                        <a class="boton boton-amarillo-block" href="propiedades/actualizar?id=<?php echo $propiedad->id; ?>">Actualizar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <h2>Vendedores</h2>
        <table class="vendedores">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>                
                    <th>Telefono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody><!--Mostrar resultados de la consulta a base de datos-->
            <?php foreach( $vendedores as $vendedor ):?>            
                <tr>
                    <td><?php echo $vendedor->id; ?></td>
                    <td><?php echo $vendedor->nombre . " ".$vendedor->apellido; ?></td>
                    <td><?php echo $vendedor->telefono;?></td>
                    <td>
                        <form method="POST" class="w-100" action="/vendedores/eliminar">
                            <!-- input type HIDEN -->
                            <input type="hidden" name="id" value="<?php echo $vendedor->id;?>">
                            <input type="hidden" name="tipo" value="vendedor">
                            <input type="submit" class="boton boton-rojo-block" value="Eliminar">
                        </form>
                        
                        <a class="boton boton-amarillo-block" href="vendedores/actualizar?id=<?php echo $vendedor->id; ?>">Actualizar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
</main>