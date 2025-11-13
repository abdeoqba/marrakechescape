
          <div class="col-lg-4 col-md-6 pt-3 bookings-<?=$bookings->id_bookings; ?>">
            
            <div class="list-group list-group-bookings">
              
              <?php if(!empty($bookings->deleted_at)){ ?>
              
              <div class="list-group-item"><b>Deleted At</b>: <?= $bookings->deleted_at;  ?></div>
              <?php } ?>
              
                  <div class="list-group-item">
                    <b>Bookings</b>: 
                    <a href="bookings-<?=$bookings->id_bookings; ?>">#<?=$bookings->id_bookings; ?></a>
                  </div>
                  <div class="list-group-item">
                  
                    <b>Client</b>: 

                    <a href="client-<?=$bookings->client->id_client; ?>"><?=$bookings->client->first_name; ?>
                    </a>

                    <input type="hidden" id="id_client_<?=$bookings->id_bookings; ?>" value="<?=$bookings->client->id_client; ?>">

                  </div>
                  <div class="list-group-item">
                  
                    <b>Program</b>: 

                    <a href="program-<?=$bookings->program->id_program; ?>"><?=$bookings->program->id_program; ?>
                    </a>

                    <input type="hidden" id="id_program_<?=$bookings->id_bookings; ?>" value="<?=$bookings->program->id_program; ?>">

                  </div>
                <div class="list-group-item">
                  <b>Number Persons</b>:
                  <span id="persons_<?=$bookings->id_bookings; ?>"><?= $bookings->persons;  ?></span>
                </div>
                
                <div class="list-group-item">
                  <b>Travel Date</b>:
                  <span id="travel_date_<?=$bookings->id_bookings; ?>"><?= $bookings->travel_date;  ?></span>
                </div>
                
                <div class="list-group-item">
                  <b>Status</b>:
                  <span id="status_<?=$bookings->id_bookings; ?>"><?= $bookings->status;  ?></span>
                </div>
                
                <div class="list-group-item">
                  <b>Total Amount</b>:
                  <span id="total_amount_<?=$bookings->id_bookings; ?>"><?= $bookings->total_amount;  ?></span>
                </div>
                <?php if($_SESSION[variables::$prefix."allow_edit"]){ ?>
              <div class="list-group-item p-0">
                <div class="list-group list-group-horizontal text-center">
                  
                  <?php if(empty($bookings->deleted_at)){ ?>

                  <!-- list buttons -->
                  <button type="button" onclick="bookings_update_set(<?= $bookings->id_bookings; ?>)" class="list-group-item text-success list-group-item-action m-0"><i class="fa fa-pen"></i> Update</button>

                  <button type="button" onclick="bookings_move_to_trash_set(<?= $bookings->id_bookings; ?>,'<?=$bookings->id_bookings; ?>')" class="list-group-item text-danger list-group-item-action" <?php if(!$_SESSION[variables::$prefix."allow_edit"]) echo "disabled"; ?>><i class="fa fa-times"></i> Delete</button>
                  
                  <?php }else{ ?>
                  
                  <!-- trash buttons -->
                  <button type="button" onclick="bookings_restore_set(<?= $bookings->id_bookings; ?>,'<?=$bookings->id_bookings; ?>')" class="list-group-item text-success list-group-item-action m-0"><i class="fa fa-chevron-circle-up"></i> Restore</button>

                  <button type="button" onclick="bookings_delete_set(<?= $bookings->id_bookings; ?>,'<?=$bookings->id_bookings; ?>')" class="list-group-item text-danger list-group-item-action"><i class="fa fa-times"></i> Delete</button>
                  
                  <?php } ?>

                </div>
              </div>
              <?php }//allow edit ?>

            </div>
          </div>