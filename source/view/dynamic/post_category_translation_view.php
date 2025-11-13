<?php
  
  $need_class = true;
  $need_auth = true;
  $need_db = true;

  $url = "";
  $keywords = "";
  $title = "";
  $description = "";
  $image = "";

  $title_head = "Post Category Translation";
  $admin = "post_category_translation";

  include("../../init.php");
  variables::cd(1);

  $post_category_translation = new PostCategoryTranslation();
  $id_post_category_translation = $_GET["id_post_category_translation"];
  $post_category_translation->get($id_post_category_translation);

  include(variables::$root."/source/view/section/admin_header.php"); 

?>

      <div class="container py-5">
        <div class="row">
          <div class="col-lg-12">
            <a href="#" onclick="history.back();" class="btn btn-outline-primary mb-3">
              <i class="fa fa-arrow-left"></i> Back
            </a>
            <h2>Post Category Translation</h2>
          </div>
          <div class="col-lg-12">
              
              <?php if(!empty($post_category_translation->deleted_at)){ ?>
                <b>Deleted At</b>: <?= $post_category_translation->deleted_at; ?><br>
              <?php } ?>
              <b>PostCategoryTranslation</b>: <?=$post_category_translation->id_post_category_translation; ?><br>
              <b>Post Category</b>: <?=$post_category_translation->id_post_category; ?><br>
              <b>Language</b>: <?=$post_category_translation->language; ?><br>
              <b>Title</b>: <?=$post_category_translation->title; ?><br>
              <b>Description</b>: <?=$post_category_translation->description; ?><br>
              
          </div>
        </div>
      </div>
      <form action="post_category_translations-export" method="post" id="export_form"></form>
      
      <script>
      </script>

  <?php include(variables::$root."/source/view/section/admin_footer.php"); ?>