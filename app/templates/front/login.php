<?php ob_start() ?>
<section id="section">
    <form class="form" action="index.php?ctl=login" method="post" name="login">
       <ul class="ul">
            <li class="li">
                <label for="name">Username:</label>
                <input type="text" name="name" placeholder="Username" required/>
            </li>
            <li class="li">
                <label for="passw">Contraseña:</label>
                <input type="password" name="passw" placeholder="Contraseña" required/>
            </li>
            <li class="li">
                <button id="button" class="submit" type="submit" name="submit">Entrar</button>
            </li>
        </ul>
    </form>
    <?php echo $output; ?>
    <a href="index.php?ctl=regis"><h3>Registrarte</h3></a>
</section>
<?php $contenido = ob_get_clean() ?>
<?php include 'layaout.php' ?>