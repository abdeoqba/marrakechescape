<?php 

  if(isset($_POST) && is_array($_POST)){
    $action = "delete";


    include("bookings_controller_main.php");
  }

?>