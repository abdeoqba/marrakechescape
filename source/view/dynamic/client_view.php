<?php
  
  $need_class = true;
  $need_auth = true;
  $need_db = true;

  $url = "";
  $keywords = "";
  $title = "";
  $description = "";
  $image = "";

  $title_head = "Client";
  $admin = "client";

  include("../../init.php");
  variables::cd(1);

  $client = new Client();
  $id_client = $_GET["id_client"];
  $client->get($id_client);

  include(variables::$root."/source/view/section/admin_header.php"); 

?>

      <div class="container py-5">
        <div class="row">
          <div class="col-lg-12">
            <a href="#" onclick="history.back();" class="btn btn-outline-primary mb-3">
              <i class="fa fa-arrow-left"></i> Back
            </a>
            <h2>Client</h2>
          </div>
          <div class="col-lg-12">
              
              <?php if(!empty($client->deleted_at)){ ?>
                <b>Deleted At</b>: <?= $client->deleted_at; ?><br>
              <?php } ?>
              <b>Client</b>: <?=$client->id_client; ?><br>
              <b>First Name</b>: <?=$client->first_name; ?><br>
              <b>Last Name</b>: <?=$client->last_name; ?><br>
              <b>Email</b>: <?=$client->email; ?><br>
              <b>Phone</b>: <?=$client->phone; ?><br>
              
          </div>
        </div>
      </div>
      <form action="clients-export" method="post" id="export_form"></form>
      
      <script>
      </script>

  <?php include(variables::$root."/source/view/section/admin_footer.php"); ?>