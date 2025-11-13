<?php 

  if(isset($_POST) && is_array($_POST)){
    $action = "restore_all";


    include("client_controller_main.php");
  }

?>