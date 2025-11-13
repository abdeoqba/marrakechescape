
          <div class="col-lg-4 col-md-6 pt-3 category-<?=$category->id_category; ?>">
            
            <div class="list-group list-group-category">
              
              <?php if(!empty($category->deleted_at)){ ?>
              
              <div class="list-group-item"><b>Deleted At</b>: <?= $category->deleted_at;  ?></div>
              <?php } ?>
              
                  <div class="list-group-item">
                    <b>Category</b>: 
                    <a href="category-<?=$category->id_category; ?>">#<?=$category->id_category; ?></a>
                  </div>
                  <div class="list-group-item">
                  
                    <b>Parent Id</b>: 

                    <a href="category-<?=$category->category->id_category; ?>"><?=$category->category->id_category; ?>
                    </a>

                    <input type="hidden" id="parent_id_<?=$category->id_category; ?>" value="<?=$category->category->id_category; ?>">

                  </div>
                  <div class="list-group-item">
                  
                    <b>Image</b>: 

                    <a href="image-<?=$category->image->id_image; ?>"><?=$category->image->alt_text; ?>
                    </a>

                    <input type="hidden" id="id_image_<?=$category->id_category; ?>" value="<?=$category->image->id_image; ?>">

                  </div><?php if($_SESSION[variables::$prefix."allow_edit"]){ ?>
              <div class="list-group-item p-0">
                <div class="list-group list-group-horizontal text-center">
                  
                  <?php if(empty($category->deleted_at)){ ?>

                  <!-- list buttons -->
                  <button type="button" onclick="category_update_set(<?= $category->id_category; ?>)" class="list-group-item text-success list-group-item-action m-0"><i class="fa fa-pen"></i> Update</button>

                  <button type="button" onclick="category_move_to_trash_set(<?= $category->id_category; ?>,'<?=$category->id_category; ?>')" class="list-group-item text-danger list-group-item-action" <?php if(!$_SESSION[variables::$prefix."allow_edit"]) echo "disabled"; ?>><i class="fa fa-times"></i> Delete</button>
                  
                  <?php }else{ ?>
                  
                  <!-- trash buttons -->
                  <button type="button" onclick="category_restore_set(<?= $category->id_category; ?>,'<?=$category->id_category; ?>')" class="list-group-item text-success list-group-item-action m-0"><i class="fa fa-chevron-circle-up"></i> Restore</button>

                  <button type="button" onclick="category_delete_set(<?= $category->id_category; ?>,'<?=$category->id_category; ?>')" class="list-group-item text-danger list-group-item-action"><i class="fa fa-times"></i> Delete</button>
                  
                  <?php } ?>

                </div>
              </div>
              <?php }//allow edit ?>

            </div>
          </div>