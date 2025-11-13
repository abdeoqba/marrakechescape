<?php 

  if(isset($_POST) && is_array($_POST)){
    $action = "add";


    include("post_controller_main.php");
  }

?>