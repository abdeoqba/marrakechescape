<?php 

  $need_class = true;
  $need_db = true;
  $need_auth = true;
  include("../init.php");

  header('Content-Type: text/csv; charset=utf-8');
  header('Content-Disposition: attachment; filename=post_comments.csv');

  $output = fopen("php://output", "w");
  fputcsv($output, array("id_post_comment","deleted_at","id_post","id_client","name","email","content","status"));
  
  $post_comment = new PostComment();
  $post_comment->getAllPostComment(0);

  foreach ($post_comment->assoc_post_comments as $c)
    fputcsv($output, $c);
    
  fclose($output);

?>