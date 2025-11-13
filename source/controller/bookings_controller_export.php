<?php 

  $need_class = true;
  $need_db = true;
  $need_auth = true;
  include("../init.php");

  header('Content-Type: text/csv; charset=utf-8');
  header('Content-Disposition: attachment; filename=bookingss.csv');

  $output = fopen("php://output", "w");
  fputcsv($output, array("id_bookings","deleted_at","id_client","id_program","persons","travel_date","status","total_amount"));
  
  $bookings = new Bookings();
  $bookings->getAllBookings(0);

  foreach ($bookings->assoc_bookingss as $c)
    fputcsv($output, $c);
    
  fclose($output);

?>