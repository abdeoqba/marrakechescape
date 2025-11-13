
          <div class="col-lg-4 col-md-6 pt-3 image-<?=$image->id_image; ?>">
            
            <div class="list-group list-group-image">
              
              <?php if(!empty($image->deleted_at)){ ?>
              
              <div class="list-group-item"><b>Deleted At</b>: <?= $image->deleted_at;  ?></div>
              <?php } ?>
              
                  <div class="list-group-item">
                    <b>Image</b>: 
                    <a href="image-<?=$image->id_image; ?>">#<?=$image->id_image; ?></a>
                  </div>
                <div class="list-group-item p-0">
                  <img src="<?= variables::$cd . $image->photo_file; ?>" class="w-100">
                  <input type="hidden" id="photo_file_<?=$image->id_image; ?>" value="<?= $image->photo_file;  ?>">
                </div>
                  
                <div class="list-group-item">
                  <b>Alt Text</b>:
                  <span id="alt_text_<?=$image->id_image; ?>"><?= $image->alt_text;  ?></span>
                </div>
                <?php if($_SESSION[variables::$prefix."allow_edit"]){ ?>
              <div class="list-group-item p-0">
                <div class="list-group list-group-horizontal text-center">
                  
                  <?php if(empty($image->deleted_at)){ ?>

                  <!-- list buttons -->
                  <button type="button" onclick="image_update_set(<?= $image->id_image; ?>)" class="list-group-item text-success list-group-item-action m-0"><i class="fa fa-pen"></i> Update</button>

                  <button type="button" onclick="image_move_to_trash_set(<?= $image->id_image; ?>,'<?=$image->alt_text; ?>')" class="list-group-item text-danger list-group-item-action" <?php if(!$_SESSION[variables::$prefix."allow_edit"]) echo "disabled"; ?>><i class="fa fa-times"></i> Delete</button>
                  
                  <?php }else{ ?>
                  
                  <!-- trash buttons -->
                  <button type="button" onclick="image_restore_set(<?= $image->id_image; ?>,'<?=$image->alt_text; ?>')" class="list-group-item text-success list-group-item-action m-0"><i class="fa fa-chevron-circle-up"></i> Restore</button>

                  <button type="button" onclick="image_delete_set(<?= $image->id_image; ?>,'<?=$image->alt_text; ?>')" class="list-group-item text-danger list-group-item-action"><i class="fa fa-times"></i> Delete</button>
                  
                  <?php } ?>

                </div>
              </div>
              <?php }//allow edit ?>

            </div>
          </div>