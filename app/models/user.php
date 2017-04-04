<?php 
  require_once 'connexio.php';
class user extends connexio{
      private $idUsuari;
      private $rol;
      private $nom;
      private $cognom;
      private $email;
      private $user;
      private $password;
      private $oauth_provider;
      private $oauth_uid;
      private $gender;
      private $locale;
      private $picture;
              

      function __construct($idUsuari='', $rol='', $nom='', $cognom='', $email='', $user='', $password='', $oauth_provider='', $oauth_uid='', $gender='', $locale='', $picture=''){
          $this->idUsuari=$idUsuari;
          $this->rol=$rol;
          $this->nom=$nom;
          $this->cognom=$cognom;
          $this->email=$email;
          $this->user=$user;
          $this->password=$password;
          $this->oauth_provider=$oauth_provider;
          $this->oauth_uid=$oauth_uid;
          $this->gender=$gender;
          $this->locale=$locale;
          $this->picture=$picture;
          parent::__construct();
      }
      function selectUsuari($usuari){
            $query = "SELECT * FROM usuari WHERE user='$usuari'";
            $result= $this->query_return($query);
            return $result;
      }
      function insert_user(){
       echo $query = "INSERT INTO usuari (nom, cognom, rol, email, user, password, gender, locale, picture) "
                . "VALUES('".$this->nom."','".$this->cognom."','".$this->rol."','".$this->email."','".$this->user."','".$this->password."','".$this->gender."','".$this->locale."','".$this->picture."')";
        return $this->query_simple($query);
      }
      function llistar_users(){
         $query = "SELECT * FROM usuari";
        return $this->query_return($query);
      }
} 
?>