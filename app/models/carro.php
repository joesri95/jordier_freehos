<?php
	require_once 'connexio.php';

	
	class carro extends connexio{
		private $idComanda;
		private $idProducte;
		private $quantitat;


		function __construct($idComanda='',$idProducte='',$quantitat=''){
			$this->idComanda=$idComanda;
			$this->idProducte=$idProducte;
			$this->quantitat=$quantitat;
			parent::__construct();
		}
		
		/*function insertar_comanda($idComanda,$desidProductecrip,$quantitat){
			$query = "INSERT into producteComanda (idComanda, idProducte, quantitat) 
						VALUES('".$this->idComanda."','".$this->idProducte."','"$this->quantitat"')";
			return $this->query_simple($query);	
		}*/
		function select_prod($id){
            $query = "SELECT * FROM producte WHERE idcat=$id";
            return $this->query_return($query);	
        }
        function select_cat_id(){
            $query = "SELECT * FROM categoria";
            return $this->query_return($query);	

        }
       

	}
?>