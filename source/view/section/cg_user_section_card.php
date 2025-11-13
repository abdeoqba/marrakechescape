          <div class="col-lg-4 col-md-6 pb-3 cg_user-<?=$cg_user->id_user; ?>">
            <div class="list-group list-group-cg_user">
              
              <?php if(!empty($cg_user->deleted_at)){ ?>
              
              <div class="list-group-item"><b>Deleted At</b>: <?= $cg_user->deleted_at;  ?></div>
              <?php } ?>
              <div class="list-group-item"><b>ID User</b>: <a href="cg_user-<?=$cg_user->id_user; ?>">#<?=$cg_user->id_user; ?></a></div><div class="list-group-item">
                  <b>Username</b>: 
                <?= $cg_user->username;  ?></div>
                <div class="list-group-item">
                  <b>Password</b>: 
                <?= $cg_user->password;  ?></div>
                <div class="list-group-item">
                  <b>Role</b>: 
                <?= $cg_user->role;  ?></div>
                <div class="list-group-item">
                  <b>Active</b>: 
                
                <?php if($cg_user->active){  ?>
                <i class="fa fa-check text-success"></i> True
                <?php }else{ ?>
                <i class="fa fa-times text-danger"></i> False
                <?php } ?><br>
                </div>
                <div class="list-group-item">
                  <b>Allow Trash</b>: 
                
                <?php if($cg_user->allow_trash){  ?>
                <i class="fa fa-check text-success"></i> True
                <?php }else{ ?>
                <i class="fa fa-times text-danger"></i> False
                <?php } ?><br>
                </div>
                <div class="list-group-item">
                  <b>Allow Truncate</b>: 
                
                <?php if($cg_user->allow_truncate){  ?>
                <i class="fa fa-check text-success"></i> True
                <?php }else{ ?>
                <i class="fa fa-times text-danger"></i> False
                <?php } ?><br>
                </div>
                <div class="list-group-item">
                  <b>Allow Read History</b>: 
                
                <?php if($cg_user->allow_read_history){  ?>
                <i class="fa fa-check text-success"></i> True
                <?php }else{ ?>
                <i class="fa fa-times text-danger"></i> False
                <?php } ?><br>
                </div>
                <div class="list-group-item">
                  <b>Allow Edit</b>: 
                
                <?php if($cg_user->allow_edit){  ?>
                <i class="fa fa-check text-success"></i> True
                <?php }else{ ?>
                <i class="fa fa-times text-danger"></i> False
                <?php } ?><br>
                </div>
                <div class="list-group-item">
                  <b>Allow Manage</b>: 
                
                <?php if($cg_user->allow_manage){  ?>
                <i class="fa fa-check text-success"></i> True
                <?php }else{ ?>
                <i class="fa fa-times text-danger"></i> False
                <?php } ?><br>
                </div>
                <?php if($_SESSION[variables::$prefix."allow_edit"]){ ?>
              <div class="list-group-itemp-0">
                <div class="list-group list-group-horizontal text-center">
                  
                  <?php if(empty($cg_user->deleted_at)){ ?>

                  <!-- list buttons -->
                  <button type="button" onclick="cg_user_update_set(<?=$cg_user->id_user; ?>,'<?=$cg_user->username; ?>','<?=$cg_user->password; ?>','<?=$cg_user->role; ?>',<?=$cg_user->active; ?>,<?=$cg_user->allow_trash; ?>,<?=$cg_user->allow_truncate; ?>,<?=$cg_user->allow_read_history; ?>,<?=$cg_user->allow_edit; ?>,<?=$cg_user->allow_manage; ?>)" class="list-group-item text-success list-group-item-action m-0"><i class="fa fa-pen"></i> Update</button>

                  <button type="button" onclick="cg_user_move_to_trash_set(<?= $cg_user->id_user; ?>,'<?=$cg_user->username; ?>')" class="list-group-item text-danger list-group-item-action" <?php if(!$_SESSION[variables::$prefix."allow_edit"]) echo "disabled"; ?>><i class="fa fa-times"></i> Delete</button>
                  
                  <?php }else{ ?>
                  
                  <!-- trash buttons -->
                  <button type="button" onclick="cg_user_restore_set(<?= $cg_user->id_user; ?>,'<?=$cg_user->username; ?>')" class="list-group-item text-success list-group-item-action m-0"><i class="fa fa-chevron-circle-up"></i> Restore</button>

                  <button type="button" onclick="cg_user_delete_set(<?= $cg_user->id_user; ?>,'<?=$cg_user->username; ?>')" class="list-group-item text-danger list-group-item-action"><i class="fa fa-times"></i> Delete</button>
                  
                  <?php } ?>

                </div>
              </div>
              <?php }//allow edit ?>

            </div>
          </div>