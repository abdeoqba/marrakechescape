<?php
  
  $need_class = true;
  $need_auth = true;
  $need_db = true;

  $url = "history";
  $keywords = "";
  $title = "";
  $description = "";
  $image = "";

  $title_head = "Setting";
  $admin = "setting";

  include("../../init.php");
  variables::cd(1);  

  include(variables::$root."/source/view/section/admin_header.php"); 

  if(isset($_GET) && is_array($_GET)){
    $s = $_GET["s"];
  }

?>


    <div class="container py-5">
      <div class="row">
        <div class="col-lg-4 col-md-4 mb-3">
          <div class="list-group" >
            <a class="list-group-item list-group-item-action <?php if($s == 'edit_profile') echo 'active'; ?>" href="<?php if($s == 'edit_profile') echo '#'; else echo 'edit-profile'; ?>">
              <i class="fa fa-user-cog"></i>
              Edit Profile
            </a>
            <a class="list-group-item list-group-item-action <?php if($s == 'change_password') echo 'active'; ?>" href="<?php if($s == 'change_password') echo '#'; else echo 'change-password'; ?>">
              <i class="fa fa-unlock-alt"></i>
              Change Password
            </a>
            <a class="list-group-item list-group-item-action" href="#list-messages">
              <i class="fa fa-database"></i>
              Reset
            </a>
            <a class="list-group-item list-group-item-action" href="#list-settings">
              <i class="fa fa-file-import"></i>
              Export/Import
            </a>
          </div>
        </div>
        <div class="col-lg-8 col-md-8">
          <div class="card p-3 card">
            <h2>
              <i class="fa fa-cogs"></i>
              Settings 
            </h2>
            <div class="tab-content">

              <div class="tab-pane <?php if($s == 'edit_profile') echo 'show active'; ?>">
                <h3>
                  <i class="fa fa-user-cog"></i>
                  Edit Profile 
                </h3>
                <form action="cg_user-edit-profile" method="GET">
                  <div class="form-group">
                    <label for="name">Username</label>
                    <input type="text" class="form-control" id="cg_user_update_username" name="username" value="<?= $_SESSION[variables::$prefix.'username'];?>" >
                  </div>
                  <div>
                    <input type="hidden" name="id_user" value="<?= $_SESSION[variables::$prefix.'id_user'];  ?>" >
                    <button type="submit" class="btn btn-success">
                      <i class="fa fa-save"></i>
                      Save Changes
                    </button>
                  </div>
                </form>
              </div>

              <div class="tab-pane <?php if($s == 'change_password') echo 'show active'; ?>">
                <h3>
                  <i class="fa fa-unlock-alt"></i>
                  Change Password
                </h3>
                <form action="cg_user-change-password" method="GET" id="change_password_form">
                  <div class="form-group">
                    <label for="old_password">Current Password</label>
                    <input type="password" class="form-control" id="old_password" name="old_password" >
                  </div>
                  <div class="form-group">
                    <label for="password">New Password</label>
                    <input type="password" class="form-control" id="password" name="password" >
                  </div>
                  <div class="form-group">
                    <label for="repeat_password">Repeat Password</label>
                    <input type="password" class="form-control" id="repeat_password" name="repeat_password" >
                  </div>
                  <div>
                    <input type="hidden" name="id_user" value="<?= $_SESSION[variables::$prefix.'id_user'];  ?>" >
                    <input type="hidden" name="username" value="<?= $_SESSION[variables::$prefix.'username'];?>" >
                    <button type="button" class="btn btn-success" onclick="change_password();">
                      <i class="fa fa-save"></i>
                      Save Changes
                    </button>
                    <script>
                      function change_password(){
                        if($("#password").val() == $("#repeat_password").val())
                          $("#change_password_form").submit();
                        else{
                          alert("thoes passwords didn't match.")
                        }
                      }
                    </script>
                  </div>
                </form>
              </div>

              <div class="tab-pane fade">

              </div>

              <div class="tab-pane fade">

              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>