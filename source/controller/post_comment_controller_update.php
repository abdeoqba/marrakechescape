<?php 

  if(isset($_POST) && is_array($_POST)){
    $action = "update";


    include("post_comment_controller_main.php");
  }

?>