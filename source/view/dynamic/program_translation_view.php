<?php
  
  $need_class = true;
  $need_auth = true;
  $need_db = true;

  $url = "";
  $keywords = "";
  $title = "";
  $description = "";
  $image = "";

  $title_head = "Program Translation";
  $admin = "program_translation";

  include("../../init.php");
  variables::cd(1);

  $program_translation = new ProgramTranslation();
  $id_program_translation = $_GET["id_program_translation"];
  $program_translation->get($id_program_translation);

  include(variables::$root."/source/view/section/admin_header.php"); 

?>

      <div class="container py-5">
        <div class="row">
          <div class="col-lg-12">
            <a href="#" onclick="history.back();" class="btn btn-outline-primary mb-3">
              <i class="fa fa-arrow-left"></i> Back
            </a>
            <h2>Program Translation</h2>
          </div>
          <div class="col-lg-12">
              
              <?php if(!empty($program_translation->deleted_at)){ ?>
                <b>Deleted At</b>: <?= $program_translation->deleted_at; ?><br>
              <?php } ?>
              <b>ProgramTranslation</b>: <?=$program_translation->id_program_translation; ?><br>
              <b>Program</b>: <?=$program_translation->id_program; ?><br>
              <b>Language</b>: <?=$program_translation->language; ?><br>
              <b>Title</b>: <?=$program_translation->title; ?><br>
              <b>Description</b>: <?=$program_translation->description; ?><br>
              <b>Content</b>: <?=$program_translation->content; ?><br>
              <b>Includes</b>: <?=$program_translation->includes; ?><br>
              <b>Excludes</b>: <?=$program_translation->excludes; ?><br>
              <b>Highlights</b>: <?=$program_translation->highlights; ?><br>
              
          </div>
        </div>
      </div>
      <form action="program_translations-export" method="post" id="export_form"></form>
      
      <script>
      </script>

  <?php include(variables::$root."/source/view/section/admin_footer.php"); ?>