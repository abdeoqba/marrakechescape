<?php
  
  $need_class = true;
  $need_auth = true;
  $need_db = true;

  $url = "";
  $keywords = "";
  $title = "";
  $description = "";
  $image = "";

  $title_head = "Image";
  $admin = "image";

  include("../../init.php");
  variables::cd(1);

  $image = new Image();
  $id_image = $_GET["id_image"];
  $image->get($id_image);

  include(variables::$root."/source/view/section/admin_header.php"); 

?>

      <div class="container py-5">
        <div class="row">
          <div class="col-lg-12">
            <a href="#" onclick="history.back();" class="btn btn-outline-primary mb-3">
              <i class="fa fa-arrow-left"></i> Back
            </a>
            <h2>Image</h2>
          </div>
          <div class="col-lg-12">
              
              <?php if(!empty($image->deleted_at)){ ?>
                <b>Deleted At</b>: <?= $image->deleted_at; ?><br>
              <?php } ?>
              <b>Image</b>: <?=$image->id_image; ?><br>
              <b>Photo File</b>: <img src="<?= variables::$cd . $image->photo_file; ?>" class="img-thumbnail w-100"><br>
              <b>Alt Text</b>: <?=$image->alt_text; ?><br>
              
          </div>
        </div>
      </div>
      <form action="images-export" method="post" id="export_form"></form>
      
      <script>
      </script>

  <?php include(variables::$root."/source/view/section/admin_footer.php"); ?>