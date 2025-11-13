<?php 

  if(isset($_POST) && is_array($_POST)){
    $action = "truncate";


    include("post_comment_controller_main.php");
  }

?>