<?php 

  if(isset($_POST) && is_array($_POST)){
    $action = "delete";


    include("post_category_controller_main.php");
  }

?>