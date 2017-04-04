<?php ob_start(); ?>
<section id="section">
    
    <form class="form" action="index.php?ctl=regis" method="post" name="login">
        <ul class="ul">
            <li class="li">
                <label for="nom">Nom:</label>
                <input type="text" name="nom" placeholder="Username" required/>
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
            <li class="li">
                <button id="button" class="submit" type="submit" name="submit">Entrar</button>
            </li>
        </ul>
    </form>
</section>
<?php $contenido = ob_get_clean() ?>

<?php include 'layaout.php' ?>