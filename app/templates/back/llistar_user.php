<?php ob_start();
print_r($param);?>
<section id="section">
<h2>LListar Usuaris</h2>
<table style="align-content: center;margin: auto;">
     <tr style="margin: 2%">
         <th style="margin: 5%">ID</th>
         <th style="margin: 5%">NOM</th>
         <th style="margin: 5%">ROL</th>
         <th style="margin: 5%">EMAIL</th>
         <th style="margin: 5%">USER</th>
         <th style="margin: 5%">CONTRASEÑA</th>
         <th style="margin: 5%"><a class="fa fa-plus fa-lg" href="index.php?ctl=alta_user"></a></th>
     </tr>
<?php
foreach ($param as $value):?>
<tr>
        <td style="margin: 2%">
            <?php echo $value['idUsuari']?>
        </td>
        <td style="margin: 2%">
            <?php echo $value['nom']?>
        </td>
        <td style="margin: 2%">
            <?php echo $value['email']?>
        </td>
        <td style="margin: 2%">
            <?php echo $value['rol']?>
        </td>
        <td style="margin: 2%">
            <?php echo $value['user']?>
        </td>
        <td style="margin: 2%">
            <?php echo $value['password']?>
        </td>
         <td style="margin: 2%">
             <a class="fa fa-pencil-square-o fa-lg" href="index.php?ctl=modificar_cat&id=<?=$value['idUsuari']?>" aria-hidden="true"></a>
         </td>
         <td style="margin: 2%">
             <a class="fa fa-trash fa-lg" href="index.php?ctl=eliminar_cat&id=<?=$value['idUsuari']?>" aria-hidden="true"></a>
         </td>
     </tr>
     
<?php endforeach;?>
</table>
<a href="index.php?ctl=inicio"><h3>Inicio</h3></a>
<section id="section">
<?php $contenido_back = ob_get_clean()?>
<?php include 'layout.php'?>