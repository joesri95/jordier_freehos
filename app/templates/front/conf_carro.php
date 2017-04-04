<?php ob_start() ?>
<section id="section">
<form action="http://jguasch.esy.es/redsys/lacaixa.php" method="post" enctype="multipart/form-data" target="_blank">

    <ul class="ul">
        <li class="li">
            <label for="Ds_SignatureVersion">Ds_Merchant_SignatureVersion:</label>
            <input type="text" name="Ds_SignatureVersion" value="<?php echo $version; ?>"/>
        </li>
        <li class="li">
            <label for="Ds_MerchantParameters">Ds_Merchant_MerchantParameters:</label>
            <input type="text" name="Ds_MerchantParameters" value="<?php echo $params; ?>"/>
        </li>
        <li class="li">
            <label for="Ds_Signature">Ds_Merchant_Signature:</label>
            <input type="text" name="Ds_Signature" value="<?php echo $signature; ?>"/>
        </li>
        <li class="li">
    	     <input type="submit" value="Enviar" name="submit">
        </li>
    </ul>
</form>
</section>
<?php $contenido = ob_get_clean() ?>
<?php include 'layaout.php' ?>