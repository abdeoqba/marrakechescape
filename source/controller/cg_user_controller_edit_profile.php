<?php 

  if(isset($_GET) && is_array($_GET)){
    $action = "edit_profile";
    include("cg_user_controller_main.php");
  }

?>