<main class="contenedor seccion">
    <h1>Mas sobre nosotros</h1>
    <?php include 'iconos.php'; ?>
</main>
    <section class="seccion contenedor">
        <h2>Casas y apartamentos en venta</h2>
        <?php
            //Creamos una variable para mostrar el limite de propiedades que queremos ver. 
            $limiteVisible = 3;  
            include 'listado.php';
        ?>  
        <div class="alinear-derecha">
            <a href="/propiedades" class="boton-verde">Ver todas</a>
        </div>
    </section>

    <section class="imagen-contacto">
        <h2>Encuentra la casa de tus sueños</h2>
        <p>Rellena el formulario de contacto y un asesor se pondra en contacto contigo</p>
        <a href="contacto.php" class="boton-amarillo">Contáctanos</a>        
    </section>

    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestro blog</h3> 
            <article class= "entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="image/webp">
                        <source srcset="build/img/blog1.jpg" type="image/jpg">
                        <img loading="lazy" src="/build/img/blog1.jpg" alt="Texto entrada blog">
                    </picture>
                </div>
                <div class="texto-entrada" >
                    <a href="entrada.php">
                        <h4>Terraza en el techo de tu casa</h4>
                        <p class="informacion-meta">Escrito el : <span>20/10/2021</span>por:<span>Admin</span></p>
                        <p>Consejos para crear una terraza en el techo de tu casa con los mejores materiales</p>
                    </a>
                </div>
            </article> 
            <article class= "entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog2.webp" type="image/webp">
                        <source srcset="build/img/blog2.jpg" type="image/jpg">
                        <img loading="lazy" src="/build/img/blog2.jpg" alt="Texto entrada blog">
                    </picture>
                </div>
                <div class="texto-entrada" >
                    <a href="entrada.php">
                        <h4>Guía para decoración de tu hogar</h4>
                        <p class="informacion-meta">Escrito el : <span>20/10/2021</span>por:<span>Admin</span></p>
                        <p>consejos para decorar tu casa,aprende a combinar muebles y colores para darle vida a tu espeacio.</p>
                    </a>
                </div>
            </article>                 
        </section>
        <section class="testimoniales">
            <h3>Testimoniales</h3>
            <div class="testimonial">
                <blockquote>
                    El personal se comportó de una excelente forma, muy buena atención y la casa que me ofrecierón cumplio con todas mis expectativas. 
                </blockquote>
                <p>-Edgar López</p>
            </div>
        </section>
    </div>