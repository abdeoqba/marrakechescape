
          <div class="col-lg-4 col-md-6 pt-3 post_category-<?=$post_category->id_post_category; ?>">
            
            <div class="list-group list-group-post_category">
              
              <?php if(!empty($post_category->deleted_at)){ ?>
              
              <div class="list-group-item"><b>Deleted At</b>: <?= $post_category->deleted_at;  ?></div>
              <?php } ?>
              
                  <div class="list-group-item">
                    <b>PostCategory</b>: 
                    <a href="post_category-<?=$post_category->id_post_category; ?>">#<?=$post_category->id_post_category; ?></a>
                  </div>
                  <div class="list-group-item">
                  
                    <b>Image</b>: 

                    <a href="image-<?=$post_category->image->id_image; ?>"><?=$post_category->image->alt_text; ?>
                    </a>

                    <input type="hidden" id="id_image_<?=$post_category->id_post_category; ?>" value="<?=$post_category->image->id_image; ?>">

                  </div><?php if($_SESSION[variables::$prefix."allow_edit"]){ ?>
              <div class="list-group-item p-0">
                <div class="list-group list-group-horizontal text-center">
                  
                  <?php if(empty($post_category->deleted_at)){ ?>

                  <!-- list buttons -->
                  <button type="button" onclick="post_category_update_set(<?= $post_category->id_post_category; ?>)" class="list-group-item text-success list-group-item-action m-0"><i class="fa fa-pen"></i> Update</button>

                  <button type="button" onclick="post_category_move_to_trash_set(<?= $post_category->id_post_category; ?>,'<?=$post_category->id_post_category; ?>')" class="list-group-item text-danger list-group-item-action" <?php if(!$_SESSION[variables::$prefix."allow_edit"]) echo "disabled"; ?>><i class="fa fa-times"></i> Delete</button>
                  
                  <?php }else{ ?>
                  
                  <!-- trash buttons -->
                  <button type="button" onclick="post_category_restore_set(<?= $post_category->id_post_category; ?>,'<?=$post_category->id_post_category; ?>')" class="list-group-item text-success list-group-item-action m-0"><i class="fa fa-chevron-circle-up"></i> Restore</button>

                  <button type="button" onclick="post_category_delete_set(<?= $post_category->id_post_category; ?>,'<?=$post_category->id_post_category; ?>')" class="list-group-item text-danger list-group-item-action"><i class="fa fa-times"></i> Delete</button>
                  
                  <?php } ?>

                </div>
              </div>
              <?php }//allow edit ?>

            </div>
          </div>