<?php 

  if(isset($_POST) && is_array($_POST)){
    $action = "update";


    include("client_controller_main.php");
  }

?>