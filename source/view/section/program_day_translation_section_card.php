
          <div class="col-lg-4 col-md-6 pt-3 program_day_translation-<?=$program_day_translation->id_program_day_translation; ?>">
            
            <div class="list-group list-group-program_day_translation">
              
              <?php if(!empty($program_day_translation->deleted_at)){ ?>
              
              <div class="list-group-item"><b>Deleted At</b>: <?= $program_day_translation->deleted_at;  ?></div>
              <?php } ?>
              
                  <div class="list-group-item">
                    <b>ProgramDayTranslation</b>: 
                    <a href="program_day_translation-<?=$program_day_translation->id_program_day_translation; ?>">#<?=$program_day_translation->id_program_day_translation; ?></a>
                  </div>
                  <div class="list-group-item">
                  
                    <b>Day</b>: 

                    <a href="program_day-<?=$program_day_translation->program_day->id_program_day; ?>"><?=$program_day_translation->program_day->day_order; ?>
                    </a>

                    <input type="hidden" id="id_day_<?=$program_day_translation->id_program_day_translation; ?>" value="<?=$program_day_translation->program_day->id_program_day; ?>">

                  </div>
                <div class="list-group-item">
                  <b>Language</b>:
                  <span id="language_<?=$program_day_translation->id_program_day_translation; ?>"><?= $program_day_translation->language;  ?></span>
                </div>
                
                <div class="list-group-item">
                  <b>Title</b>:
                  <span id="title_<?=$program_day_translation->id_program_day_translation; ?>"><?= $program_day_translation->title;  ?></span>
                </div>
                
                <div class="list-group-item">
                  <b>Content</b>:
                  <span id="content_<?=$program_day_translation->id_program_day_translation; ?>"><?= $program_day_translation->content;  ?></span>
                </div>
                <?php if($_SESSION[variables::$prefix."allow_edit"]){ ?>
              <div class="list-group-item p-0">
                <div class="list-group list-group-horizontal text-center">
                  
                  <?php if(empty($program_day_translation->deleted_at)){ ?>

                  <!-- list buttons -->
                  <button type="button" onclick="program_day_translation_update_set(<?= $program_day_translation->id_program_day_translation; ?>)" class="list-group-item text-success list-group-item-action m-0"><i class="fa fa-pen"></i> Update</button>

                  <button type="button" onclick="program_day_translation_move_to_trash_set(<?= $program_day_translation->id_program_day_translation; ?>,'<?=$program_day_translation->title; ?>')" class="list-group-item text-danger list-group-item-action" <?php if(!$_SESSION[variables::$prefix."allow_edit"]) echo "disabled"; ?>><i class="fa fa-times"></i> Delete</button>
                  
                  <?php }else{ ?>
                  
                  <!-- trash buttons -->
                  <button type="button" onclick="program_day_translation_restore_set(<?= $program_day_translation->id_program_day_translation; ?>,'<?=$program_day_translation->title; ?>')" class="list-group-item text-success list-group-item-action m-0"><i class="fa fa-chevron-circle-up"></i> Restore</button>

                  <button type="button" onclick="program_day_translation_delete_set(<?= $program_day_translation->id_program_day_translation; ?>,'<?=$program_day_translation->title; ?>')" class="list-group-item text-danger list-group-item-action"><i class="fa fa-times"></i> Delete</button>
                  
                  <?php } ?>

                </div>
              </div>
              <?php }//allow edit ?>

            </div>
          </div>