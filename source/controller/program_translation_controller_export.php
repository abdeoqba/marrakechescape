<?php 

  $need_class = true;
  $need_db = true;
  $need_auth = true;
  include("../init.php");

  header('Content-Type: text/csv; charset=utf-8');
  header('Content-Disposition: attachment; filename=program_translations.csv');

  $output = fopen("php://output", "w");
  fputcsv($output, array("id_program_translation","deleted_at","id_program","language","title","description","content","includes","excludes","highlights"));
  
  $program_translation = new ProgramTranslation();
  $program_translation->getAllProgramTranslation(0);

  foreach ($program_translation->assoc_program_translations as $c)
    fputcsv($output, $c);
    
  fclose($output);

?>