<?php 

  if(isset($_POST) && is_array($_POST)){
    $action = "delete";


    include("payments_controller_main.php");
  }

?>