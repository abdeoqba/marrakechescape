<?php 

  $need_class = true;
  $need_db = true;
  $need_auth = true;
  include("../init.php");

  header('Content-Type: text/csv; charset=utf-8');
  header('Content-Disposition: attachment; filename=users.csv');

  $output = fopen("php://output", "w");
  fputcsv($output, array("id_user","deleted_at","username","password","role","active","allow_trash","allow_truncate","allow_read_history","allow_edit","allow_manage"));
  
  $cg_user = new User();
  $cg_user->getAllUser(0);

  foreach ($cg_user->assoc_users as $c)
    fputcsv($output, $c);
    
  fclose($output);

?>