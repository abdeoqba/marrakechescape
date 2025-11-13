<?php 

  $need_class = true;
  $need_db = true;
  $need_auth = true;
  include("../init.php");

  header('Content-Type: text/csv; charset=utf-8');
  header('Content-Disposition: attachment; filename=post_translations.csv');

  $output = fopen("php://output", "w");
  fputcsv($output, array("id_post_translation","deleted_at","id_post","language","title","slug","content","meta_title","meta_description","excerpt"));
  
  $post_translation = new PostTranslation();
  $post_translation->getAllPostTranslation(0);

  foreach ($post_translation->assoc_post_translations as $c)
    fputcsv($output, $c);
    
  fclose($output);

?>