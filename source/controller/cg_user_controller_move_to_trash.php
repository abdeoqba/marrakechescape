<?php 

  if(isset($_POST) && is_array($_POST)){
    $action = "move_to_trash";
    include("cg_user_controller_main.php");
  }

?>