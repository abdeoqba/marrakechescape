<?php
  
  $need_class = true;
  $need_auth = true;
  $need_db = true;

  $url = "";
  $keywords = "";
  $title = "";
  $description = "";
  $image = "";

  $title_head = "Category Translation";
  $admin = "category_translation";

  include("../../init.php");
  variables::cd(1);

  $category_translation = new CategoryTranslation();
  $id_category_translation = $_GET["id_category_translation"];
  $category_translation->get($id_category_translation);

  include(variables::$root."/source/view/section/admin_header.php"); 

?>

      <div class="container py-5">
        <div class="row">
          <div class="col-lg-12">
            <a href="#" onclick="history.back();" class="btn btn-outline-primary mb-3">
              <i class="fa fa-arrow-left"></i> Back
            </a>
            <h2>Category Translation</h2>
          </div>
          <div class="col-lg-12">
              
              <?php if(!empty($category_translation->deleted_at)){ ?>
                <b>Deleted At</b>: <?= $category_translation->deleted_at; ?><br>
              <?php } ?>
              <b>CategoryTranslation</b>: <?=$category_translation->id_category_translation; ?><br>
              <b>Category</b>: <?=$category_translation->id_category; ?><br>
              <b>Language</b>: <?=$category_translation->language; ?><br>
              <b>Title</b>: <?=$category_translation->title; ?><br>
              <b>Description</b>: <?=$category_translation->description; ?><br>
              <b>Content</b>: <?=$category_translation->content; ?><br>
              
          </div>
        </div>
      </div>
      <form action="category_translations-export" method="post" id="export_form"></form>
      
      <script>
      </script>

  <?php include(variables::$root."/source/view/section/admin_footer.php"); ?>