
          <div class="col-lg-4 col-md-6 pt-3 post_translation-<?=$post_translation->id_post_translation; ?>">
            
            <div class="list-group list-group-post_translation">
              
              <?php if(!empty($post_translation->deleted_at)){ ?>
              
              <div class="list-group-item"><b>Deleted At</b>: <?= $post_translation->deleted_at;  ?></div>
              <?php } ?>
              
                  <div class="list-group-item">
                    <b>PostTranslation</b>: 
                    <a href="post_translation-<?=$post_translation->id_post_translation; ?>">#<?=$post_translation->id_post_translation; ?></a>
                  </div>
                  <div class="list-group-item">
                  
                    <b>Post</b>: 

                    <a href="post-<?=$post_translation->post->id_post; ?>"><?=$post_translation->post->id_post; ?>
                    </a>

                    <input type="hidden" id="id_post_<?=$post_translation->id_post_translation; ?>" value="<?=$post_translation->post->id_post; ?>">

                  </div>
                <div class="list-group-item">
                  <b>Language</b>:
                  <span id="language_<?=$post_translation->id_post_translation; ?>"><?= $post_translation->language;  ?></span>
                </div>
                
                <div class="list-group-item">
                  <b>Title</b>:
                  <span id="title_<?=$post_translation->id_post_translation; ?>"><?= $post_translation->title;  ?></span>
                </div>
                
                <div class="list-group-item">
                  <b>Slug</b>:
                  <span id="slug_<?=$post_translation->id_post_translation; ?>"><?= $post_translation->slug;  ?></span>
                </div>
                
                <div class="list-group-item">
                  <b>Content</b>:
                  <span id="content_<?=$post_translation->id_post_translation; ?>"><?= $post_translation->content;  ?></span>
                </div>
                
                <div class="list-group-item">
                  <b>Meta Title</b>:
                  <span id="meta_title_<?=$post_translation->id_post_translation; ?>"><?= $post_translation->meta_title;  ?></span>
                </div>
                
                <div class="list-group-item">
                  <b>Meta Description</b>:
                  <span id="meta_description_<?=$post_translation->id_post_translation; ?>"><?= $post_translation->meta_description;  ?></span>
                </div>
                
                <div class="list-group-item">
                  <b>Excerpt</b>:
                  <span id="excerpt_<?=$post_translation->id_post_translation; ?>"><?= $post_translation->excerpt;  ?></span>
                </div>
                <?php if($_SESSION[variables::$prefix."allow_edit"]){ ?>
              <div class="list-group-item p-0">
                <div class="list-group list-group-horizontal text-center">
                  
                  <?php if(empty($post_translation->deleted_at)){ ?>

                  <!-- list buttons -->
                  <button type="button" onclick="post_translation_update_set(<?= $post_translation->id_post_translation; ?>)" class="list-group-item text-success list-group-item-action m-0"><i class="fa fa-pen"></i> Update</button>

                  <button type="button" onclick="post_translation_move_to_trash_set(<?= $post_translation->id_post_translation; ?>,'<?=$post_translation->title; ?>')" class="list-group-item text-danger list-group-item-action" <?php if(!$_SESSION[variables::$prefix."allow_edit"]) echo "disabled"; ?>><i class="fa fa-times"></i> Delete</button>
                  
                  <?php }else{ ?>
                  
                  <!-- trash buttons -->
                  <button type="button" onclick="post_translation_restore_set(<?= $post_translation->id_post_translation; ?>,'<?=$post_translation->title; ?>')" class="list-group-item text-success list-group-item-action m-0"><i class="fa fa-chevron-circle-up"></i> Restore</button>

                  <button type="button" onclick="post_translation_delete_set(<?= $post_translation->id_post_translation; ?>,'<?=$post_translation->title; ?>')" class="list-group-item text-danger list-group-item-action"><i class="fa fa-times"></i> Delete</button>
                  
                  <?php } ?>

                </div>
              </div>
              <?php }//allow edit ?>

            </div>
          </div>