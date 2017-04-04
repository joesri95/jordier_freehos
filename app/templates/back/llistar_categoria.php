<?php ob_start()?>
<section id="section">

<h2>LListar categories</h2>
<table style="align-content: center;margin: auto;">
     <tr style="margin: 2%">
         <th style="margin: 5%">ID</th>
         <th style="margin: 5%">NOM CATEGORIA</th>
         <th style="margin: 5%">DESCRIPCIO</th>
         <th style="margin: 5%"><a class="fa fa-plus fa-lg" href="index.php?ctl=alta_categoria"></a></th>
     </tr>
<?php
foreach ($params as $value):?>
<tr>
         <td style="margin: 2%">
<?php echo $value['idCategoria']?>
</td>
         <td style="margin: 2%">
<?php echo $value['nom_cat']?>
</td>
         <td style="margin: 2%">
<?php echo $value['descrip_cat']?>
         </td>
         <td style="margin: 2%">
             <a class="fa fa-pencil-square-o fa-lg" href="index.php?ctl=modificar_cat&id=<?=$value['idCategoria']?>" aria-hidden="true"></a>
         </td>
         <td style="margin: 2%">
             <a class="fa fa-trash fa-lg" href="index.php?ctl=eliminar_cat&id=<?=$value['idCategoria']?>" aria-hidden="true"></a>
         </td>
     </tr>
     
<?php endforeach;?>
<a href="index.php?ctl=inicio"><h3>Inicio</h3></a>
</section>
<?php $contenido_back = ob_get_clean()?>
<?php include 'layout.php'?>