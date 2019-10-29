
<?php 
require_once 'BD.php';
$BD = new BD();

session_start();
if (isset($_SESSION['user2'])) {
    # code...
$id=$_GET['claves'];
$area =  $BD->MostrarAreas($id);
foreach ($area as $key) {
    # code...
    $titulo = $key['nombre'];
    $area = $key['id_depto'];
}
?>
<!DOCTYPE html> 

<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">


 <link rel="icon"  href="img/favicon1.ico">


    <title><?PHP echo $titulo;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Graficas" />
    <meta name="keywords" content="graficas" />
    <meta name="author" content="graficas" />

  
    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>
    <meta property="og:description" content=""/>
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="shortcut icon" href="favicon.ico">

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,600,400italic,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    
    <!-- Animate.css -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="css/icomoon.css">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <!-- Theme style  -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Modernizr JS -->
    <script src="js/modernizr-2.6.2.min.js"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
    <script src="js/respond.min.js"></script>
    <![endif]-->

    </head>
    


    
    <body>

    <div id="fh5co-page">
        <a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
        <aside id="fh5co-aside" role="complementary" class="border js-fullheight">

           
      <h1 id="fh5co-logo"><a href="../index.html"><img src="images/logo.ico" ></a></h1>
              <nav id="fh5co-main-menu" role="navigation">
                <ul>
                    <li ><a href="../cerrar_sesion.php">Salir</a></li>
                    <li ><a href="../crearEncuesta.php">Crear Preguntas</a></li>
                    <li ><a href="../verCampos.php">Ver campos</a></li>
                     <li ><a href="../faltantes.php">Faltantes</a></li>
                     <li ><a href="../preabierta.php">preguntas abiertas</a></li>
                   <li><a href="../reiniciar.php">Reiniciar  encuesta</a></li>
                     <li class="fh5co-active"><a href="index2.php">Ver Graficas</a></li>
                     <li><a href="../pdfAll.php">Respuestas todas</a></li>





                </ul>
            </nav>

            <div class="fh5co-footer">
                
            </div>

        </aside>

        <div id="fh5co-main">

        

            
            <div class="fh5co-narrow-content">
                <center><h1><?php echo $titulo;?></h1></center>
                 <table style="width:120%">
  <tr>

    <th><h4></h4></th>
    <th><h4>GRÁFICA DE BARRA DE <?php echo $titulo;?> </h4></th>


  </tr>
  <tr>
   
    <td></td> 
  </tr>

</table>
                
               
                



<table style="width:130%">


<tr>
<div class="fh5co-narrow-content">
               <th>
                <div class="row animate-box" data-animate-effect="fadeInLeft">
                    <div class="row animate-box" data-animate-effect="fadeInLeft">
                    <div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 work-item">
                        
                    </div>
                    </div>
               </th>


                   <th>
                    <div class="row animate-box" data-animate-effect="fadeInLeft">
                    <div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 work-item">
                                 
                            <img src="images/a.png" alt="Grafica araña" class="img-responsive" width="250px">

                    </div>
                    </div>
                </th>
             </tr>       
                    
                   
                 
        

</table>
<?php 
}else{
    header("Location: ../index.html");

}
?>









































                <table style="width:130%">
  
  <tr>
    <td>
        <?php 
require_once 'BD.php';
$BD = new BD();
?>
<!DOCTYPE html>
<html>

<body>

    </td>

    <td>

        <?php 
require_once 'BD.php';
$BD = new BD();
?>
<!DOCTYPE html>
<html>
<head>
    <title>inicio</title>
</head>
<body>


    <?php 
    $Campos = $BD->MostrarCamposAll();

    foreach ($Campos as $dato) {
        $idC = $dato['id'];
        $titulo = $dato['titulo'];
        $fecha = $dato['fecha'];
        $cantidad = $dato['cantidad'];
        $tipo = $dato['tipo'];
        if ($tipo == 1) {
            
        echo '<a href = "jefeA.php?clave='.$idC.'&area='.$area. '">'.$titulo .'<br>';              
            
        }
        
    }
?>

</body>
</html>



    </td> 



  </tr>

</table>




        
        





            <div class="fh5co-narrow-content">

                    <h4 >Grafica de Telaraña</h4>

                <div class="row">
                    <div class="col-md-4 animate-box" data-animate-effect="fadeInLeft">
                    <div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 work-item">

                        
                        <?php 
                            echo '<a href="index90.php?area='.$area.'">
                            <img src="images/t.png" alt="MA" class="img-responsive"  width="250px">
                            <h3 class="fh5co-work-title"></h3>
                        </a>';
                        ?>
                       

                    </div>
            </div>

        </div>
    </div>

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
    <!-- jQuery Easing -->
    <script src="js/jquery.easing.1.3.js"></script>
    <!-- Bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Carousel -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- Stellar -->
    <script src="js/jquery.stellar.min.js"></script>
    <!-- Waypoints -->
    <script src="js/jquery.waypoints.min.js"></script>
    <!-- Counters -->
    <script src="js/jquery.countTo.js"></script>
    
    
    
    <!-- MAIN JS -->
    <script src="js/main.js"></script>

    </body>
</html>
