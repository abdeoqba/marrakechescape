<?php
  
  $need_class = true;
  $need_auth = true;
  $need_db = true;

  $url = "";
  $keywords = "";
  $title = "";
  $description = "";
  $image = "";

  $title_head = "Payments";
  $admin = "payments";

  include("../../init.php");
  variables::cd(1);

  $payments = new Payments();
  $id_payments = $_GET["id_payments"];
  $payments->get($id_payments);

  include(variables::$root."/source/view/section/admin_header.php"); 

?>

      <div class="container py-5">
        <div class="row">
          <div class="col-lg-12">
            <a href="#" onclick="history.back();" class="btn btn-outline-primary mb-3">
              <i class="fa fa-arrow-left"></i> Back
            </a>
            <h2>Payments</h2>
          </div>
          <div class="col-lg-12">
              
              <?php if(!empty($payments->deleted_at)){ ?>
                <b>Deleted At</b>: <?= $payments->deleted_at; ?><br>
              <?php } ?>
              <b>Payments</b>: <?=$payments->id_payments; ?><br>
              <b>Booking</b>: <?=$payments->id_booking; ?><br>
              <b>Amount</b>: <?=$payments->amount; ?><br>
              <b>Gateway</b>: <?=$payments->gateway; ?><br>
              <b>Status</b>: <?=$payments->status; ?><br>
              
          </div>
        </div>
      </div>
      <form action="paymentss-export" method="post" id="export_form"></form>
      
      <script>
      </script>

  <?php include(variables::$root."/source/view/section/admin_footer.php"); ?>