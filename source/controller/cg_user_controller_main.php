<?php 

  $need_class = true;
  $need_db = true;
  $need_auth = true;
  include("../init.php");

  $cg_user = new cg_user();

  $cg_user->do_action($action,$_POST);

  header("Location: " . $_SERVER["HTTP_REFERER"]);


?>