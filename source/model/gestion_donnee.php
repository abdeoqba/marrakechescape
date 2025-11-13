<?php 
  
  class gestionConnexion{
    private $host;
    private $username;
    private $password;
    private $database;
    private $character;
    
    private $options;
    private static $link;

      public function __construct(){
        
        $this->host = variables::$host;
        $this->username = variables::$username;
        $this->password = variables::$password;
        $this->database = variables::$database;
        $this->character = variables::$character;

        $this->options = [];

        if(variables::$debug)
          $this->options = [
              PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION
          ];
        if($this->check_if_db_exist())
          self::$link = new PDO("mysql:host=".$this->host.";dbname=".$this->database, $this->username, $this->password,$this->options);

        return true;
      }

      public function requete($requete) {
        self::$link->query("SET NAMES '$this->character';");
        $result = self::$link->query($requete);
        return $result;
      }

      public function modifier($requete){
        self::$link->query("SET NAMES '$this->character';");
        return self::$link->exec($requete);
      }

      public function getLastInsertedId(){
        //return mysql_insert_id();
        return self::$link->lastInsertId();
      }

      public function deconnecter(){
        self::$link = NULL;
      }

      public function execute_outsite_db($sql){
        self::$link = new PDO("mysql:host=".$this->host, $this->username, $this->password,$this->options);
        self::$link->query("SET NAMES '$this->character';");
        $this->modifier($sql);
        return true;
      }

      public function select_outsite_db($sql){
        self::$link = new PDO("mysql:host=".$this->host, $this->username, $this->password,$this->options);
        self::$link->query("SET NAMES '$this->character';");
        return $this->requete($sql);
      }

      public function check_if_db_exist(){
        $sql = "SELECT COUNT(*) FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '".$this->database."';";
        $result = $this->select_outsite_db($sql);
        $db_is_exist = $result->fetch()[0];
        return $db_is_exist;
        // echo $db_is_exist;
      }

  }

 ?>