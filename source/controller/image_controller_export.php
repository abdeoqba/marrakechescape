<?php 

  $need_class = true;
  $need_db = true;
  $need_auth = true;
  include("../init.php");

  header('Content-Type: text/csv; charset=utf-8');
  header('Content-Disposition: attachment; filename=images.csv');

  $output = fopen("php://output", "w");
  fputcsv($output, array("id_image","deleted_at","photo_file","alt_text"));
  
  $image = new Image();
  $image->getAllImage(0);

  foreach ($image->assoc_images as $c)
    fputcsv($output, $c);
    
  fclose($output);

?>