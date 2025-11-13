<?php 

  $need_class = true;
  $need_db = true;
  $need_auth = true;
  include("../init.php");

  header('Content-Type: text/csv; charset=utf-8');
  header('Content-Disposition: attachment; filename=paymentss.csv');

  $output = fopen("php://output", "w");
  fputcsv($output, array("id_payments","deleted_at","id_booking","amount","gateway","status"));
  
  $payments = new Payments();
  $payments->getAllPayments(0);

  foreach ($payments->assoc_paymentss as $c)
    fputcsv($output, $c);
    
  fclose($output);

?>