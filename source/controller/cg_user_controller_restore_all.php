<?php 

  if(isset($_POST) && is_array($_POST)){
    $action = "restore_all";
    include("cg_user_controller_main.php");
  }

?>