<?php
  
  $need_class = true;
  $need_auth = true;
  $need_db = true;

  $url = "";
  $keywords = "";
  $title = "";
  $description = "";
  $image = "";

  $title_head = "Post";
  $admin = "post";

  include("../../init.php");
  variables::cd(1);

  $post = new Post();
  $id_post = $_GET["id_post"];
  $post->get($id_post);

  include(variables::$root."/source/view/section/admin_header.php"); 

?>

      <div class="container py-5">
        <div class="row">
          <div class="col-lg-12">
            <a href="#" onclick="history.back();" class="btn btn-outline-primary mb-3">
              <i class="fa fa-arrow-left"></i> Back
            </a>
            <h2>Post</h2>
          </div>
          <div class="col-lg-12">
              
              <?php if(!empty($post->deleted_at)){ ?>
                <b>Deleted At</b>: <?= $post->deleted_at; ?><br>
              <?php } ?>
              <b>Post</b>: <?=$post->id_post; ?><br>
              <b>Post Category</b>: <?=$post->id_post_category; ?><br>
              <b>Image</b>: <?=$post->id_image; ?><br>
              <b>Published At</b>: <?=$post->published_at; ?><br>
              <b>Status</b>: <?=$post->status; ?><br>
              
          </div>
        </div>
      </div>
      <form action="posts-export" method="post" id="export_form"></form>
      
      <script>
      </script>

  <?php include(variables::$root."/source/view/section/admin_footer.php"); ?>