<?php 

  if(isset($_POST) && is_array($_POST)){
    $action = "move_to_trash";


    include("post_comment_controller_main.php");
  }

?>