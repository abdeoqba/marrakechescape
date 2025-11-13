<?php
  
  $need_class = true;
  $need_auth = true;
  $need_db = true;

  include("../init.php");
  variables::cd(1);

  $history = new cg_history();
  $history->save("disconnect",NULL,"","");


	//session_start();
	session_destroy();
	header('Location: login');
	exit;
?>