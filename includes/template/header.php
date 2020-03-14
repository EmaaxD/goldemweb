<?php 
include_once('includes/fuciones/conexion.db.php');
$conexion = conexion();
?>
<!DOCTYPE html>
<html class="no-js" lang="">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>sitio web mio</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="icon" href="img/HNico.ico">
    <link rel="manifest" href="site.webmanifest">
    <link rel="apple-touch-icon" href="icon.png">
    <link href="https://fonts.googleapis.com/css?family=Muli|Open+Sans|Source+Sans+Pro" rel="stylesheet">
    <!-- Place favicon.ico in the root directory -->

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">

    <?php 

        $archivo = basename($_SERVER['PHP_SELF']);
        $pagina = str_replace(".php", "", $archivo);

        if ($pagina == 'invitados' || $pagina == 'index') {

            echo '<link rel="stylesheet" href="css/colorbox.css">';

            echo '<link rel="stylesheet" href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css" />';

        }elseif ($pagina == 'conferencias') {

            echo '<link rel="stylesheet" href="css/lightbox.css">';

        }
    ?>
    
    <script src="fontawesome-free-5.0.6/svg-with-js/js/fontawesome-all.min.js"></script>
</head>
<body class="<?php echo $pagina ?>">
    <!--[if lte IE 9]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
    <![endif]-->

    <header class="site-header">
        
        <div class="hero">
                
            <div class="contenido-header">
                
                <nav class="redes-sociales">
                    
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-pinterest"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>

                </nav>

                <div class="informacion-evento">

                    <div class="clearfix">
                        
                        <p class="fecha"><i class="far fa-calendar-alt"></i>10-12 Dim</p>
                        <p class="ciudad"><i class="fas fa-map-marker-alt"></i>Perico,BC</p>

                    </div>

                    <h1 class="nombre-sitio">HeadNoise</h1>

                    <p class="slogan">La mejor conferencia de <span>Diseno Web</span></p>

                </div><!--informacion evento -->

            </div>

        </div><!--.hero-->

    </header>

    <div class="barra">
        
        <div class="contenedor clearfix">
            
            <div class="logo">

                <a href="index.php">
                    <img src="img/Nombres.png" alt="logo gldwebcamp">
                </a>

            </div>

            <div class="menu-movil">
                
                <span></span>
                <span></span>
                <span></span>

            </div>

            <nav class="navegacion-principal clearfix">
                
                <a href="conferencias.php">Conferencia</a>
                <a href="calendario.php">Calendario</a>
                <a href="invitados.php">Invitados</a>
                <a href="registro.php">Reservaciones</a>
            </nav>

        </div>

    </div>