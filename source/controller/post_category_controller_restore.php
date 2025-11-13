<?php 

  if(isset($_POST) && is_array($_POST)){
    $action = "restore";


    include("post_category_controller_main.php");
  }

?>