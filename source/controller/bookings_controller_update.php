<?php 

  if(isset($_POST) && is_array($_POST)){
    $action = "update";


    include("bookings_controller_main.php");
  }

?>