<?php 

    ob_start(); 

   // if(!empty($msg)) ;echo $msg; 
    ?>
    <section id="section">
       <form class="contact_form" action="index.php?ctl=contacto" method="post" name="contact_form">

    <ul class="ul">
        <li class="li">
            <label for="name">Name:</label>
            <input type="text" name="name" placeholder="Jordi" required/>
        </li>
        <li class="li">
            <label for="email">Email:</label>
            <input type="email" name="email" placeholder="example@example.com" required/>
        </li>
        <li class="li">
            <label for="Subject">Asunto:</label>
            <input type="text" name="subject" placeholder="Asunto" required/>
        </li>
        <li class="li">
   	        <label for="message">Message:</label>
   		    <textarea name="message" cols="40" rows="6" required></textarea>
	    </li>
	    <li class="li">
                <button id="button" class="submit" type="submit" name="submit" formnovalidate>ENVIAR</button>
        </li>

    </ul>
</form>    
    </section>
  
    <?php $contenido = ob_get_clean(); ?>

    <?php include 'layaout.php'; ?>