<?php
require_once 'connexio.php';


    class comande extends connexio{
		private $idComanda;
		private $idUsuari;
        private $idProducte;
		private $estat;
		private $preuTotal;
		private $comentaris;


		function __construct($idComanda='',$idUsuari='',$estat='',$preuTotal='',$comentaris=''){
			$this->idComanda=$idComanda;
			$this->idUsuari=$idUsuari;
			$this->estat=$estat;
			$this->preuTotal=$preuTotal;
			$this->comentaris=$comentaris;
			parent::__construct();
		}
		function sel_com($idUsuari){
            $query="SELECT idComanda from comanda where idUsuari='$idUsuari'";
            return $this->query_return($query);
        }
		function insertar_com($idUsuari,$estat,$preuTotal,$comentaris){

		$query = "INSERT into comanda (idUsuari,estat,preuTotal,comentaris) 
						VALUES(".$idUsuari.", '".$estat."',".$preuTotal.",'".$comentaris."')";
			return $this->query_simple($query);
		}
        function insertar_Prodcom($idComanda,$idProducte,$quantitat){
            $query = "INSERT into productecomanda (idComanda,idProducte,quantitat) VALUES(".$idComanda.",".$idProducte.",".$quantitat.")";
			return $this->query_simple($query);
        }
        function modificar_com($id,$estatnou){
			$query="UPDATE comanda SET estat='".$estatnou."'						Where idUsuari=$id";
			return $this->query_simple($query);	

		}
		function llistar_prod(){
			$query="SELECT * from producte";
            return $this->query_return($query);
		}
		function select_prod($id){
			$query = "SELECT * from producte where idProducte='$id'";
			return $this->query_return($query);

		}
        function select_prod_com(){
            $query = "select * from productecomanda as pc inner join comanda as c ON pc.idComanda=c.idComanda inner join producte as p ON pc.idProducte=p.idProducte Group by c.idComanda";
            return $this->query_return($query);
        }
		        
}
?>