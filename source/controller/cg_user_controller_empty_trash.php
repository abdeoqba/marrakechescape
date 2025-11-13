<?php 

  if(isset($_POST) && is_array($_POST)){
    $action = "empty_trash";
    include("cg_user_controller_main.php");
  }

?>