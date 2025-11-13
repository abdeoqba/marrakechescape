<?php 

  $need_class = true;
  $need_db = true;
  $need_auth = true;
  include("../init.php");

  header('Content-Type: text/csv; charset=utf-8');
  header('Content-Disposition: attachment; filename=posts.csv');

  $output = fopen("php://output", "w");
  fputcsv($output, array("id_post","deleted_at","id_post_category","id_image","published_at","status"));
  
  $post = new Post();
  $post->getAllPost(0);

  foreach ($post->assoc_posts as $c)
    fputcsv($output, $c);
    
  fclose($output);

?>