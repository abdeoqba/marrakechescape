
          <div class="col-lg-4 col-md-6 pt-3 program-<?=$program->id_program; ?>">
            
            <div class="list-group list-group-program">
              
              <?php if(!empty($program->deleted_at)){ ?>
              
              <div class="list-group-item"><b>Deleted At</b>: <?= $program->deleted_at;  ?></div>
              <?php } ?>
              
                  <div class="list-group-item">
                    <b>Program</b>: 
                    <a href="program-<?=$program->id_program; ?>">#<?=$program->id_program; ?></a>
                  </div>
                  <div class="list-group-item">
                  
                    <b>Category</b>: 

                    <a href="category-<?=$program->category->id_category; ?>"><?=$program->category->id_category; ?>
                    </a>

                    <input type="hidden" id="id_category_<?=$program->id_program; ?>" value="<?=$program->category->id_category; ?>">

                  </div>
                  <div class="list-group-item">
                  
                    <b>Image</b>: 

                    <a href="image-<?=$program->image->id_image; ?>"><?=$program->image->alt_text; ?>
                    </a>

                    <input type="hidden" id="id_image_<?=$program->id_program; ?>" value="<?=$program->image->id_image; ?>">

                  </div>
                <div class="list-group-item">
                  <b>Nbr Days</b>:
                  <span id="nbr_days_<?=$program->id_program; ?>"><?= $program->nbr_days;  ?></span>
                </div>
                
                <div class="list-group-item">
                  <b>Start</b>:
                  <span id="start_<?=$program->id_program; ?>"><?= $program->start;  ?></span>
                </div>
                
                <div class="list-group-item">
                  <b>End</b>:
                  <span id="end_<?=$program->id_program; ?>"><?= $program->end;  ?></span>
                </div>
                
                <div class="list-group-item">
                  <b>Price</b>:
                  <span id="price_<?=$program->id_program; ?>"><?= $program->price;  ?></span>
                </div>
                <?php if($_SESSION[variables::$prefix."allow_edit"]){ ?>
              <div class="list-group-item p-0">
                <div class="list-group list-group-horizontal text-center">
                  
                  <?php if(empty($program->deleted_at)){ ?>

                  <!-- list buttons -->
                  <button type="button" onclick="program_update_set(<?= $program->id_program; ?>)" class="list-group-item text-success list-group-item-action m-0"><i class="fa fa-pen"></i> Update</button>

                  <button type="button" onclick="program_move_to_trash_set(<?= $program->id_program; ?>,'<?=$program->id_program; ?>')" class="list-group-item text-danger list-group-item-action" <?php if(!$_SESSION[variables::$prefix."allow_edit"]) echo "disabled"; ?>><i class="fa fa-times"></i> Delete</button>
                  
                  <?php }else{ ?>
                  
                  <!-- trash buttons -->
                  <button type="button" onclick="program_restore_set(<?= $program->id_program; ?>,'<?=$program->id_program; ?>')" class="list-group-item text-success list-group-item-action m-0"><i class="fa fa-chevron-circle-up"></i> Restore</button>

                  <button type="button" onclick="program_delete_set(<?= $program->id_program; ?>,'<?=$program->id_program; ?>')" class="list-group-item text-danger list-group-item-action"><i class="fa fa-times"></i> Delete</button>
                  
                  <?php } ?>

                </div>
              </div>
              <?php }//allow edit ?>

            </div>
          </div>