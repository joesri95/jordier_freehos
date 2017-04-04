<?php
	function listar_directorios_ruta($ruta,&$imgs){ 
   // abrir un directorio y listarlo recursivo 
   $img=  array();
   if (is_dir($ruta)) { 
      if ($dh = opendir($ruta)) { 
         while (false !== ($file = readdir($dh)) ) { 
            //esta línea la utilizaríamos si queremos listar todo lo que hay en el directorio
            //mostraría tanto archivos como directorios 
            //echo "<br>Nombre de archivo: $file : Es un: " . filetype($ruta.$file);

            if (is_dir($ruta . $file) && $file!="." && $file!=".."){ 
               //solo si el archivo es un directorio, distinto que "." y ".." 
               $imgs["$ruta$file"] = listar_directorios_ruta($ruta.$file."/",$imgs);
            }else{
               $img[]=$file;
              
            }
         } 
      closedir($dh); 
      } 
   }else 
      echo "<br>No es ruta valida";
   
   return $img;
}
$imgs = array();
$imgs["imagenes/"] =listar_directorios_ruta("imagenes/",$imgs);
?>