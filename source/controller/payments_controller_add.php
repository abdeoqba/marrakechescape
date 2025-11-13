<?php 

  if(isset($_POST) && is_array($_POST)){
    $action = "add";


    include("payments_controller_main.php");
  }

?>