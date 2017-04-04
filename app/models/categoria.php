<?php
	require_once 'connexio.php';

	
	class categoria extends connexio{
		private $nom;
		private $descrip;


		function __construct($nom='',$descrip=''){
			$this->nom=$nom;
			$this->descrip=$descrip;
			parent::__construct();
		}
		
		function insertar_cat($nom,$descrip){
			$query = "INSERT into categoria (nom_cat, descrip_cat) 
						VALUES('".$this->nom."', '".$this->descrip."')";
			return $this->query_simple($query);	

		}
		function llistar_cat(){
			$query="SELECT * from categoria";
            return $this->query_return($query);
            
		}
		function select_cat($id){
			$query = "SELECT * from categoria where idCategoria='$id'";
			return $this->query_return($query);

		}
		function modificar_cat($id,$nomnou,$descripnou){
			$query="UPDATE categoria SET nom_cat='".$nomnou."', descrip_cat='".$descripnou."'
						Where idCategoria=$id";
			return $this->query_simple($query);	

		}
		function eliminar_cat($id){
			$query="DELETE FROM categoria WHERE idCategoria='$id'";
			return $this->query_simple($query);
		}
       

	}
?>