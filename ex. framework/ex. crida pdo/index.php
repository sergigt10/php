<!DOCTYPE html>
<html lang="ca">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Bar la Poncella, Restaurant Vic, Bar Vic</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="Pragma" content="No-Cache" />
        <meta http-equiv="Content-Language" content="ca, es" />
        <meta name="title" content="Bar la Poncella, Restaurant Vic, Bar Vic" />
        <meta name="description" content="Un tracte cordial amb productes de proximitat acuradament seleccionats és del què gaudireu a La Poncella, on us esperem oferint-vos estones i moments agradables, des del matí fins al vespre.
        " />
        <meta name="keywords" content="Bar la Poncella, Bar vic, Restaurant Vic, Menjar vic, Restaurant bar vic, Poncella" />
        <meta name="revisit-after" content="15 days" />
        <meta name="classification" content="Internet" />
        <meta name="rating" content="General" />
        <meta name="author" content="webmastervic" />
        <meta name="robot" content="index, follow" />
        <meta name="distribution" content="global" />
        <meta name="document-type" content="Public" />
        <meta name="document class" content="completed" />
        <meta name="copyright" content="TripleVeDoble SC" />

        <!-- Bootstrap -->
        <link rel="stylesheet" href="assets/css/bootstrap/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="assets/css/bootstrap/bootstrap-theme.min.css">

        <!-- Custom css -->
        <link rel="stylesheet" href="assets/css/style.css">
        
        <!-- Font Awesome -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        
        <link rel="stylesheet" href="assets/css/ionicons.min.css">
        
        <link rel="stylesheet" href="assets/css/puredesign.css">
        
        <!-- Flexslider -->
        <link rel="stylesheet" href="assets/css/flexslider.css">
        
        <!-- Owl -->
        <link rel="stylesheet" href="assets/css/owl.carousel.css">
        
        <!-- Magnific Popup -->
        <link rel="stylesheet" href="assets/css/magnific-popup.css">

        <link rel="shortcut icon" type="image/jpg" href="assets/img/favicon.ico"/>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <!--  Main Wrap  -->
        <div id="main-wrap" class="full-width">
            <!--  Header & Menu  -->
            <header id="header" class="fixed transparent full-width">
                <div class="container">
                    <nav class="navbar navbar-default white">
                        <!--  Header Logo  -->
                        <div id="logo">
                            <a class="navbar-brand" href="index.php">
                                <img src="assets/img/logo.png" class="normal" alt="logo">
                                <img src="assets/img/logo@2x.png" class="retina" alt="logo">
                                <img src="assets/img/logo_white.png" class="normal white-logo" alt="logo">
                                <img src="assets/img/logo_white@2x.png" class="retina white-logo" alt="logo">
                            </a>
                        </div>
                        <!--  END Header Logo  -->
                        <!--  Classic menu, responsive menu classic  -->
                        <div id="sidemenu">
                            <div class="menu-holder">
                                <ul>
                                    <li>
                                        <a href="index.php">INICI</a>
                                    </li>
                                    <li>
                                        <a href="laponcella.html">LA PONCELLA</a>
                                    </li>
                                    <li>
                                        <a href="lacarta.html">LA CARTA</a>
                                    </li>
                                    <li>
                                        <a href="contacte.html">CONTACTE</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!--  END Classic menu, responsive menu classic  -->
                        <!--  Button for Responsive Menu Classic  -->
                        <div id="menu-responsive-sidemenu">
                            <div class="menu-button">
                                <span class="bar bar-1"></span>
                                <span class="bar bar-2"></span>
                                <span class="bar bar-3"></span>
                            </div>
                        </div>
                        <!--  END Button for Responsive Menu Classic  -->
                    </nav>
                </div>
            </header>
            <!--  END Header & Menu  -->
            
            <!--  Page Content, class footer-fixed if footer is fixed  -->
            <div id="page-content" class="header-static footer-fixed">
                <!--  Slider  -->
                <!--  END Slider  -->
                <style>
                    p {
                        color: white !important;
                    }
                    h1, h2, h3, h4, h5, h6 {
                        color: white;
                    }
                </style>
                <div id="home-wrap" class="content-section fullpage-wrap back-image">
                    <!-- Section About -->
                    <div class="row margin-leftright-null">
                        <div class="container menu-margin">
                            <div class="col-md-6">
                                <h1 class="white flex-animation" style="font-family: Guix;">Menú<br> del dia</h1>
                            </div>
                            <div class="col-md-5 pissarra text-center">
                                <?php
                                    require_once("admin/config.php");
                                    
                                    $dias = array("Diumenge","Dilluns","Dimarts","Dimecres","Dijous","Divendres","Dissabte");

                                    $sql = "SELECT * FROM menu ORDER BY id_menu";
                                    if($result = $pdo->query($sql)){
                                        if($result->rowCount() > 0){
                                            while($row = $result->fetch()){
                                                if($dias[date("w")] === 'Dissabte'){
                                                    echo '
                                                    <h3 class="white" style="font-family: Guix;">Festa setmanal</h3>
                                                    <br>
                                                    <p class="white"></p>
                                                    <p class="white"></p>
                                                    <p class="white"></p>
                                                    <br>
                                                    <h3 class="white" style="font-family: Guix;"></h3>
                                                    <br>
                                                    <p class="white"></p>
                                                    <p class="white"></p>
                                                    <p class="white"></p>
                                                    <br>
                                                    <p class="white"></p>';
                                                    break;
                                                }else if($dias[date("w")] === $row['dia']){
                                                    if(!empty($row['primers'])){
                                                        echo '<h3 class="white" style="font-family: Guix;">PRIMERS</h3><br>';
                                                        echo $row['primers'];
                                                        echo '<br>';
                                                    }
                                                    if(!empty($row['segons'])){
                                                        echo '<h3 class="white" style="font-family: Guix;">SEGONS</h3><br>';
                                                        echo $row['segons'];
                                                    }
                                                    if(!empty($row['postres'])){
                                                        echo '<br>';
                                                        echo '<h3 class="white" style="font-family: Guix;">POSTRES</h3><br>';
                                                        echo $row['postres'];
                                                    }
                                                    if(!empty($row['preu'])){
                                                        echo '<br>';
                                                        echo $row['preu'];
                                                    }
                                                }
                                            }
                                            // Free result set
                                            unset($result);
                                        }else{
                                            echo "<p>No hi ha resultats!</p>";
                                        }
                                    }else{
                                        echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
                                    }
                                    // Close connection
                                    unset($pdo);
                                ?>
                            </div>
                            <div class="col-md-12 padding-leftright-null">
                                <div class="text">
                                    <p class="heading center line margin-bottom-null"><br></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  END Page Content, class footer-fixed if footer is fixed  -->
            <!--  Footer. Class fixed for fixed footer  -->
            <footer class="fixed full-width">
                <div class="container">
                    <div class="row no-margin pre-footer">
                        <div class="col-xs-6 col-sm-6 col-md-3 padding-leftright-null">
                            <h5 class="heading white">Contacte</h5><br>
                            <p class="grey-light">Passeig de la Generalitat, 10,<br>Vic 08500<br>T. 938 85 49 81<br>M. barlaponcella@gmail.com<br><a href="https://www.google.com/maps/place/La+Poncella/@41.924306,2.253376,15z/data=!4m2!3m1!1s0x0:0xf1f2ff9e31331de0?sa=X&ved=2ahUKEwjnsevc8YrqAhXl8eAKHZh8CVIQ_BIwCnoECBgQCA" target="_blank">Veure ubicació >></a></p><span class="iguals"></span><br>
                        </div>
                        <!-- Social -->
                        <div class="col-xs-6 col-sm-6 col-md-5 padding-leftright-null">
                            <h5 class="heading white">Horaris</h5><br>
                            <p class="grey-light">Dilluns de 7:00h a 17:00h<br>De dimarts a divendres de 7:00h a 22:00h<br>Diumenges de 7:00h a 21:30h<br><strong>Dissabte Tancat</strong></p>
                        </div>
                        <!-- END Social -->
                        <!-- Newsletter -->
                        <div class="col-md-4 padding-leftright-null margin-insta">
                            <h5 class="heading white">Segueix-nos a Instagram</h5>
                            <br>
                            <!-- LightWidget WIDGET --><!-- LightWidget WIDGET --><script src="https://cdn.lightwidget.com/widgets/lightwidget.js"></script><iframe src="//lightwidget.com/widgets/4d1d73c4427d58c3a17c6dd11cefae1d.html" scrolling="no" allowtransparency="true" class="lightwidget-widget" style="width:100%;border:0;overflow:hidden;"></iframe>
                        </div>
                        <!-- END Newsletter -->
                    </div>
                </div>
                <!-- Copyright -->
                <!-- END Copyright -->
            </footer>
            <!--  END Footer. Class fixed for fixed footer  -->
        </div>
        <!--  Main Wrap  -->
        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="assets/js/jquery.min.js"></script>
        <!-- All js library -->
        <script src="assets/js/bootstrap/bootstrap.min.js"></script>
        <script src="assets/js/jquery.flexslider-min.js"></script>
        <script src="assets/js/owl.carousel.min.js"></script>
        <script src="assets/js/isotope.min.js"></script>
        <script src="assets/js/jquery.magnific-popup.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=false"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="assets/js/smooth.scroll.min.js"></script>
        <script src="assets/js/jquery.appear.js"></script>
        <script src="assets/js/jquery.countTo.js"></script>
        <script src="assets/js/jquery.scrolly.js"></script>
        <script src="assets/js/plugins-scroll.js"></script>
        <script src="assets/js/imagesloaded.min.js"></script>
        <script src="assets/js/pace.min.js"></script>
        <script src="assets/js/main.js"></script>
    </body>
</html>