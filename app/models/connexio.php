<?php
class connexio {
        private $conn;
	    private $_host = "localhost";
	    private $_username = "root";
	    private $_password = "";
	    private $_database = "botiga";
        private $userTbl    = 'usuari';
    
		public function __construct(){  
	       			$this->conn = new mysqli("localhost", "root", "", "botiga");
                    
	       			if ($this->conn->connect_error) {  
	        			 throw new Exception('Fallo en la conexion con la BD: ' . $this->conn->connect_error);  
	      			}
	   	}

	   	public function query_simple($sql){
	   			$this->conn->query($sql);
	   			/*if ($this->conn->query($sql) !== TRUE) {
	   					throw new Exception("Error al executar la query");

	   			}*/
	   	}
public function query_return($sql){
	   	$result = $this->conn->query($sql);
	   	$ret=array();
	   	while ($row = $result->fetch_assoc()){
	   				$ret[]= $row;
	   			}
	   			if (!$result ) {
	   					throw new Exception("Error al executar la query");/*TENIR EN COMPTE PER K POT SER K ESTIGA BUIDA*/
	   			}
	   			return $ret;
	   	}
        function checkUser($userData=array()){
            print_r($userData);
        if(!empty($userData)){
            //Check whether user data already exists in database
            $prevQuery = "SELECT * FROM ".$this->userTbl." WHERE oauth_provider = '".$userData['oauth_provider']."' AND oauth_uid = '".$userData['oauth_uid']."'";
            $prevResult = $this->conn->query($prevQuery);
            if($prevResult->num_rows > 0){
                //Update user data if already exists
                $query = "UPDATE ".$this->userTbl." SET nom = '".$userData['nom']."', cognom = '".$userData['cognom']."', email = '".$userData['email']."', gender = '".$userData['gender']."', locale = '".$userData['locale']."', picture = '".$userData['picture']."' WHERE oauth_provider = '".$userData['oauth_provider']."' AND oauth_uid = '".$userData['oauth_uid']."'";
                $update = $this->conn->query($query);
            }else{
                //Insert user data
                $query = "INSERT INTO ".$this->userTbl." SET oauth_provider = '".$userData['oauth_provider']."', oauth_uid = '".$userData['oauth_uid']."', nom = '".$userData['nom']."', cognom = '".$userData['cognom']."', email = '".$userData['email']."', user = '".$userData['email']."',  gender = '".$userData['gender']."', locale = '".$userData['locale']."', picture = '".$userData['picture']."', created = '".date("Y-m-d H:i:s")."'";
                print_r($query);
                $insert = $this->conn->query($query);
            }
            
            //Get user data from the database
            $result = $this->conn->query($prevQuery);
            $userData = $result->fetch_assoc();
        }
        
        //Return user data
        return $userData;
    }
}

?>