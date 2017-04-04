<?php ob_start() ?>
<section id="section">
<form class="log" action="index.php?ctl=alta_user" method="post"
   >
    <ul class="ul">
        <li class="li">
            <label for="nom_us">Nom:</label>
            <input type="text" name="nom_us" placeholder="nombre Usuari" required/>
        </li>
        <li class="li">
            <label for="rol">Rol:</label>
            <select name="rol" required>
                <option name="rol" value="admin">Administrador</option>
                <option name="rol" value="comer">Comerciante</option>
                <option name="rol" value="usuari">Usuari</option>
            </select>
        </li>
         <li class="li">
                <label for="cognom">Cognom:</label>
                <input type="text" name="cognom" placeholder="Username" />
            </li>
            <li class="li">
                <label for="email">Email:</label>
                <input type="text" name="email" placeholder="Username" required/>
            </li>
            <li class="li">
                <label for="name">Username:</label>
                <input type="text" name="name" placeholder="Username" required/>
            </li>
            <li class="li">
                <label for="passw">Contraseña:</label>
                <input type="password" name="passw" placeholder="Username" required/>
            </li>
            <li class="li">
                <label for="gender">Genere:</label>
                <input type="text" name="gender" placeholder="Genere"/>
            </li>
            <li class="li">
                <label for="locale">Pais:</label>
                <input type="text" name="locale" placeholder="pais" required/>
            </li>
            <li class="li">
                <label for="picture">Image:</label>
                <input type="file" name="picture" placeholder="Imagen"/>
            </li>	
    </ul>
</form>
<a href="index.php?ctl=llistar_user">LLISTAR USUARIS</a>
</section>
<?php $contenido_back = ob_get_clean() ?>
<?php include 'layout.php' ?>

