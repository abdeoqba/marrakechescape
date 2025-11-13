<?php

  $checked= false;
  if(session_status()!=PHP_SESSION_ACTIVE and !isset($_SESSION))
    session_start();

	if(!empty($_SESSION[variables::$prefix.'role']))
		$checked= true;

  if(!$checked)
    header('Location: login');

?>