
          <div class="col-lg-4 col-md-6 pt-3 program_translation-<?=$program_translation->id_program_translation; ?>">
            
            <div class="list-group list-group-program_translation">
              
              <?php if(!empty($program_translation->deleted_at)){ ?>
              
              <div class="list-group-item"><b>Deleted At</b>: <?= $program_translation->deleted_at;  ?></div>
              <?php } ?>
              
                  <div class="list-group-item">
                    <b>ProgramTranslation</b>: 
                    <a href="program_translation-<?=$program_translation->id_program_translation; ?>">#<?=$program_translation->id_program_translation; ?></a>
                  </div>
                  <div class="list-group-item">
                  
                    <b>Program</b>: 

                    <a href="program-<?=$program_translation->program->id_program; ?>"><?=$program_translation->program->id_program; ?>
                    </a>

                    <input type="hidden" id="id_program_<?=$program_translation->id_program_translation; ?>" value="<?=$program_translation->program->id_program; ?>">

                  </div>
                <div class="list-group-item">
                  <b>Language</b>:
                  <span id="language_<?=$program_translation->id_program_translation; ?>"><?= $program_translation->language;  ?></span>
                </div>
                
                <div class="list-group-item">
                  <b>Title</b>:
                  <span id="title_<?=$program_translation->id_program_translation; ?>"><?= $program_translation->title;  ?></span>
                </div>
                
                <div class="list-group-item">
                  <b>Description</b>:
                  <span id="description_<?=$program_translation->id_program_translation; ?>"><?= $program_translation->description;  ?></span>
                </div>
                
                <div class="list-group-item">
                  <b>Content</b>:
                  <span id="content_<?=$program_translation->id_program_translation; ?>"><?= $program_translation->content;  ?></span>
                </div>
                
                <div class="list-group-item">
                  <b>Includes</b>:
                  <span id="includes_<?=$program_translation->id_program_translation; ?>"><?= $program_translation->includes;  ?></span>
                </div>
                
                <div class="list-group-item">
                  <b>Excludes</b>:
                  <span id="excludes_<?=$program_translation->id_program_translation; ?>"><?= $program_translation->excludes;  ?></span>
                </div>
                
                <div class="list-group-item">
                  <b>Highlights</b>:
                  <span id="highlights_<?=$program_translation->id_program_translation; ?>"><?= $program_translation->highlights;  ?></span>
                </div>
                <?php if($_SESSION[variables::$prefix."allow_edit"]){ ?>
              <div class="list-group-item p-0">
                <div class="list-group list-group-horizontal text-center">
                  
                  <?php if(empty($program_translation->deleted_at)){ ?>

                  <!-- list buttons -->
                  <button type="button" onclick="program_translation_update_set(<?= $program_translation->id_program_translation; ?>)" class="list-group-item text-success list-group-item-action m-0"><i class="fa fa-pen"></i> Update</button>

                  <button type="button" onclick="program_translation_move_to_trash_set(<?= $program_translation->id_program_translation; ?>,'<?=$program_translation->title; ?>')" class="list-group-item text-danger list-group-item-action" <?php if(!$_SESSION[variables::$prefix."allow_edit"]) echo "disabled"; ?>><i class="fa fa-times"></i> Delete</button>
                  
                  <?php }else{ ?>
                  
                  <!-- trash buttons -->
                  <button type="button" onclick="program_translation_restore_set(<?= $program_translation->id_program_translation; ?>,'<?=$program_translation->title; ?>')" class="list-group-item text-success list-group-item-action m-0"><i class="fa fa-chevron-circle-up"></i> Restore</button>

                  <button type="button" onclick="program_translation_delete_set(<?= $program_translation->id_program_translation; ?>,'<?=$program_translation->title; ?>')" class="list-group-item text-danger list-group-item-action"><i class="fa fa-times"></i> Delete</button>
                  
                  <?php } ?>

                </div>
              </div>
              <?php }//allow edit ?>

            </div>
          </div>