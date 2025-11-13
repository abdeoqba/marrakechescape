<?php
  
  $need_class = true;
  $need_auth = true;
  $need_db = true;

  $url = "";
  $keywords = "";
  $title = "";
  $description = "";
  $image = "";

  $title_head = "Bookings";
  $admin = "bookings";

  include("../../init.php");
  variables::cd(1);

  $bookings = new Bookings();
  $id_bookings = $_GET["id_bookings"];
  $bookings->get($id_bookings);

  include(variables::$root."/source/view/section/admin_header.php"); 

?>

      <div class="container py-5">
        <div class="row">
          <div class="col-lg-12">
            <a href="#" onclick="history.back();" class="btn btn-outline-primary mb-3">
              <i class="fa fa-arrow-left"></i> Back
            </a>
            <h2>Bookings</h2>
          </div>
          <div class="col-lg-12">
              
              <?php if(!empty($bookings->deleted_at)){ ?>
                <b>Deleted At</b>: <?= $bookings->deleted_at; ?><br>
              <?php } ?>
              <b>Bookings</b>: <?=$bookings->id_bookings; ?><br>
              <b>Client</b>: <?=$bookings->id_client; ?><br>
              <b>Program</b>: <?=$bookings->id_program; ?><br>
              <b>Number Persons</b>: <?=$bookings->persons; ?><br>
              <b>Travel Date</b>: <?=$bookings->travel_date; ?><br>
              <b>Status</b>: <?=$bookings->status; ?><br>
              <b>Total Amount</b>: <?=$bookings->total_amount; ?><br>
              
          </div>
        </div>
      </div>
      <form action="bookingss-export" method="post" id="export_form"></form>
      
      <script>
      </script>

  <?php include(variables::$root."/source/view/section/admin_footer.php"); ?>