<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inmobiliaria</title>

    <!--Hojas de estilo-->
    <link rel="stylesheet" href="/build/css/app.css">
</head>
<body>
    <!--El metodo isset permite comprobar si una variable existe o no -->
    <header class="header <?php echo ($inicio)  ? 'inicio' : '' ?>">
        <div class="contenedor contenido-header">
            <div class="barraNavegacion">
                <a class="logo" href="/">
                    <img src="/build/img/logo.svg" alt="LogotipoPrincipal">
                </a>
                <div class="mobile-menu">
                    <img src="/build/img/barras.svg" alt="icono menu responsive">
                </div>
                <div class="derecha">
                    <img class="dark-mode-boton" src="/build/img/dark-mode.svg" alt="Boton dark-mode">
                    <nav class="navegacion">
                        <a href="/nosotros.php">Nosotros</a>
                        <a href="/anuncios.php">Anuncios</a>
                        <a href="/blog.php">Blog</a>
                        <a href="/contacto.php">Contacto</a>
                    </nav>
                </div>       
            </div><!-- Fin BarraNavegacion-->
            <?php 
                if ($inicio){
                    echo "<h1>Venta de casas y apartamentos de lujo</h1>";
                }
            ?>
        </div>
    </header>