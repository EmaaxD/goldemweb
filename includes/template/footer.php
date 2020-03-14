<footer class="site-footer">
            
    <div class="contenedor clearfix">
        
        <div class="footer-informacion">
            
            <h3>Sobre <span>headnoise</span></h3>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non, hic, enim commodi nulla neque nesciunt aliquam atque, facilis esse ea illo, animi exercitationem repellat vitae minima nihil aperiam? Aperiam, minus.</p>

        </div>

        <div class="ultimos-tweets">
            
            <h3>Ultimos <span>tweets</span></h3>

            <ul>
                
                <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut esse, #Debitis commodi @animi recusandae blanditiis molestiae doloremque amet.</li>
                <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut esse, #Debitis commodi @animi recusandae blanditiis molestiae doloremque amet.</li>
                <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut esse, #Debitis commodi @animi recusandae blanditiis molestiae doloremque amet.</li>

            </ul>

        </div>

        <div class="menu">
            
            <h3>Redes <span>sociales</span></h3>

            <nav class="redes-sociales">
                
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-pinterest"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>

            </nav>

        </div>

    </div>

    <p class="copyrigth">Todos los derechos Reservados HEADNOISE 2018.</p>

    <!-- Begin Mailchimp Signup Form -->
    <link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
    <style type="text/css">
        #mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
        /* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
           We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
    </style>
    <div style="display: none;">
        <div id="mc_embed_signup">
            <form action="https://facebook.us20.list-manage.com/subscribe/post?u=2d1fa197aa2c651e2a482a415&amp;id=5d97d480b5" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                <div id="mc_embed_signup_scroll">
                <h2>Suscribete y no te pierdas nada de este evento</h2>
            <div class="indicates-required"><span class="asterisk">*</span> obligatorio</div>
            <div class="mc-field-group">
                <label for="mce-EMAIL">Email<span class="asterisk">*</span>
            </label>
                <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
            </div>
                <div id="mce-responses" class="clear">
                    <div class="response" id="mce-error-response" style="display:none"></div>
                    <div class="response" id="mce-success-response" style="display:none"></div>
                </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_2d1fa197aa2c651e2a482a415_5d97d480b5" tabindex="-1" value=""></div>
                <div class="clear"><input type="submit" value="Suscribirse" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
                </div>
            </form>
            </div>
    
            <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[3]='ADDRESS';ftypes[3]='address';fnames[4]='PHONE';ftypes[4]='phone';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
            <!--End mc_embed_signup-->
        </div>
</footer>



<script src="js/vendor/jquery-3.2.1.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-3.2.1.min.js"><\/script>')</script>
<script src="js/plugins.js"></script>
<script src="js/jquery.animateNumber.min.js"></script>
<script src="js/jquery.countdown.min.js"></script>
<script src="js/jquery.lettering.js"></script>

<?php 
    $archivo = basename($_SERVER['PHP_SELF']);
    $pagina = str_replace(".php", "", $archivo);

    if ($pagina != 'registro') {
        echo '<script src="js/mainJQ.js"></script>';
    }

    if ($pagina == 'invitados' || $pagina == 'index') {

        echo '<script src="js/jquery.colorbox-min.js"></script>';

        echo '<script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js"></script>';

        echo '<script src="js/jquery.waypoints.min.js"></script>';

    }elseif ($pagina == 'conferencias') {
        
        echo '<script src="js/lightbox.js"></script>';

    }

    

    ?>

<script src="js/cotidizador.js"></script>


<!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
<script>
    window.ga=function(){ga.q.push(arguments)};ga.q=[];ga.l=+new Date;
    ga('create','UA-XXXXX-Y','auto');ga('send','pageview')
</script>
<script src="https://www.google-analytics.com/analytics.js" async defer></script>
<script type="text/javascript" src="//downloads.mailchimp.com/js/signup-forms/popup/unique-methods/embed.js" data-dojo-config="usePlainJson: true, isDebug: false"></script><script type="text/javascript">window.dojoRequire(["mojo/signup-forms/Loader"], function(L) { L.start({"baseUrl":"mc.us20.list-manage.com","uuid":"2d1fa197aa2c651e2a482a415","lid":"5d97d480b5","uniqueMethods":true}) })</script>

</body>
</html>