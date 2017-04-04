 <?php ob_start() ?>
    <section id="section">
           <h2>Generar factura</h2>
           <form method="post" action="/app/etc/factura/facturas.php">
    <button type="submit">GENERAR FACTURA PDF</button>
    
    <h3>Los datos de la factura demo son los siguientes ...</h3>
    
<table>
 <tr>
    <td>ID de factura:</td>
    <td><input type="text" name="id_factura" value="1" size="5"></td>
 </tr>
 <tr>
    <td>fecha emisión de factura:</td>
    <td><input type="text" name="fecha_factura" value="<?php echo date("d-m-Y"); ?>" size="15"></td>
 </tr>
 <tr>
    <td>Nombre de la tienda:</td>
    <td><input type="text" name="nombre_tienda" value="Nombre de la tienda S.L" size="50"></td>
 </tr>
 <tr>
    <td>Dirección de la tienda:</td>
    <td><input type="text" name="direccion_tienda" value="C/ demostración nº 1" size="50"></td>
 </tr>
 <tr>
    <td>Población de la tienda:</td>
    <td><input type="text" name="poblacion_tienda" value="Madrid" size="25"></td>
 </tr>
 <tr>
    <td>Provincia de la tienda:</td>
    <td><input type="text" name="provincia_tienda" value="Madrid" size="25"></td>
 </tr>
 <tr>
    <td>Código Postal de la tienda:</td>
    <td><input type="text" name="codigo_postal_tienda" value="28080" size="5"></td>
 </tr>
 <tr>
    <td>Teléfono de la tienda:</td>
    <td><input type="text" name="telefono_tienda" value="900 00 00 00" size="15"></td>
 </tr>
 <tr>
    <td>Fax de la tienda:</td>
    <td><input type="text" name="fax_tienda" value="900 00 00 00" size="15"></td>
 </tr>
 <tr>
    <td>Identificacion Fiscal de la tienda:</td>
    <td><input type="text" name="identificacion_fiscal_tienda" value="11223344N" size="15"></td>
 </tr>
 <tr>
    <td><hr></td>
    <td><hr></td>
 </tr>
 <tr>
    <td>Nombre del cliente:</td>
    <td><input type="text" name="nombre_cliente" value="" size="15"></td>
 </tr>
 <tr>
    <td>Apellidos del cliente:</td>
    <td><input type="text" name="apellidos_cliente" value="" size="15"></td>
 </tr>
 <tr>
    <td>Dirección del cliente:</td>
    <td><input type="text" name="direccion_cliente" value="" size="50"></td>
 </tr>
 <tr>
    <td>Población del cliente:</td>
    <td><input type="text" name="poblacion_cliente" value="" size="25"></td>
 </tr>
 <tr>
    <td>Provincia del cliente:</td>
    <td><input type="text" name="provincia_cliente" value="" size="25"></td>
 </tr>
 <tr>
    <td>Código Postal del cliente:</td>
    <td><input type="text" name="codigo_postal_cliente" value="" size="5"></td>
 </tr>
 <tr>
    <td>Identificacion Fiscal del cliente:</td>
    <td><input type="text" name="identificacion_fiscal_cliente" value="" size="15"></td>
 </tr>
</table>

<h3>PRODUCTOS</h3>


<table cellpadding="5" border="1">
    <tr><th>Unidades</th><th>Productos</th><th>Precio unidad</th></tr>
<?php
//Demo de Array de productos simulando extracción de datos de una base de datos.

    foreach ($_SESSION["producte"] as $value){
        $productos=$value['nom'];
        $precio_unidad=$value['preu'];
        $unidades=1;
    }
// A continuación se guardan en variables los datos de los productos, separados por comas
// que luego serán extraídos a través de la función explode a la hora de generar la factura
$unidades = implode(",", $array_productos["unidades"]);
$productos = implode(",", $array_productos["productos"]);
$precio_unidad = implode(",", $array_productos["precio_unidad"]);
// A continuación se guardarán los datos de los productos a través de campos ocultos
?>
</table>

<input type="hidden" name="unidades" value="<?php echo $unidades; ?>">
<input type="hidden" name="productos" value="<?php echo $productos; ?>">
<input type="hidden" name="precio_unidad" value="<?php echo $precio_unidad; ?>">
<!-- Campo que hace la llamada al script que genera la factura -->
<input type="hidden" name="generar_factura" value="true">
</form>
    </section>
    <?php $contenido = ob_get_clean() ?>

    <?php include 'layaout.php' ?>