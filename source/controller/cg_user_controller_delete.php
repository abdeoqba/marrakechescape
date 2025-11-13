<?php 

  if(isset($_POST) && is_array($_POST)){
    $action = "delete";
    include("cg_user_controller_main.php");
  }

?>