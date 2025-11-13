<?php 

  if(isset($_POST) && is_array($_POST)){
    $action = "truncate";


    include("bookings_controller_main.php");
  }

?>