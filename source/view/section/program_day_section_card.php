
          <div class="col-lg-4 col-md-6 pt-3 program_day-<?=$program_day->id_program_day; ?>">
            
            <div class="list-group list-group-program_day">
              
              <?php if(!empty($program_day->deleted_at)){ ?>
              
              <div class="list-group-item"><b>Deleted At</b>: <?= $program_day->deleted_at;  ?></div>
              <?php } ?>
              
                  <div class="list-group-item">
                    <b>ProgramDay</b>: 
                    <a href="program_day-<?=$program_day->id_program_day; ?>">#<?=$program_day->id_program_day; ?></a>
                  </div>
                  <div class="list-group-item">
                  
                    <b>Program</b>: 

                    <a href="program-<?=$program_day->program->id_program; ?>"><?=$program_day->program->id_program; ?>
                    </a>

                    <input type="hidden" id="id_program_<?=$program_day->id_program_day; ?>" value="<?=$program_day->program->id_program; ?>">

                  </div>
                <div class="list-group-item">
                  <b>Day Order</b>:
                  <span id="day_order_<?=$program_day->id_program_day; ?>"><?= $program_day->day_order;  ?></span>
                </div>
                <?php if($_SESSION[variables::$prefix."allow_edit"]){ ?>
              <div class="list-group-item p-0">
                <div class="list-group list-group-horizontal text-center">
                  
                  <?php if(empty($program_day->deleted_at)){ ?>

                  <!-- list buttons -->
                  <button type="button" onclick="program_day_update_set(<?= $program_day->id_program_day; ?>)" class="list-group-item text-success list-group-item-action m-0"><i class="fa fa-pen"></i> Update</button>

                  <button type="button" onclick="program_day_move_to_trash_set(<?= $program_day->id_program_day; ?>,'<?=$program_day->day_order; ?>')" class="list-group-item text-danger list-group-item-action" <?php if(!$_SESSION[variables::$prefix."allow_edit"]) echo "disabled"; ?>><i class="fa fa-times"></i> Delete</button>
                  
                  <?php }else{ ?>
                  
                  <!-- trash buttons -->
                  <button type="button" onclick="program_day_restore_set(<?= $program_day->id_program_day; ?>,'<?=$program_day->day_order; ?>')" class="list-group-item text-success list-group-item-action m-0"><i class="fa fa-chevron-circle-up"></i> Restore</button>

                  <button type="button" onclick="program_day_delete_set(<?= $program_day->id_program_day; ?>,'<?=$program_day->day_order; ?>')" class="list-group-item text-danger list-group-item-action"><i class="fa fa-times"></i> Delete</button>
                  
                  <?php } ?>

                </div>
              </div>
              <?php }//allow edit ?>

            </div>
          </div>