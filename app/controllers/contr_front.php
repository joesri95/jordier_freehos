 <?php

 class contr_front{
     
     public function home(){
         require __DIR__ . '/../templates/front/home.php';
     }
     public function historia_cultura(){
         require __DIR__ . '/../templates/front/historia_cultura.php';
     }
     public function folcklore(){
         require __DIR__ . '/../templates/front/folcklore.php';
     }
     public function gastronomia(){
         require __DIR__ . '/../templates/front/gastronomia.php';
     }
     public function artesania(){
         require __DIR__ . '/../templates/front/artesania.php';
     }
    
     public function galeria(){
         require __DIR__ . '/../templates/front/galeria.php';
     }
     public function pol_coockie(){
        require __DIR__. '/../templates/front/polcoockies.php';
            
    }
    public function pol_priva(){
        require __DIR__.'/../templates/front/polprivacidad.php';
    }
     public function image(){
        require __DIR__.'/../etc/gallery.php';
        require __DIR__.'/../templates/front/gal_img.php';
    }
     public function video(){
        require __DIR__.'/../templates/front/gal_vid_aud.php';
    }
     
    public function contacto(){
        if (!array_key_exists('name', $_POST)) {
            $msg = '';      
    } else{
            $m = new mail();
            $mail = $_POST['email'];
            $name = $_POST['name'];
            if($m->enviaContacto(Config::$mail, $name, $mail, $_POST['subject'],$_POST['message']))

                $msg = '<h2>Misatge enviat</h2>';
            else
                $msg = '<h2>Problemes denviament proba una altre vegada</h2>';
        }
          require __DIR__ . '/../templates/front/contacto.php';     
     }
     public function login(){
        $user= new user();
        if (isset($_SESSION['user'])){
                
                        $fitxer = @fopen("logs.txt", "a");// obrir
                    if (!$fitxer){
                        echo "No es pot obrir el fitxer";
                    }else{
                        if(isset($_SESSION["user"])){
                            $var= "\r\n".$corr . $_SESSION["usuari"][1] . " ---> " . date("l jS \of F Y h:i:s A");
                        }fwrite($fitxer, $var);
                 }fclose($fitxer);
            
            header("Location:index.php?ctl=home");
        }elseif (!isset($_POST['name'])) {
            /*################### GOOGLE LOGIN ####################*/
            include_once 'src/Google_Client.php';
            include_once 'src/contrib/Google_Oauth2Service.php';

            $clientId = '603659759956-mehcrtcg7vvq7kq00elm1bjep6qkvb8u.apps.googleusercontent.com'; //Google client ID
            $clientSecret = 'LZ5EQ8kHStY8voof28n0_ELG'; //Google client secret
            $redirectURL = 'http://jordier.coolpage.biz/index.php?ctl=login'; //Callback URL

            //Call Google API
            $gClient = new Google_Client();
            $gClient->setApplicationName('log google');
            $gClient->setClientId($clientId);
            $gClient->setClientSecret($clientSecret);
            $gClient->setRedirectUri($redirectURL);
            $google_oauthV2 = new Google_Oauth2Service($gClient);
            

            if(isset($_GET['code'])){
                $gClient->authenticate($_GET['code']);
                $_SESSION['token'] = $gClient->getAccessToken();
                header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
            }   

            if (isset($_SESSION['token'])) {
                $gClient->setAccessToken($_SESSION['token']);
            }
            if ($gClient->getAccessToken()) {
            //Get user profile data from google
                $gpUserProfile = $google_oauthV2->userinfo->get();
                //print_r($gpUserProfile);
                //Initialize User class
                $user = new connexio();
                //Insert or update user data to the database
                $gpUserData = array(
                    'oauth_provider'=> 'google',
                    'oauth_uid'     => $gpUserProfile['id'],
                    'nom'           => $gpUserProfile['given_name'],
                    'cognom'        => $gpUserProfile['family_name'],
                    'email'         => $gpUserProfile['email'],
                    'gender'        => $gpUserProfile['gender'],
                    'locale'        => $gpUserProfile['locale'],
                    'picture'       => $gpUserProfile['picture']
                );
                 //print_r($gpUserData);
                $userData = $user->checkUser($gpUserData);
                //Storing user data into session
                $_SESSION['userData'] = $userData;
                $_SESSION['user'] = $_SESSION['userData'];
                //Render google profile data
                if(!empty($userData)){
                    $output .= header("Location:index.php?ctl=login"); 
                }else{
                        $output = '<h3 style="color:red">Some problem occurred, please try again.</h3>';
               }
            } else {
                $authUrl = $gClient->createAuthUrl();
                $output = '<a class="button" href="'.filter_var($authUrl, FILTER_SANITIZE_URL).'"><h3><i class="fa fa-google-plus" aria-hidden="true"></i>LOGIN WITH GOOGLE <b>+</b></h3></a>';
            }
           
         /*#######################################*/
            require __DIR__ .'/../templates/front/login.php';   
        }else{ 
           $res= $user->selectUsuari($_POST['name']);
            if ($resultado=count($res)> 0) {
                $hash=password_hash($res[0]['password'], PASSWORD_DEFAULT);
                   if(password_verify($_POST["passw"], $hash)){
                      $_SESSION["user"] = $res;
                        header('Location:index.php?ctl=home');
                    }else{
                  echo "<h3>Contrasenya incorrecta</h3>";      
                }
            } else {
               echo "L'usuari no existeix creis'en un";
            }
        }
         
     }
     function logs(){
          $fitxer = @fopen("logs.txt", "a");// obrir

        if (!$fitxer){
            echo "No es pot obrir el fitxer";
        }else{
            if(isset($_SESSION["user"])){
                $var= "\r\n".$corr . $_SESSION["usuari"][1] . " ---> " . date("l jS \of F Y h:i:s A");
            }fwrite($fitxer, $var);
     }fclose($fitxer);
     }
     public function registra(){
        if (isset($_POST['user'])){
                $user = new user();
                $pass=password_hash($_POST["pssw"], PASSWORD_DEFAULT);
                $user->insert_user($_POST['nom'],$_POST['cognom'],$_POST[''],$_POST['email'],$_POST['name'],$pass,$_POST['gender'],$_POST['locale']);
                echo "<script>alert('categoria dade de alta');</script>";
                header('Location:index.php?ctl=login');
            }else
        require __DIR__.'/../templates/front/regis.php'; 
     }
     public function tienda(){
		$prod = new carro();
        $idCat = $prod->select_cat_id();
        $i=0; 
        foreach ($idCat as $key => $val){
            $id[$i] = $val["idCategoria"];
            $nom[$i] = $val["nom_cat"];
            $product[]=$prod->select_prod($id[$i]);
            $i++;
         }
		require __DIR__.'/../templates/front/tienda.php';
	}
    public function carrito(){
        $id = $_GET['id'];
        if (isset($_GET['id'])){
            $carro = new carro();
            $pd = $carro->select_prod($id);
            foreach ($pd as  $key => $value){
                $id = $value["idProducte"];
                $nom = $value["nomProducte"];
                $desc = $value["descripcioProducte"];
                $preu = $value["preu"];
                $url = $value["imagen"];
            }
            $producte = array ("id"=>$id, "nom"=>$nom, "descripcio"=>$desc, "preu"=>$preu, "foto"=>$url);
        
            $_SESSION["producte"][]= $producte;
            
              
        } if(isset($_SESSION["producte"])){
                $_SESSION["preu"]+=$value["preu"];
        }else {
            header('Location:index.php?ctl=carrito');
        }
        require __DIR__.'/../templates/front/carrito.php';
    }
     
     function elimProdCarro(){
        $preu=$_SESSION["producte"][$_GET["pos"]]['preu'];
         $_SESSION["preu"]-=$preu;
         unset($_SESSION["producte"][$_GET["pos"]]);
         
        require __DIR__.'/../templates/front/carrito.php';
        //header('Location:index.php?ctl=carrito');
     }
     function cancelarCarro(){
         unset($_SESSION["productes"]);
         header('Location:index.php?ctl=tienda');
     }
     function confirmar(){
         if (isset($_SESSION["user"])){
             if(isset($_SESSION["producte"])){
                 
                 $total=$_SESSION["preu"]*100;
                  $estat="guardat";
             $idusu=$_SESSION["user"]["idUsuari"];
             $comentari="";
             $preu=$_SESSION["preu"];
             $cmd = new comande();
             $cmd->insertar_com($idusu,$estat,$preu,$comentari);
             $idcom=$cmd->sel_com($idusu);        
             $idComan=$idcom[0]['idComanda'];
                 foreach($_SESSION['producte'] as $val){
                     $idP=$val['id'];
                     
                     $cant="cant+$idP";
                    $quant=$_POST['$cant'];
                     print_r($quant);
                     $cmd->insertar_Prodcom($idComan,$idP,$quant);
                 }
                 // Se crea Objeto
	$miObj = new RedsysAPI;
		
	// Valores de entrada
	$fuc="72970541";
	$terminal="1";
	$moneda="978";
	$trans="0";
	$url="http://jordier.coolpage.biz/index.php?ctl=confirmar";
	$urlOKKO="http://jordier.coolpage.biz/index.php?ctl=compraHecha";
	$id=time();
	$amount=$total;
	
	// Se Rellenan los campos
	$miObj->setParameter("DS_MERCHANT_AMOUNT",$amount);
	$miObj->setParameter("DS_MERCHANT_ORDER",strval($id));
	$miObj->setParameter("DS_MERCHANT_MERCHANTCODE",$fuc);
	$miObj->setParameter("DS_MERCHANT_CURRENCY",$moneda);
	$miObj->setParameter("DS_MERCHANT_TRANSACTIONTYPE",$trans);
	$miObj->setParameter("DS_MERCHANT_TERMINAL",$terminal);
	$miObj->setParameter("DS_MERCHANT_MERCHANTURL",$url);
	$miObj->setParameter("DS_MERCHANT_URLOK",$urlOKKO);		
	$miObj->setParameter("DS_MERCHANT_URLKO",$urlOKKO);

	//Datos de configuración
	$version="HMAC_SHA256_V1";
	$kc = 'Mk9m98IfEblmPfrpsawt7BmxObt98Jev';//Clave recuperada de CANALES
	// Se generan los parámetros de la petición
	$request = "";
	$params = $miObj->createMerchantParameters();
	$signature = $miObj->createMerchantSignature($kc);
    require __DIR__.'/../templates/front/conf_carro.php';
            }else{
                 echo "no existe sesion producte";
                 header("Location:index.php?ctl=carrito");
             }
         }else{
             echo "no existe session user";
             header("Location:index.php?ctl=login");
        } 
     }
     function compraHecha(){
         $miObj = new RedsysAPI;


	if (!empty( $_POST ) ) {//URL DE RESP. ONLINE
					
					$version = $_POST["Ds_SignatureVersion"];
					$datos = $_POST["Ds_MerchantParameters"];
					$signatureRecibida = $_POST["Ds_Signature"];
					

					$decodec = $miObj->decodeMerchantParameters($datos);	
					$kc = 'Mk9m98IfEblmPfrpsawt7BmxObt98Jev'; //Clave recuperada de CANALES
					$firma = $miObj->createMerchantSignatureNotif($kc,$datos);	

					if ($firma === $signatureRecibida){
						echo "FIRMA OK";
                        $estat="pagat";             $idus=$_SESSION["user"]["idUsuari"];
                        $cmd = new comande();
                        $cmd->modificar_com($idus,$estat);
                        header("Location:index.php?ctl=factura");
                        
					} else {
						echo "FIRMA KO";
					}
	}
     }
     function factura(){
             require __DIR__.'/../templates/front/factura.php';

     }

}
?>