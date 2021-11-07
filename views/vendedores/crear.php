<main class="conteneder seccion">
    <h1>Registrar vendedor/a</h1>

    <?php foreach ($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error;?>
        </div>            
    <?php endforeach; ?>
    
        
    <!--GET EXPONE LOS DATOS -POST LOS OCULTA -->
    <form class="formulario" method="POST" action="/vendedores/crear" >
    <?php include __DIR__ . '/form_vendedor.php' ?>  

    <input type="submit" value="Registrar vendedor" class="boton boton-verde">
    <a href="/admin" class="boton boton-amarillo">Volver</a>
    </form>
    
</main>