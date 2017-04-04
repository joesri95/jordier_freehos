<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/index.min.css">
    <link rel="stylesheet" type="text/css" href="css/back.css">
    <link rel="shortcut icon" href="imagenes/iconografia/favicon.ico" type="image/x-icon">
    <script type="text/javascript" src="js/jquery-1.4.1.min.js"></script>
    <title>Knowing ibiza</title>
</head>
<body style="align-content:center;">
    <div class="back">
    <header>
       <nav>
         <ul style="padding:0px">
             <li class="menu_bar">
                <a class="resp">MENU<i class="menu fa fa-bars" aria-hidden="true"></i></a>
              <ul id="menu">
               <li class="option">
                       <a href="index.php?ctl=historia_cultura" style="margin: 1%">CATEGORIES</a>
                       <ul class="subm">
                           <li><a href="index.php?ctl=alta_categoria">INSERTAR CATEGORIA</a></li>
                           <li><a href="#">MODIFICAR CATEGORIA</a></li>
                           <li><a href="#">ELIMINAR CATEGORIA</a></li>
                           <li><a href="#">LLISTAR CATEGORIA</a></li>
                       </ul>
               </li>
               <li class="option">
                       <a href="#" style="margin: 1%">PRODUCTE</a>
                       <ul class="subm">
                           <li><a href="index.php?ctl=alta_product">INSERTAR PRODUCTE</a></li>
                           <li><a href="#">MODIFICAR PRODUCTE</a></li>
                           <li><a href="#">ELIMINAR PRODUCTE</a></li>
                           <li><a href="#">LLISTAR PRODUCTE</a></li>
                       </ul>
               </li>
               <li class="option">
                       <a href="index.php?ctl=gastronomia" style="margin: 1%">COMANDES</a>
                       <!--<ul class="subm">
                           <li><a href="index.php?ctl=historia_cultura">CREAR COMANDE</a></li>
                           <li><a href="index.php?ctl=historia_cultura">MODIFICAR COMANDE</a></li>
                           <li><a href="index.php?ctl=historia_cultura">ELIMINAR COANDE</a></li>
                           <li><a href="index.php?ctl=historia_cultura">LLISTAR COMANDES</a></li>
                       </ul>-->
               </li>
               <li class="option">
                       <a href="index.php?ctl=artesania" style="margin: 1%">USUARIS</a>
                       <ul class="subm">
                           <li><a href="#">CREAR USUARIS</a></li>
                           <li><a href="#">MODIFICAR USUARI</a></li>
                           <li><a href="#">ELIMINAR USUARI</a></li>
                           <li><a href="#">LLISTAR USUARIS</a></li>
                       </ul>
               </li>
               <li class="option">     
                    <a class="backoffice fa fa-hand-o-right fa-2x" href="index.php?ctl=home"></a>
               </li>
               <a class="log" href="index.php?ctl=logout">
          <h3>
           
          </h3>
        </a>
           </ul>
             </li>
         </ul>
         
        </nav>
        <a class="title">
            <img id="logo" src="imagenes/knowingIbiza.jpg"  alt="logo"/>
            <h1>Knowing Ibiza</h1>
        </a>
            
    </header>
    <h1>WELCOME TO BACK OFFICE</h1>
     
     <?php 
            echo $contenido_back;
      ?>
      </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

</body>
</html>
