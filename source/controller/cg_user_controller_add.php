<?php 

  if(isset($_POST) && is_array($_POST)){
    $action = "add";
    include("cg_user_controller_main.php");
  }

?>