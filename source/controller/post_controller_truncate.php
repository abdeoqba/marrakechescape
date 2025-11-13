<?php 

  if(isset($_POST) && is_array($_POST)){
    $action = "truncate";


    include("post_controller_main.php");
  }

?>