
          <div class="col-lg-4 col-md-6 pt-3 post_category_translation-<?=$post_category_translation->id_post_category_translation; ?>">
            
            <div class="list-group list-group-post_category_translation">
              
              <?php if(!empty($post_category_translation->deleted_at)){ ?>
              
              <div class="list-group-item"><b>Deleted At</b>: <?= $post_category_translation->deleted_at;  ?></div>
              <?php } ?>
              
                  <div class="list-group-item">
                    <b>PostCategoryTranslation</b>: 
                    <a href="post_category_translation-<?=$post_category_translation->id_post_category_translation; ?>">#<?=$post_category_translation->id_post_category_translation; ?></a>
                  </div>
                  <div class="list-group-item">
                  
                    <b>Post Category</b>: 

                    <a href="post_category-<?=$post_category_translation->post_category->id_post_category; ?>"><?=$post_category_translation->post_category->id_post_category; ?>
                    </a>

                    <input type="hidden" id="id_post_category_<?=$post_category_translation->id_post_category_translation; ?>" value="<?=$post_category_translation->post_category->id_post_category; ?>">

                  </div>
                <div class="list-group-item">
                  <b>Language</b>:
                  <span id="language_<?=$post_category_translation->id_post_category_translation; ?>"><?= $post_category_translation->language;  ?></span>
                </div>
                
                <div class="list-group-item">
                  <b>Title</b>:
                  <span id="title_<?=$post_category_translation->id_post_category_translation; ?>"><?= $post_category_translation->title;  ?></span>
                </div>
                
                <div class="list-group-item">
                  <b>Description</b>:
                  <span id="description_<?=$post_category_translation->id_post_category_translation; ?>"><?= $post_category_translation->description;  ?></span>
                </div>
                <?php if($_SESSION[variables::$prefix."allow_edit"]){ ?>
              <div class="list-group-item p-0">
                <div class="list-group list-group-horizontal text-center">
                  
                  <?php if(empty($post_category_translation->deleted_at)){ ?>

                  <!-- list buttons -->
                  <button type="button" onclick="post_category_translation_update_set(<?= $post_category_translation->id_post_category_translation; ?>)" class="list-group-item text-success list-group-item-action m-0"><i class="fa fa-pen"></i> Update</button>

                  <button type="button" onclick="post_category_translation_move_to_trash_set(<?= $post_category_translation->id_post_category_translation; ?>,'<?=$post_category_translation->title; ?>')" class="list-group-item text-danger list-group-item-action" <?php if(!$_SESSION[variables::$prefix."allow_edit"]) echo "disabled"; ?>><i class="fa fa-times"></i> Delete</button>
                  
                  <?php }else{ ?>
                  
                  <!-- trash buttons -->
                  <button type="button" onclick="post_category_translation_restore_set(<?= $post_category_translation->id_post_category_translation; ?>,'<?=$post_category_translation->title; ?>')" class="list-group-item text-success list-group-item-action m-0"><i class="fa fa-chevron-circle-up"></i> Restore</button>

                  <button type="button" onclick="post_category_translation_delete_set(<?= $post_category_translation->id_post_category_translation; ?>,'<?=$post_category_translation->title; ?>')" class="list-group-item text-danger list-group-item-action"><i class="fa fa-times"></i> Delete</button>
                  
                  <?php } ?>

                </div>
              </div>
              <?php }//allow edit ?>

            </div>
          </div>