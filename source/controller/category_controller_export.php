<?php 

  $need_class = true;
  $need_db = true;
  $need_auth = true;
  include("../init.php");

  header('Content-Type: text/csv; charset=utf-8');
  header('Content-Disposition: attachment; filename=categorys.csv');

  $output = fopen("php://output", "w");
  fputcsv($output, array("id_category","deleted_at","parent_id","id_image"));
  
  $category = new Category();
  $category->getAllCategory(0);

  foreach ($category->assoc_categorys as $c)
    fputcsv($output, $c);
    
  fclose($output);

?>