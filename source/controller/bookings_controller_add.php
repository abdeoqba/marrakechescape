<?php 

  if(isset($_POST) && is_array($_POST)){
    $action = "add";


    include("bookings_controller_main.php");
  }

?>