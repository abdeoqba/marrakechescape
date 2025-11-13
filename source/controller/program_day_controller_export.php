<?php 

  $need_class = true;
  $need_db = true;
  $need_auth = true;
  include("../init.php");

  header('Content-Type: text/csv; charset=utf-8');
  header('Content-Disposition: attachment; filename=program_days.csv');

  $output = fopen("php://output", "w");
  fputcsv($output, array("id_program_day","deleted_at","id_program","day_order"));
  
  $program_day = new ProgramDay();
  $program_day->getAllProgramDay(0);

  foreach ($program_day->assoc_program_days as $c)
    fputcsv($output, $c);
    
  fclose($output);

?>