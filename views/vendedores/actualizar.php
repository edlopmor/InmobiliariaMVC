<main class="conteneder seccion">
    <h1>Actualizar vendedor/a</h1>
    <a href="/admin" class="boton boton-amarillo">Volver</a>
    <?php foreach ($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error;?>
        </div>            
    <?php endforeach; ?>
       
    <form class="formulario" method="POST">
        <?php include __DIR__ . '/form_vendedor.php' ?>

        <input type="submit" value="Guardar cambios" class="boton boton-verde">
        
    </form>
        
</main>
