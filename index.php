<?php 
    include_once 'includes/template/header.php';
?>

    <section class="seccion contenedor">
        
        <h2>La mejor conferencia de diseno web en espanol</h2>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia, eveniet ipsam ad incidunt, et voluptatum nobis laborum fugiat aperiam commodi iusto hic reprehenderit odio enim. At voluptate in accusantium quibusdam.</p>

    </section>

    <section class="programa">
        
        <div class="contenedor-video">
            
            <video autoplay loop poster="img/bg-talleres.jpg">
                
                <source src="video/video.mp4" type="video/mp4">
                <source src="video/video.webm" type="video/webm">
                <source src="video/video.ogv" type="video/ogg">

            </video>

        </div><!--contenedor video-->

        <?php include_once ('includes/template/programaEvent.php') ?>

    </section> <!-- programa -->

    <?php include_once ('includes/template/invitados.php') ?>

    <div class="contador parallax">
        
        <div class="contenedor">
            
            <ul class="resumen-evento clearfix">
                
                <li><p class="numero">0</p> Invitados</li>
                <li><p class="numero">0</p> Talleres</li>
                <li><p class="numero">0</p> Dias</li>
                <li><p class="numero">0</p> Conferencias</li>

            </ul>

        </div>

    </div>

    <section class="precios seccion">
        
        <h2>Precios</h2>

        <div class="contenedor">
            
            <ul class="lista-precios clearfix">
                
                <li>
                    
                    <div class="tabla-precio">
                        
                        <h3>Pase por dia</h3>
                        <p class="numero">$30</p>

                        <ul>

                            <li>Bocadillos Gratis</li>
                            <li>Tdoas las Conferencias</li>
                            <li>Todos los Talleres</li>

                        </ul>

                        <a href="#" class="button hollow">Comprar</a>

                    </div>

                </li>

                <li>
                    
                    <div class="tabla-precio">
                        
                        <h3>Todos los dia</h3>
                        <p class="numero">$50</p>

                        <ul>

                            <li>Bocadillos Gratis</li>
                            <li>Tdoas las Conferencias</li>
                            <li>Todos los Talleres</li>

                        </ul>

                        <a href="#" class="button">Comprar</a>

                    </div>

                </li>

                <li>
                    
                    <div class="tabla-precio">
                        
                        <h3>Pase por 2 diad</h3>
                        <p class="numero">$45</p>

                        <ul>

                            <li>Bocadillos Gratis</li>
                            <li>Tdoas las Conferencias</li>
                            <li>Todos los Talleres</li>

                        </ul>

                        <a href="#" class="button hollow">Comprar</a>

                    </div>

                </li>

            </ul>

        </div>

    </section>

    <div class="mapa" id="mapa"></div>

    <section class="seccion">
        
        <h2>Testimoniales</h2>

        <div class="testimoniales contenedor clearfix">

            <div class="testimonial">
                
                <blockquote>
                    
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis, rerum itaque, in dicta, fuga explicabo natus maiores odit voluptatem officiis deleniti molestias distinctio possimus sequi quo vitae. Illo, sunt, nisi.</p>

                    <footer class="info-testimonial clearfix">
                        
                        <img src="img/testimonial.jpg" alt="imagen testimonial">

                        <cite>Odwaldo Aponte Escode <span>Disenado en @prisma</span></cite>

                    </footer>

                </blockquote>

            </div>

            <div class="testimonial">
                
                <blockquote>
                    
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis, rerum itaque, in dicta, fuga explicabo natus maiores odit voluptatem officiis deleniti molestias distinctio possimus sequi quo vitae. Illo, sunt, nisi.</p>

                    <footer class="info-testimonial clearfix">
                        
                        <img src="img/testimonial.jpg" alt="imagen testimonial">

                        <cite>Odwaldo Aponte Escode <span>Disenado en @prisma</span></cite>

                    </footer>

                </blockquote>

            </div>

            <div class="testimonial">
                
                <blockquote>
                    
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis, rerum itaque, in dicta, fuga explicabo natus maiores odit voluptatem officiis deleniti molestias distinctio possimus sequi quo vitae. Illo, sunt, nisi.</p>

                    <footer class="info-testimonial clearfix">
                        
                        <img src="img/testimonial.jpg" alt="imagen testimonial">

                        <cite>Odwaldo Aponte Escode <span>Disenado en @prisma</span></cite>

                    </footer>

                </blockquote>

            </div>

        </div>


    </section>

    <div class="newsletter parallax">
        
        <div class="cotenido contenedor">
            
            <p>registrate al headnoise</p>

            <h3>headnoise</h3>

            <a href="#mc_embed_signup" class="boton_newsletter button transparente">Registro</a>

        </div>

    </div>

    <section class="seccion">
        
        <h2>Faltan</h2>

        <div class="cuenta-regresiva contenedor">
            
            <ul class="clearfix">
                
                <li><p id="dias" class="numero"></p> dias</li>
                <li><p id="horas" class="numero"></p> horas</li>
                <li><p id="minutos" class="numero"></p> minutos</li>
                <li><p id="segundos" class="numero"></p> segundos</li>

            </ul>

        </div>

    </section>

<?php include_once 'includes/template/footer.php' ?>
<script>
    var map = L.map('mapa').setView([-24.378958, -65.116476], 16);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
           
        }).addTo(map);

        L.marker([-24.378958, -65.116476]).addTo(map)
            .bindTooltip('Estudio Ema <br> ya disponible 2019')
            .openTooltip();
</script>
        
