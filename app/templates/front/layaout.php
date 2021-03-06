<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/index.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
    <link rel="shortcut icon" href="imagenes/iconografia/favicon.ico" type="image/x-icon">
    <title>Knowing ibiza</title>
</head>
<body>
   <div class="contenedor">
    <header>
       <nav>
         <ul>
             <li class="menu_bar">
                 <a class="resp">MENU<i class="menu fa fa-bars" aria-hidden="true"></i></a>                 
              <ul id="menu">
               <li class="option">
                      <a href="index.php?ctl=home" style="margin: 1%">HOME</a>
               </li>
               <li class="option">
                       <a href="index.php?ctl=historia_cultura" style="margin: 1%">HISTORIA&amp;CULTURA</a>
               </li>
               <li class="option">
                       <a href="index.php?ctl=folcklore" style="margin: 1%">FOLKLORE</a>
                       <ul class="subm">
                           <li><a href="index.php?ctl=folcklore">BALLS</a></li>
                           <li><a href="index.php?ctl=folcklore">VESTIMENTA</a></li>
                           <li><a href="index.php?ctl=folcklore">INSTRUMENTOS</a></li>
                       </ul>
               </li>
               <li class="option">
                       <a href="index.php?ctl=gastronomia" style="margin: 1%">GASTRONOMIA</a>
               </li>
               <li class="option">
                       <a href="index.php?ctl=artesania" style="margin: 1%">ARTESANIA</a>
               </li>
               <li class="option">
                       <a href="index.php?ctl=tienda" style="margin: 1%">TIENDA</a>
               </li>
               <li class="option">
                       <a href="index.php?ctl=galeria" style="margin: 1%">GALERIA</a>
                       <ul class="subm">
                           <li><a href="index.php?ctl=video">VIDEO &amp; AUDIO</a></li>
                           <li><a href="index.php?ctl=image">IMATGES</a></li>
                       </ul>
               </li>
               <li class="option">
                 <a class="carro fa fa-shopping-cart fa-2x" href="index.php?ctl=carrito"></a>
               </li> 
               <?php if(isset($_SESSION['user'])){
                        echo '<li class="option">';
                            echo '<a class="fa fa-sign-out fa-2x" href="index.php?ctl=logout" aria-hidden="true"></a>';
                        echo '</li>';
                        if ($_SESSION['user'][0]['rol']=='administrador'){
                            echo '<li class="option">';      
                                echo '<a class="backoffice fa fa-hand-o-left fa-2x" href="index.php?ctl=inicio"></a>';
                            echo '</li>';
                        }
                    } else {
                                echo '<li class="option">';
                                echo '<a class="fa fa-sign-in fa-2x" href="index.php?ctl=login" aria-hidden="true"></a>';
                                echo '</li>';
                    }
                   ?>
           </ul>
            
             </li>
         </ul>
         
        </nav>
        <a class="title">
            <img id="logo" src="imagenes/knowingIbiza.jpg"  alt="logo"/>
            <h1>Knowing Ibiza</h1>
        </a>  
    </header>
    
     <?php 
            echo $contenido;
      ?>
     
    <footer id="footer">
        <section class="colab" >
            <img alt="Conselleria Cultura" src="imagenes/colaboradores/cons_cultura.jpg">
            <img alt="Federacio de colles" src="imagenes/colaboradores/fede_colles.jpg">
            <img alt="Conselleria de Turisme" src="imagenes/colaboradores/marca-illes-balears.jpg">
        </section>
        <section class="enlaces">
                <article class="link">
                    <div>
                        <p><a href="index.php?ctl=contacto">Contacta con Nosotros</a></p>
                        <p><a href="index.php?ctl=pol_coockie">Politica Coockies</a></p>
                        <p><a href="index.php?ctl=pol_priva">Política Privacidad</a></p>
                        <p><a href="http://www.lssi.gob.es/la-ley/Paginas/ley-34-2002.aspx">LSSICE</a></p>
                    </div>
                </article>
                <article class="social">
                    <div>
                        <a class="fa fa-facebook-square" ></a>
                        <a class="fa fa-google-plus-square"></a>
                        <a class="fa fa-instagram"></a>
                        <a class="fa fa-youtube-square"></a>
                    </div>
                </article>
        </section>
    </footer>
    </div>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery-slider.js"></script>
    <script type="text/javascript" src="js/lightbox.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui.js"></script>
    <script type="text/javascript">
        $(function() {
   $( "#tabs" ).tabs(); 
    $( "#accordion" ).accordion();
});
    </script>
</body>
</html>
