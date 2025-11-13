<?php
  
  $need_class = true;
  $need_auth = true;
  $need_db = true;

  $url = "";
  $keywords = "";
  $title = "";
  $description = "";
  $image = "";

  $title_head = "Category";
  $admin = "category";

  include("../../init.php");
  variables::cd(1);

  $category = new Category();
  $id_category = $_GET["id_category"];
  $category->get($id_category);

  include(variables::$root."/source/view/section/admin_header.php"); 

?>

      <div class="container py-5">
        <div class="row">
          <div class="col-lg-12">
            <a href="#" onclick="history.back();" class="btn btn-outline-primary mb-3">
              <i class="fa fa-arrow-left"></i> Back
            </a>
            <h2>Category</h2>
          </div>
          <div class="col-lg-12">
              
              <?php if(!empty($category->deleted_at)){ ?>
                <b>Deleted At</b>: <?= $category->deleted_at; ?><br>
              <?php } ?>
              <b>Category</b>: <?=$category->id_category; ?><br>
              <b>Parent Id</b>: <?=$category->parent_id; ?><br>
              <b>Image</b>: <?=$category->id_image; ?><br>
              
          </div>
        </div>
      </div>
      <form action="categorys-export" method="post" id="export_form"></form>
      
      <script>
      </script>

  <?php include(variables::$root."/source/view/section/admin_footer.php"); ?>