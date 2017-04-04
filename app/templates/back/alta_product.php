<?php ob_start() ?>
<section id="section">
<form action="index.php?ctl=alta_product" method="post" enctype="multipart/form-data">

    <ul class="ul">
        <li class="li">
            <label for="nom_P">Nom Producte:</label>
            <input type="text" name="nom_P" placeholder="Producte" required/>
        </li>
        <li class="li">
            <label for="descrip_P">Descripció:</label>
            <input type="text" name="descrip_P" placeholder="Descripcion" required/>
        </li>
        <li class="li">
            <label for="img">Imatge:</label>
            <input type="file" name="img" placeholder="Imatge" required/>
        </li>
        <li class="li">
            <label for="preu">Preu:</label>
            <input type="text" name="preu" placeholder="Preu del producte" required/>
        </li>
        <li class="li">
            <label for="stock">Stock:</label>
            <input type="text" name="stock" placeholder="Stock del producte" required/>
        </li>
        <li class="li">
            <label for="categoria">Categoria:</label>
            <select name="categoria" required>
                <?php
                foreach ($categorias as $value){
                    $idCat = $value["idCategoria"];
                    $nomCat = $value['nom_cat'];
                    echo "<option name='categoria' value='$idCat'>$nomCat</option>";
               }
                ?>                           
            </select>
        </li>
        <li class="li">
    	     <input type="submit" value="Enviar" name="submit">
        </li>
    </ul>
</form>
<a href="index.php?ctl=llistar_product"><h3>LLISTAR PRODUCTES</h3></a>
</section>
<?php $contenido_back = ob_get_clean() ?>
<?php include 'layout.php' ?>