<main class="conteneder seccion">
        <h1>Administrador de bienes raices</h1>
        <?php
        if($resultado){
            $mensaje = mostrarNotificacion( intval( $resultado) );
            if($mensaje){ ?>
                <p class="alerta exito"><?php echo s($mensaje)?></p>            
            <?php }} ?>
        
    </main>
    <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nueva propiedad</a> 
    <a href="/admin/vendedores/crear.php" class="boton boton-amarillo">Nuevo vendedor</a> 
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
                <td><img src="/public/imagenes/<?php echo $propiedad->imagen;?>" alt="Imagen-tabla" class="imagen-tabla"></td>
                <td><?php echo $propiedad->precio;?> $</td>
                <td>
                    <form method="POST" class="w-100" action="">
                        <!-- input type HIDEN -->
                        <input type="hidden" name="id" value="<?php echo $propiedad->id;?>">
                        <input type="hidden" name="tipo" value="propiedad">
                        <input type="submit" class="boton boton-rojo-block" value="Eliminar">
                    </form>
                    
                    <a class="boton boton-amarillo-block" href="/admin/propiedades/actualizar.php?id=<?php echo $propiedad->id; ?>">Actualizar</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</main>