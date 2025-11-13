<?php 

  $need_class = true;
  $need_db = true;
  $need_auth = true;
  include("../init.php");

  header('Content-Type: text/csv; charset=utf-8');
  header('Content-Disposition: attachment; filename=category_translations.csv');

  $output = fopen("php://output", "w");
  fputcsv($output, array("id_category_translation","deleted_at","id_category","language","title","description","content"));
  
  $category_translation = new CategoryTranslation();
  $category_translation->getAllCategoryTranslation(0);

  foreach ($category_translation->assoc_category_translations as $c)
    fputcsv($output, $c);
    
  fclose($output);

?>