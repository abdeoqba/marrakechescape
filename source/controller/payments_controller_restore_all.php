<?php 

  if(isset($_POST) && is_array($_POST)){
    $action = "restore_all";


    include("payments_controller_main.php");
  }

?>