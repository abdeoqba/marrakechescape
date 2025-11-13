<?php
  
  $need_class = true;
  $need_auth = true;
  $need_db = true;

  $url = "";
  $keywords = "";
  $title = "";
  $description = "";
  $image = "";

  $title_head = "Program Day";
  $admin = "program_day";

  include("../../init.php");
  variables::cd(1);

  $program_day = new ProgramDay();
  $id_program_day = $_GET["id_program_day"];
  $program_day->get($id_program_day);

  include(variables::$root."/source/view/section/admin_header.php"); 

?>

      <div class="container py-5">
        <div class="row">
          <div class="col-lg-12">
            <a href="#" onclick="history.back();" class="btn btn-outline-primary mb-3">
              <i class="fa fa-arrow-left"></i> Back
            </a>
            <h2>Program Day</h2>
          </div>
          <div class="col-lg-12">
              
              <?php if(!empty($program_day->deleted_at)){ ?>
                <b>Deleted At</b>: <?= $program_day->deleted_at; ?><br>
              <?php } ?>
              <b>ProgramDay</b>: <?=$program_day->id_program_day; ?><br>
              <b>Program</b>: <?=$program_day->id_program; ?><br>
              <b>Day Order</b>: <?=$program_day->day_order; ?><br>
              
          </div>
        </div>
      </div>
      <form action="program_days-export" method="post" id="export_form"></form>
      
      <script>
      </script>

  <?php include(variables::$root."/source/view/section/admin_footer.php"); ?>