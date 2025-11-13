
          <div class="col-lg-4 col-md-6 pt-3 post-<?=$post->id_post; ?>">
            
            <div class="list-group list-group-post">
              
              <?php if(!empty($post->deleted_at)){ ?>
              
              <div class="list-group-item"><b>Deleted At</b>: <?= $post->deleted_at;  ?></div>
              <?php } ?>
              
                  <div class="list-group-item">
                    <b>Post</b>: 
                    <a href="post-<?=$post->id_post; ?>">#<?=$post->id_post; ?></a>
                  </div>
                  <div class="list-group-item">
                  
                    <b>Post Category</b>: 

                    <a href="post_category-<?=$post->post_category->id_post_category; ?>"><?=$post->post_category->id_post_category; ?>
                    </a>

                    <input type="hidden" id="id_post_category_<?=$post->id_post; ?>" value="<?=$post->post_category->id_post_category; ?>">

                  </div>
                  <div class="list-group-item">
                  
                    <b>Image</b>: 

                    <a href="image-<?=$post->image->id_image; ?>"><?=$post->image->alt_text; ?>
                    </a>

                    <input type="hidden" id="id_image_<?=$post->id_post; ?>" value="<?=$post->image->id_image; ?>">

                  </div>
                <div class="list-group-item">
                  <b>Published At</b>:
                  <span id="published_at_<?=$post->id_post; ?>"><?= $post->published_at;  ?></span>
                </div>
                
                <div class="list-group-item">
                  <b>Status</b>:
                  <span id="status_<?=$post->id_post; ?>"><?= $post->status;  ?></span>
                </div>
                <?php if($_SESSION[variables::$prefix."allow_edit"]){ ?>
              <div class="list-group-item p-0">
                <div class="list-group list-group-horizontal text-center">
                  
                  <?php if(empty($post->deleted_at)){ ?>

                  <!-- list buttons -->
                  <button type="button" onclick="post_update_set(<?= $post->id_post; ?>)" class="list-group-item text-success list-group-item-action m-0"><i class="fa fa-pen"></i> Update</button>

                  <button type="button" onclick="post_move_to_trash_set(<?= $post->id_post; ?>,'<?=$post->id_post; ?>')" class="list-group-item text-danger list-group-item-action" <?php if(!$_SESSION[variables::$prefix."allow_edit"]) echo "disabled"; ?>><i class="fa fa-times"></i> Delete</button>
                  
                  <?php }else{ ?>
                  
                  <!-- trash buttons -->
                  <button type="button" onclick="post_restore_set(<?= $post->id_post; ?>,'<?=$post->id_post; ?>')" class="list-group-item text-success list-group-item-action m-0"><i class="fa fa-chevron-circle-up"></i> Restore</button>

                  <button type="button" onclick="post_delete_set(<?= $post->id_post; ?>,'<?=$post->id_post; ?>')" class="list-group-item text-danger list-group-item-action"><i class="fa fa-times"></i> Delete</button>
                  
                  <?php } ?>

                </div>
              </div>
              <?php }//allow edit ?>

            </div>
          </div>