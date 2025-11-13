<?php
  
  $need_class = true;
  $need_auth = true;
  $need_db = true;

  $url = "";
  $keywords = "";
  $title = "";
  $description = "";
  $image = "";

  $title_head = "Post Comment";
  $admin = "post_comment";

  include("../../init.php");
  variables::cd(1);

  $post_comment = new PostComment();
  $id_post_comment = $_GET["id_post_comment"];
  $post_comment->get($id_post_comment);

  include(variables::$root."/source/view/section/admin_header.php"); 

?>

      <div class="container py-5">
        <div class="row">
          <div class="col-lg-12">
            <a href="#" onclick="history.back();" class="btn btn-outline-primary mb-3">
              <i class="fa fa-arrow-left"></i> Back
            </a>
            <h2>Post Comment</h2>
          </div>
          <div class="col-lg-12">
              
              <?php if(!empty($post_comment->deleted_at)){ ?>
                <b>Deleted At</b>: <?= $post_comment->deleted_at; ?><br>
              <?php } ?>
              <b>PostComment</b>: <?=$post_comment->id_post_comment; ?><br>
              <b>Post</b>: <?=$post_comment->id_post; ?><br>
              <b>Client</b>: <?=$post_comment->id_client; ?><br>
              <b>Name</b>: <?=$post_comment->name; ?><br>
              <b>Email</b>: <?=$post_comment->email; ?><br>
              <b>Content</b>: <?=$post_comment->content; ?><br>
              <b>Status</b>: <?=$post_comment->status; ?><br>
              
          </div>
        </div>
      </div>
      <form action="post_comments-export" method="post" id="export_form"></form>
      
      <script>
      </script>

  <?php include(variables::$root."/source/view/section/admin_footer.php"); ?>