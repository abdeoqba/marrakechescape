<?php
  
  $need_class = true;
  $need_auth = true;
  $need_db = true;

  $url = "";
  $keywords = "";
  $title = "";
  $description = "";
  $image = "";

  $title_head = "Post Category";
  $admin = "post_category";

  include("../../init.php");
  variables::cd(1);

  $post_category = new PostCategory();
  $id_post_category = $_GET["id_post_category"];
  $post_category->get($id_post_category);

  include(variables::$root."/source/view/section/admin_header.php"); 

?>

      <div class="container py-5">
        <div class="row">
          <div class="col-lg-12">
            <a href="#" onclick="history.back();" class="btn btn-outline-primary mb-3">
              <i class="fa fa-arrow-left"></i> Back
            </a>
            <h2>Post Category</h2>
          </div>
          <div class="col-lg-12">
              
              <?php if(!empty($post_category->deleted_at)){ ?>
                <b>Deleted At</b>: <?= $post_category->deleted_at; ?><br>
              <?php } ?>
              <b>PostCategory</b>: <?=$post_category->id_post_category; ?><br>
              <b>Image</b>: <?=$post_category->id_image; ?><br>
              
          </div>
        </div>
      </div>
      <form action="post_categorys-export" method="post" id="export_form"></form>
      
      <script>
      </script>

  <?php include(variables::$root."/source/view/section/admin_footer.php"); ?>