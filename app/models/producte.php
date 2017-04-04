<?php
class producte extends connexio{
		private $nomP;
		private $descripP;
		private $preu;
		private $stock;
		private $img;
		private $cat;   


		function __construct($nomP='',$descripP='',$preu='',$stock='',$cat='',$img=''){
			$this->nomP=$nomP;
			$this->descripP=$descripP;
			$this->preu=$preu;
			$this->stock=$stock;
			$this->img=$img;
			$this->cat=$cat;
			parent::__construct();
		}
		
		function insertar_prod(){

		$query = "INSERT into producte (nomProducte, descripcioProducte,preu,stock,idcat,imagen) 
						VALUES('".$this->nomP."', '".$this->descripP."',".$this->preu.",".$this->stock.",".$this->cat.",'".$this->img."')";
			return $this->query_simple($query);
		}
		function select_categ(){
			$query = "SELECT * FROM categoria ";
			return $this->query_return($query);
		}
        function select_cat_name($id){
			$query = "SELECT nom_cat FROM categoria WHERE idCategoria='$id'";
			return $this->query_return($query);
		}
		function llistar_prod(){
			$query="SELECT * from producte";
            return $this->query_return($query);
		}
		function select_prod($id){
			$query = "SELECT * from producte where idProducte='$id'";
			return $this->query_return($query);

		}
		function modificar_prod($id,$nomnou,$descripnou,$preunou,$stocknou,$idcatnou,$imagenou=''){
			$query="UPDATE producte SET nomProducte='".$nomnou."', descripcioProducte='".$descripnou."', preu='".$preunou."', stock='".$stocknou."',idcat='".$idcatnou."', imagen='".$imagenou."' Where idProducte=$id";
			return $this->query_simple($query);	

		}
		function eliminar_prod($id){
			$query="DELETE FROM producte WHERE idProducte='$id'";
			return $this->query_simple($query);
		}
        
}
?>