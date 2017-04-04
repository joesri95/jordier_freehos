<?php 
require __DIR__.'/phpmailer/PHPMailerAutoload.php';

	class mail{
        
        public function enviaContacto($mailto, $name, $enviador, $subject, $message){
                $mail = new PHPMailer;
                $mail->setFrom($enviador, $name);
                $mail->addAddress($mailto, $name);
                $mail->Subject = $subject;
                $mail->Body = $message;
            if (!$mail->send()) {
                return false;
            } else {
            	return true;
            }
        }
	    public function mailPromo($filename, $path, $mailto, $from_mail, $from_name, $replyto, $subject, $producte,$slogan) {
		    $file = $path.$filename;
		    $file_size = filesize($file);
		    $handle = fopen($file, "r");
		    $content = fread($handle, $file_size);
		    fclose($handle);
		    $content = chunk_split(base64_encode($content));
		    $uid = md5(uniqid(time()));
		    $name = basename($file);

		    $html=' 
					<html> 
					<head> 
					   <title>Confirmacionc compra</title>
					   <style>
                           a{
                               text-decoration: none;
                               color: #9acd03;
                           }
                           img{
                               width: 300px;
                           }
                        </style>
					</head> 
					<body> 
					    <h1><a href="http://knowingibiza.esy.es/web/">KNOWING IBIZA</a></h1> 
					    <h2>'.$slogan.'</h2>
					    <table>
					        <tr>
					            <th>Nombre del producto:</th>
                                <td>Castanyoles</td>
					        </tr>
					        <tr>
					            <th>Preu:</th>
					            <td>300€</td>
					        </tr>
                            <tr>
                                <img alt="castanyoles" src="castanyoles.jpg"/>
                            </tr>
                            <tr>
                                <td>Descripció:</td>
                                <td>Fetes de fusta de ginebre, buidades en el seu interior per aconseguir més ressò i, de la mateixa manera que la flaüta, gravades amb formes geomètriques o vegetals. Acompanyen al "ballador" en els seus balls i al tambor i la flaüta a les "gaites"</td>
                            </tr>
					    </table>
					    <i>
						    &quot;Si Ud. Recibe este correo y no es su destinatario legítimo y verdadero, debe inmediatamente destruirlo, procurando evitar su copia, almacenamiento, distribución, reproducción o cualquier otra forma de tratamiento documental o electrónico, ya que de lo contrario será considerado responsable civil y criminal de cuantos daños y perjuicios le sean irrogados el emisor y legítimo propietario de este correo, respondiendo con todos sus bienes presentes y futuros de las acciones que realice sobre esta transmisión electrónica&quot;
						    &quot;En cumplimiento de lo establecido en la L.O. 15/1999 de Protección de Datos de Carácter Personal, [empresa] le informa que sus datos han sido incorporados a un fichero automatizado con la finalidad de prestar y ofrecer nuestros servicios de [servicios]. Los datos recogidos son almacenados bajo la confidencialidad y las medidas de seguridad legalmente establecidas y no serán cedidos ni compartidos con empresas ni entidades ajenas a [empresa]. Igualmente deseamos informarle que podrá ejercer los derechos de acceso, rectificación cancelación u oposición a través de los siguientes medios:
							<ul>	
								<li>E-mail: info@knowingibiza.es</li>
                                <li>Comunicación escrita al responsable legal del fichero: ctr/ San José km 1.9 07817&quot;</li>
							<ul>	
					    </i>
					</body> 
					</html> 
					'; 

		    $header = "From: ".$from_name." <".$from_mail.">\n";
		    $header .= "Reply-To: ".$replyto."\n";
		    $header .= "MIME-Version: 1.0\n";
		    $header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\n\n";
		    $emessage= "--".$uid."\n";
		    $emessage.= "Content-type:text/html; charset=iso-8859-1\n";
		    $emessage.= "Content-Transfer-Encoding: 7bit\n\n";
		    $emessage .= $html."\n\n";
		    $emessage.= "--".$uid."\n";
		    $emessage .= "Content-Type: application/octet-stream; name=\"".$filename."\"\n"; // use different content types here
		    $emessage .= "Content-Transfer-Encoding: base64\n";
		    $emessage .= "Content-Disposition: attachment; filename=\"".$filename."\"\n\n";
		    $emessage .= $content."\n\n";
		    $emessage .= "--".$uid."--";

		    
		    if (mail($mailto,$subject,$emessage,$header)) {
		        echo "mail send ... OK"; // or use booleans here
		    } else {
		        echo "mail send ... ERROR!";
		    }
		    
		}
	}
?>