<?php 

  $need_class = true;
  $need_db = true;
  $need_auth = true;
  include("../init.php");

  header('Content-Type: text/csv; charset=utf-8');
  header('Content-Disposition: attachment; filename=clients.csv');

  $output = fopen("php://output", "w");
  fputcsv($output, array("id_client","deleted_at","first_name","last_name","email","phone"));
  
  $client = new Client();
  $client->getAllClient(0);

  foreach ($client->assoc_clients as $c)
    fputcsv($output, $c);
    
  fclose($output);

?>