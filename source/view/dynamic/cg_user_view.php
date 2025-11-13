<?php
  
  $need_class = true;
  $need_auth = true;
  $need_db = true;

  $url = "";
  $keywords = "";
  $title = "";
  $description = "";
  $image = "";

  $title_head = "User";
  $admin = "cg_user";

  include("../../init.php");
  variables::cd(1);

  $cg_user = new cg_user();
  $id_user = $_GET["id_user"];
  $cg_user->get($id_user);

  include(variables::$root."/source/view/section/admin_header.php"); 

?>

      <div class="container py-5">
        <div class="row">
          <div class="col-lg-12">
            <a href="users" class="btn btn-outline-primary mb-3">
              <i class="fa fa-arrow-left"></i> Back
            </a>
            <h2>User</h2>
          </div>
          <div class="col-lg-12">
              
              <?php if(!empty($cg_user->deleted_at)){ ?>
                <b>Deleted At</b>: <?= $cg_user->deleted_at; ?><br>
              <?php } ?>
              <b>ID User</b>: <?=$cg_user->id_user; ?><br>
              <b>Username</b>: <?=$cg_user->username; ?><br>
              <b>Password</b>: <?=$cg_user->password; ?><br>
              <b>Role</b>: <?=$cg_user->role; ?><br>
              <b>Active</b>: 
              <?php if($cg_user->active){  ?>
              <i class="fa fa-check text-success"></i> True
              <?php }else{ ?>
              <i class="fa fa-times text-danger"></i> False
              <?php } ?><br>
              <b>Allow Trash</b>: 
              <?php if($cg_user->allow_trash){  ?>
              <i class="fa fa-check text-success"></i> True
              <?php }else{ ?>
              <i class="fa fa-times text-danger"></i> False
              <?php } ?><br>
              <b>Allow Truncate</b>: 
              <?php if($cg_user->allow_truncate){  ?>
              <i class="fa fa-check text-success"></i> True
              <?php }else{ ?>
              <i class="fa fa-times text-danger"></i> False
              <?php } ?><br>
              <b>Allow Read History</b>: 
              <?php if($cg_user->allow_read_history){  ?>
              <i class="fa fa-check text-success"></i> True
              <?php }else{ ?>
              <i class="fa fa-times text-danger"></i> False
              <?php } ?><br>
              <b>Allow Edit</b>: 
              <?php if($cg_user->allow_edit){  ?>
              <i class="fa fa-check text-success"></i> True
              <?php }else{ ?>
              <i class="fa fa-times text-danger"></i> False
              <?php } ?><br>
              <b>Allow Manage</b>: 
              <?php if($cg_user->allow_manage){  ?>
              <i class="fa fa-check text-success"></i> True
              <?php }else{ ?>
              <i class="fa fa-times text-danger"></i> False
              <?php } ?><br>
              
          </div>
        </div>
      </div>
      <form action="users-export" method="post" id="export_form"></form>
      
      <script>
      function export_csv(){
        $("#export_form").submit();
      }
      </script>

  <?php include(variables::$root."/source/view/section/admin_footer.php"); ?>