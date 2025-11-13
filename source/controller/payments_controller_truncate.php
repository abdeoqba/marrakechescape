<?php 

  if(isset($_POST) && is_array($_POST)){
    $action = "truncate";


    include("payments_controller_main.php");
  }

?>