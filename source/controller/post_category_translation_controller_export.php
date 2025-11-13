<?php 

  $need_class = true;
  $need_db = true;
  $need_auth = true;
  include("../init.php");

  header('Content-Type: text/csv; charset=utf-8');
  header('Content-Disposition: attachment; filename=post_category_translations.csv');

  $output = fopen("php://output", "w");
  fputcsv($output, array("id_post_category_translation","deleted_at","id_post_category","language","title","description"));
  
  $post_category_translation = new PostCategoryTranslation();
  $post_category_translation->getAllPostCategoryTranslation(0);

  foreach ($post_category_translation->assoc_post_category_translations as $c)
    fputcsv($output, $c);
    
  fclose($output);

?>