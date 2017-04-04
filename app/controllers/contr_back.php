<?php

/*$hash=password_hash("rasmuslerdorf", PASSWORD_DEFAULT);
if (password_verify('rasmuslerdorf', $hash)) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}    
25*/
class contr_back{
	
	public function inicio(){
		require __DIR__ . '/../templates/back/inicio.php';
	}
	public function logout(){
		require __DIR__ . '/../templates/back/logout.php';
	}
	
	public function alta_categoria(){
		try{
			if (isset($_POST['nom_cat'])){
				$cat = new categoria($_POST['nom_cat'],$_POST['descrip_cat']);
				$cat->insertar_cat($_POST['nom_cat'],$_POST['descrip_cat']);
				$msg = "<script>alert('categoria dade de alta');</script>";
				header('Location:index.php?ctl=alta_categoria');
			}else 
			require __DIR__ . '/../templates/back/alta_categoria.php';
		}catch(Exception $e){
    		echo 'Excepción capturada: ',  $e->getMessage(), "\n";
		}
	}
	public function llistar_cat(){
		$c=new categoria();
		$params=$c->llistar_cat();
		require __DIR__.'/../templates/back/llistar_categoria.php';
	}
	public function modificar_cat(){
		$cat = new categoria();
		if (isset($_POST['nomnou'])){
			$cat->modificar_cat($_POST['id'],$_POST['nomnou'],$_POST['descripnou']);	
			header('Location:index.php?ctl=llistar_cat');	
		}elseif (isset($_GET['id'])) {
			
			$params=$cat->select_cat($_GET['id']);
			require __DIR__.'/../templates/back/modificar_categoria.php';
			
		}else 
			header('Location:index.php?ctl=llistar_cat');
		
		
	}
	public function eliminar_cat(){
		$elim_cat = new categoria();
		$eliminat ='';
		if (isset($_GET['id'])) {
			$elim_cat->eliminar_cat($_GET['id']);
			$eliminat = "<script>alert('<h2>S'ha eliminat la categoria</h2>');</script>";
		}else{ 
			$eliminat = "<script>alert('<h2>NO S'HA POGUT ELIMINAR LA CATEGORIA</h2>');</script>";
        }
         echo $eliminat;
        header('Location:index.php?ctl=llistar_cat');
       
	}
	public function checkImage($target_file,$imageFileType){
		$uploadOk =1;
		if (isset($_FILES['img'])) {
			// Check if image file is a actual image or fake image
			if(isset($_POST["submit"])) {
			    $check = getimagesize($_FILES["img"]["tmp_name"]);
			    if($check !== false) {
			        echo "File is an image - " . $check["mime"] . ".";

			        $uploadOk = 1;
			    } else {
			        echo "File is not an image.";
			        $uploadOk = 0;
			    }
			}
			// Check if file already exists
			/*if (file_exists($target_file)) {
				 echo "Sorry, file already exists.";
    			$uploadOk = 0;
			}*/
			// Check file size
			if ($_FILES["img"]["size"] > 500000) {
			    echo "Sorry, your file is too large.";
			    $uploadOk = 0;
			}// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
			    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			    $uploadOk = 0;
			}
		}else{
			echo "<h2>No s'ha enviat la imatge</h2>";
		}
		return $uploadOk;
	}

	public function alta_product(){
		$p=new producte();
        
        if (isset($_POST['nom_P'])){
			$categ = $p->select_cat_name($_POST['categoria']);
				$target_dir = "./imagenes/".$categ;
			     if(!file_exists($target_dir)){
                     mkdir($target_dir);
                 }
			
			$target_file = $target_dir . basename($_FILES["img"]["name"]);
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			$uploadImg = $this->checkImage($target_file,$imageFileType);
			// Check if $uploadImg is set to 0 by an error
			if ($uploadImg == 0) {
			    echo "Sorry, your file was not uploaded.";
			$p = new producte($_POST['nom_P'],$_POST['descrip_P'],$_POST['preu'],$_POST['stock'],$_POST['categoria']);
			} else {
			    if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
			        echo "The file ". basename( $_FILES["img"]["name"]). " has been uploaded.";
			         echo $target_file;
			        $p = new producte($_POST['nom_P'],$_POST['descrip_P'],$_POST['preu'],$_POST['stock'],$_POST['categoria'],$target_file);
			    } elseif(file_exists($target_file)) {
			        $p = new producte($_POST['nom_P'],$_POST['descrip_P'],$_POST['preu'],$_POST['stock'],$_POST['categoria'],$target_file);
			    }else{
                    echo "<script>alert('Sorry, there was an error uploading your file.');</script>";
			        $p = new producte($_POST['nom_P'],$_POST['descrip_P'],$_POST['preu'],$_POST['stock'],$_POST['categoria']);
                }
			}

			print_r($p->insertar_prod());
			header('Location:index.php?ctl=llistar_product');
		}else{
		        $categorias = $p->select_categ();
				require __DIR__ . '/../templates/back/alta_product.php';
		}
	}
	public function llistar_product(){
		$prod=new producte();
		$params=$prod->llistar_prod();
		require __DIR__ . '/../templates/back/llistar_product.php';
	}
	public function modificar_product(){
		$prod =new producte();
		if (isset($_POST['nomnou'])){
			$target_dir = "./imagenes/".$_POST['idcatnou'];
			//mkdir($target_dir);
			//print_r($_FILES);
			$target_file = $target_dir . basename($_FILES["img"]["name"]);
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			$uploadImg = $this->checkImage($target_file,$imageFileType);
			// Check if $uploadImg is set to 0 by an error
			if ($uploadImg == 0) {
			    echo "Sorry, your file was not uploaded.";
			  $mod=  $prod ->modificar_prod($_POST['id'],$_POST['nomnou'],$_POST['descripnou'],$_POST['preunou'],$_POST['stocknou'],$_POST['idcatnou']);
			// if everything is ok, try to upload file
			}else {
			    if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
			        echo "The file ". basename( $_FILES["img"]["name"]). " has been uploaded.";

					$mod=$prod->modificar_prod($_POST['id'],$_POST['nomnou'],$_POST['descripnou'],$_POST['preunou'],$_POST['stocknou'],$_POST['idcatnou'],$target_file);	
			    }else {
			        echo "Sorry, there was an error uploading your file.";
					$mod=$prod ->modificar_prod($_POST['id'],$_POST['nomnou'],$_POST['descripnou'],$_POST['preunou'],$_POST['stocknou'],$_POST['idcatnou']);	
			    }

			}
				print_r($mod);
				echo "<script>alert('Producte dat de alta');</script>";
				header('Location:index.php?ctl=llistar_product');

			print_r($_POST);
		}elseif (isset($_GET['id'])) {
			$categorias = $prod->select_categ();
			$params=$prod->select_prod($_GET['id']);
			require __DIR__.'/../templates/back/modificar_product.php';
			
		}else{ 
			require __DIR__.'/../templates/back/alta_product.php';	
		}
	}
	public function eliminar_product(){
		$elim_prod = new producte();
		if (isset($_GET['id'])) {
			$elim_prod->eliminar_prod($_GET['id']);
			header('Location:index.php?ctl=llistar_product');
			echo "<script>alert('<h2>S'ha eliminat el Producte</h2>');</script>";
		}else 
			header('Location:index.php?ctl=llistar_product');
			echo "<script>alert('<h2>NO S'HA POGUT ELIMINAR EL PRODUCTE</h2>');</script>";
	}
	public function alta_user(){
		if (isset($_POST['user'])){
				$user = new user($_POST['nom_us'],$_POST['rol'],$_POST['mail'],$_POST['user'],$_POST['pwd']);
				$user->insert_user();
				echo "<script>alert('categoria dade de alta');</script>";
				header('Location:index.php?ctl=alta_user');
			}else 
		require __DIR__.'/../templates/back/alta_user.php';	
	}
	public function llistar_user(){
		$user = new user();
		$param=$user->llistar_users();
		print_r($param);
		require __DIR__.'/../templates/back/llistar_user.php';	
	}
    public function comanda(){
        $coman = new comande();
        $prod = $coman->select_prod_com();
        require __DIR__.'/../templates/back/comanda.php';
    }
        
	/*public function modificar_user(){
		require __DIR__.'/../templates/back/alta_user.php';	
	}*/
	/*public function eliminar_user(){

		require __DIR__.'/../templates/back/alta_user.php';	
	}*/
}


  ?>