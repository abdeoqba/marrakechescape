<?php
  
  $need_class = true;
  $need_auth = true;
  $need_db = true;

  $url = "";
  $keywords = "";
  $title = "";
  $description = "";
  $image = "";

  $title_head = "Program";
  $admin = "program";

  include("../../init.php");
  variables::cd(1);

  $program = new Program();
  $id_program = $_GET["id_program"];
  $program->get($id_program);

  include(variables::$root."/source/view/section/admin_header.php"); 

?>

      <div class="container py-5">
        <div class="row">
          <div class="col-lg-12">
            <a href="#" onclick="history.back();" class="btn btn-outline-primary mb-3">
              <i class="fa fa-arrow-left"></i> Back
            </a>
            <h2>Program</h2>
          </div>
          <div class="col-lg-12">
              
              <?php if(!empty($program->deleted_at)){ ?>
                <b>Deleted At</b>: <?= $program->deleted_at; ?><br>
              <?php } ?>
              <b>Program</b>: <?=$program->id_program; ?><br>
              <b>Category</b>: <?=$program->id_category; ?><br>
              <b>Image</b>: <?=$program->id_image; ?><br>
              <b>Nbr Days</b>: <?=$program->nbr_days; ?><br>
              <b>Start</b>: <?=$program->start; ?><br>
              <b>End</b>: <?=$program->end; ?><br>
              <b>Price</b>: <?=$program->price; ?><br>
              
          </div>
        </div>
      </div>
      <form action="programs-export" method="post" id="export_form"></form>
      
      <script>
      </script>

  <?php include(variables::$root."/source/view/section/admin_footer.php"); ?>