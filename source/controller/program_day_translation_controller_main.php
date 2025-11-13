<?php 

  $need_class = true;
  $need_db = true;
  $need_auth = true;
  include("../init.php");

  $program_day_translation = new ProgramDayTranslation();

  $program_day_translation->do_action($action,$_POST);

  if(!variables::$sql_query_debug)
    header("Location: " . $_SERVER["HTTP_REFERER"]);


?>