<?php 

  if(isset($_POST) && is_array($_POST)){
    $action = "restore_all";


    include("post_comment_controller_main.php");
  }

?>