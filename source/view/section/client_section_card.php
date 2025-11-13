
          <div class="col-lg-4 col-md-6 pt-3 client-<?=$client->id_client; ?>">
            
            <div class="list-group list-group-client">
              
              <?php if(!empty($client->deleted_at)){ ?>
              
              <div class="list-group-item"><b>Deleted At</b>: <?= $client->deleted_at;  ?></div>
              <?php } ?>
              
                  <div class="list-group-item">
                    <b>Client</b>: 
                    <a href="client-<?=$client->id_client; ?>">#<?=$client->id_client; ?></a>
                  </div>
                <div class="list-group-item">
                  <b>First Name</b>:
                  <span id="first_name_<?=$client->id_client; ?>"><?= $client->first_name;  ?></span>
                </div>
                
                <div class="list-group-item">
                  <b>Last Name</b>:
                  <span id="last_name_<?=$client->id_client; ?>"><?= $client->last_name;  ?></span>
                </div>
                
                <div class="list-group-item">
                  <b>Email</b>:
                  <span id="email_<?=$client->id_client; ?>"><?= $client->email;  ?></span>
                </div>
                
                <div class="list-group-item">
                  <b>Phone</b>:
                  <span id="phone_<?=$client->id_client; ?>"><?= $client->phone;  ?></span>
                </div>
                <?php if($_SESSION[variables::$prefix."allow_edit"]){ ?>
              <div class="list-group-item p-0">
                <div class="list-group list-group-horizontal text-center">
                  
                  <?php if(empty($client->deleted_at)){ ?>

                  <!-- list buttons -->
                  <button type="button" onclick="client_update_set(<?= $client->id_client; ?>)" class="list-group-item text-success list-group-item-action m-0"><i class="fa fa-pen"></i> Update</button>

                  <button type="button" onclick="client_move_to_trash_set(<?= $client->id_client; ?>,'<?=$client->first_name; ?>')" class="list-group-item text-danger list-group-item-action" <?php if(!$_SESSION[variables::$prefix."allow_edit"]) echo "disabled"; ?>><i class="fa fa-times"></i> Delete</button>
                  
                  <?php }else{ ?>
                  
                  <!-- trash buttons -->
                  <button type="button" onclick="client_restore_set(<?= $client->id_client; ?>,'<?=$client->first_name; ?>')" class="list-group-item text-success list-group-item-action m-0"><i class="fa fa-chevron-circle-up"></i> Restore</button>

                  <button type="button" onclick="client_delete_set(<?= $client->id_client; ?>,'<?=$client->first_name; ?>')" class="list-group-item text-danger list-group-item-action"><i class="fa fa-times"></i> Delete</button>
                  
                  <?php } ?>

                </div>
              </div>
              <?php }//allow edit ?>

            </div>
          </div>