<?php 

  $need_class = true;
  $need_db = true;
  $need_auth = true;
  include("../init.php");

  header('Content-Type: text/csv; charset=utf-8');
  header('Content-Disposition: attachment; filename=post_categorys.csv');

  $output = fopen("php://output", "w");
  fputcsv($output, array("id_post_category","deleted_at","id_image"));
  
  $post_category = new PostCategory();
  $post_category->getAllPostCategory(0);

  foreach ($post_category->assoc_post_categorys as $c)
    fputcsv($output, $c);
    
  fclose($output);

?>