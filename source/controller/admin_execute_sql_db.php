<?php 

  $need_class = true;
  $need_db = true;
  $need_auth = false;
  include ("../init.php");

  //read file sql
  $file = "../../".variables::$database.".sql";
  $sql = file_get_contents($file);

  //execute it
  $cn = new GestionConnexion();
  $cn->execute_outsite_db($sql);

  header("Location: " . $_SERVER["HTTP_REFERER"]);


?>