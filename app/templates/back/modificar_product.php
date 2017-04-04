<?php ob_start();
print_r($params);
 ?>
<section id="section">
<form class="form" action="index.php?ctl=modificar_product" method="post"  enctype="multipart/form-data">
    <ul class="ul">
        <li>
            <label for="id"><h4>Id</h4></label>
            <input type="hidden" name="id" value="<?=$params[0]["idProducte"] ?>"/>
        </li>
        <li class="li">
            <label for="nomnou"><h4>Nou nom:</h4></label>
            <input type="text" name="nomnou" placeholder="nombre de la nueva categoria" required value="<?=$params[0]["nomProducte"] ?>"/>
        </li>
        <li class="li">
            <label for="descripnou"><h4>Nova Descripció:</h4></label>
            <input type="text" name="descripnou" placeholder="Descripció de la nova categoria" required value="<?=$params[0]["descripcioProducte"] ?>"/>
        </li>
        <li class="li">
            <label for="img"><h4>Nova Imatge:</h4></label>
            <input type="file" name="img" placeholder="nombre de la nueva categoria" value="<?=$params[0]["imagen"] ?>"/>
        </li>
        <li class="li">
            <label for="preunou"><h4>Nou preu:</h4></label>
            <input type="text" name="preunou" placeholder="Descripció de la nova categoria" required value="<?=$params[0]["preu"] ?>"/>
        </li>
        <li class="li">
            <label for="stocknou"><h4>Nou stock:</h4></label>
            <input type="text" name="stocknou" placeholder="nombre de la nueva categoria" required value="<?=$params[0]["stock"] ?>"/>
        </li>
        <li class="li">
            <label for="idcatnou"><h4>Nova categoria:</h4></label>
            <select name="idcatnou" required>
                <?php
                foreach ($categorias as $value){
                    $idCat = $value["idCategoria"];
                    $nomCat = $value['nom_cat'];
                    if ($idCat==$params[0]["idcat"]) {
                        echo "<option name='idcatnou' value='$idCat' selected>$nomCat</option>";
                    }else{
                        echo "<option name='idcatnou' value='$idCat'>$nomCat</option>";
                    }
                    
               }
                ?>                           
            </select>
        </li>
        <li class="li">
    	    <button class="submit" type="submit" name="submit">Modificar Producte</button>
        </li>	
    </ul>
</form>
<a href="index.php?ctl=llistar_product"><h3>LLISTAR PRODUCTES</h3></a>
</section>
<?php $contenido_back = ob_get_clean() ?>
<?php include 'layout.php' ?>
