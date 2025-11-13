<?php 

  if(isset($_POST) && is_array($_POST)){
    $action = "update";


    include("payments_controller_main.php");
  }

?>