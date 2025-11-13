<?php 

  if(isset($_POST) && is_array($_POST)){
    $action = "restore";


    include("bookings_controller_main.php");
  }

?>