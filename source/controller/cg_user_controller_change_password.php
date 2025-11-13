<?php 

  if(isset($_GET) && is_array($_GET)){
    $action = "change_password";
    include("cg_user_controller_main.php");
  }

?>