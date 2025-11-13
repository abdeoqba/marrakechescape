<?php
  
  $need_class = true;
  $need_auth = true;
  $need_db = true;

  $url = "";
  $keywords = "";
  $title = "";
  $description = "";
  $image = "";

  $title_head = "Post Translation";
  $admin = "post_translation";

  include("../../init.php");
  variables::cd(1);

  $post_translation = new PostTranslation();
  $id_post_translation = $_GET["id_post_translation"];
  $post_translation->get($id_post_translation);

  include(variables::$root."/source/view/section/admin_header.php"); 

?>

      <div class="container py-5">
        <div class="row">
          <div class="col-lg-12">
            <a href="#" onclick="history.back();" class="btn btn-outline-primary mb-3">
              <i class="fa fa-arrow-left"></i> Back
            </a>
            <h2>Post Translation</h2>
          </div>
          <div class="col-lg-12">
              
              <?php if(!empty($post_translation->deleted_at)){ ?>
                <b>Deleted At</b>: <?= $post_translation->deleted_at; ?><br>
              <?php } ?>
              <b>PostTranslation</b>: <?=$post_translation->id_post_translation; ?><br>
              <b>Post</b>: <?=$post_translation->id_post; ?><br>
              <b>Language</b>: <?=$post_translation->language; ?><br>
              <b>Title</b>: <?=$post_translation->title; ?><br>
              <b>Slug</b>: <?=$post_translation->slug; ?><br>
              <b>Content</b>: <?=$post_translation->content; ?><br>
              <b>Meta Title</b>: <?=$post_translation->meta_title; ?><br>
              <b>Meta Description</b>: <?=$post_translation->meta_description; ?><br>
              <b>Excerpt</b>: <?=$post_translation->excerpt; ?><br>
              
          </div>
        </div>
      </div>
      <form action="post_translations-export" method="post" id="export_form"></form>
      
      <script>
      </script>

  <?php include(variables::$root."/source/view/section/admin_footer.php"); ?>