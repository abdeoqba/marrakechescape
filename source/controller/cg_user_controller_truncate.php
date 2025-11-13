<?php 

  if(isset($_POST) && is_array($_POST)){
    $action = "truncate";
    include("cg_user_controller_main.php");
  }

?>