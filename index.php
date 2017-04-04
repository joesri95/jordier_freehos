<?php
session_start();
 // web/index.php

 // carga del modelo y los controladores
 require_once __DIR__ . '/app/config.php';
 require_once __DIR__ . '/app/etc/mail.php';
 require_once __DIR__ . '/app/etc/password.php';
 require_once __DIR__ . '/app/etc/apiRedsys.php';
 require_once __DIR__ . '/app/autolouder.php';
 Autoloader::run();
//Include Google client library 
/*include_once 'src/Google_Client.php';
include_once 'src/contrib/Google_Oauth2Service.php';*/



 // enrutamiento
 $map/*____front____*/ = array(
     'home' => array('controller' =>'contr_front', 'action' =>'home'),
     'historia_cultura' => array('controller' =>'contr_front', 'action' =>'historia_cultura'),
     'folcklore' => array('controller' =>'contr_front', 'action' =>'folcklore'),
     'gastronomia' => array('controller' =>'contr_front', 'action' =>'gastronomia'),
     'artesania' => array('controller' =>'contr_front', 'action' =>'artesania'),
     'tienda' => array('controller' =>'contr_front', 'action' =>'tienda'),
     'galeria' => array('controller' =>'contr_front', 'action' =>'galeria'),
     'contacto' => array('controller' =>'contr_front', 'action' =>'contacto'),
     'pol_coockie' => array('controller' =>'contr_front', 'action' =>'pol_coockie'),
     'pol_priva' => array('controller' =>'contr_front', 'action' =>'pol_priva'),
     'login' => array('controller' =>'contr_front', 'action' =>'login'),
     'regis' => array('controller' =>'contr_front', 'action' =>'registra'),
     'image' => array('controller' =>'contr_front', 'action' =>'image'),
     'audio' => array('controller' =>'contr_front', 'action' =>'audio'),
     'video' => array('controller' =>'contr_front', 'action' =>'video'),
     'carrito' => array('controller' =>'contr_front', 'action' =>'carrito'),
     'elimProdCarro' => array('controller' =>'contr_front', 'action' =>'elimProdCarro'),
     'confirmar' => array('controller' =>'contr_front', 'action' =>'confirmar'),
     'cancelarCarro' => array('controller' =>'contr_front', 'action' =>'cancelarCarro'),
     'conf_carro' => array('controller' =>'contr_front', 'action' =>'conf_carro'),
     'compraHecha' => array('controller' =>'contr_front', 'action' =>'compraHecha'),
     'factura' => array('controller' =>'contr_front', 'action' =>'factura'),
     /***- back -***/
    'inicio' => array('controller' =>'contr_back', 'action' =>'inicio'),
    'logout' => array('controller' =>'contr_back', 'action' =>'logout'),
    'alta_product' => array('controller' =>'contr_back', 'action' =>'alta_product'),
    'alta_categoria' => array('controller' =>'contr_back', 'action' =>'alta_categoria'),
    'llistar_cat' => array('controller' =>'contr_back', 'action' =>'llistar_cat'),
    'modificar_cat' => array('controller' =>'contr_back', 'action' =>'modificar_cat'),
    'eliminar_cat' => array('controller' =>'contr_back', 'action' =>'eliminar_cat'),
    'llistar_product' => array('controller' =>'contr_back', 'action' =>'llistar_product'),
    'modificar_product' => array('controller' =>'contr_back', 'action' =>'modificar_product'),
    'eliminar_product' => array('controller' =>'contr_back', 'action' =>'eliminar_product'),
    'alta_user' => array('controller' =>'contr_back', 'action' =>'alta_user'),
    'llistar_user' => array('controller' =>'contr_back', 'action' =>'llistar_user'),
    'modificar_user' => array('controller' =>'contr_back', 'action' =>'modificar_user'),
    'eliminar_user' => array('controller' =>'contr_back', 'action' =>'eliminar_user'),
     'comanda' => array('controller' =>'contr_back', 'action' =>'comanda')

);


 // Parseo de la ruta
 if (isset($_GET['ctl'])) {
     if (isset($map[$_GET['ctl']])) {
         $ruta = $_GET['ctl'];
     } else {
         header('Status: 404 Not Found');
         echo '<html><body><h1>Error 404: No existe la ruta <i>' .
                 $_GET['ctl'] .
                 '</p></body></html>';
         exit;
     }
 } else {
     $ruta = 'home';
 }

 $controlador = $map[$ruta];
 // Ejecución del controlador asociado a la ruta

 if (method_exists($controlador['controller'],$controlador['action'])) {
     call_user_func(array(new $controlador['controller'], $controlador['action']));
 } else {

     header('Status: 404 Not Found');
     echo '<html><body><h1>Error 404: El controlador <i>' .
             $controlador['controller'] .
             '->' .
             $controlador['action'] .
             '</i> no existe</h1></body></html>';
 }




 ?>