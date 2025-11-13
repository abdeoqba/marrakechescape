<?php 

  $need_class = true;
  $need_db = true;
  $need_auth = true;
  include("../init.php");

  header('Content-Type: text/csv; charset=utf-8');
  header('Content-Disposition: attachment; filename=program_day_translations.csv');

  $output = fopen("php://output", "w");
  fputcsv($output, array("id_program_day_translation","deleted_at","id_day","language","title","content"));
  
  $program_day_translation = new ProgramDayTranslation();
  $program_day_translation->getAllProgramDayTranslation(0);

  foreach ($program_day_translation->assoc_program_day_translations as $c)
    fputcsv($output, $c);
    
  fclose($output);

?>