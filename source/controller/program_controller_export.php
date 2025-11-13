<?php 

  $need_class = true;
  $need_db = true;
  $need_auth = true;
  include("../init.php");

  header('Content-Type: text/csv; charset=utf-8');
  header('Content-Disposition: attachment; filename=programs.csv');

  $output = fopen("php://output", "w");
  fputcsv($output, array("id_program","deleted_at","id_category","id_image","nbr_days","start","end","price"));
  
  $program = new Program();
  $program->getAllProgram(0);

  foreach ($program->assoc_programs as $c)
    fputcsv($output, $c);
    
  fclose($output);

?>