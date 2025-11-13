<?php
  
  $need_class = true;
  $need_auth = true;
  $need_db = true;

  $url = "";
  $keywords = "";
  $title = "";
  $description = "";
  $image = "";

  $title_head = "Program Day Translation";
  $admin = "program_day_translation";

  include("../../init.php");
  variables::cd(1);

  $program_day_translation = new ProgramDayTranslation();
  $id_program_day_translation = $_GET["id_program_day_translation"];
  $program_day_translation->get($id_program_day_translation);

  include(variables::$root."/source/view/section/admin_header.php"); 

?>

      <div class="container py-5">
        <div class="row">
          <div class="col-lg-12">
            <a href="#" onclick="history.back();" class="btn btn-outline-primary mb-3">
              <i class="fa fa-arrow-left"></i> Back
            </a>
            <h2>Program Day Translation</h2>
          </div>
          <div class="col-lg-12">
              
              <?php if(!empty($program_day_translation->deleted_at)){ ?>
                <b>Deleted At</b>: <?= $program_day_translation->deleted_at; ?><br>
              <?php } ?>
              <b>ProgramDayTranslation</b>: <?=$program_day_translation->id_program_day_translation; ?><br>
              <b>Day</b>: <?=$program_day_translation->id_day; ?><br>
              <b>Language</b>: <?=$program_day_translation->language; ?><br>
              <b>Title</b>: <?=$program_day_translation->title; ?><br>
              <b>Content</b>: <?=$program_day_translation->content; ?><br>
              
          </div>
        </div>
      </div>
      <form action="program_day_translations-export" method="post" id="export_form"></form>
      
      <script>
      </script>

  <?php include(variables::$root."/source/view/section/admin_footer.php"); ?>