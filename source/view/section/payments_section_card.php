
          <div class="col-lg-4 col-md-6 pt-3 payments-<?=$payments->id_payments; ?>">
            
            <div class="list-group list-group-payments">
              
              <?php if(!empty($payments->deleted_at)){ ?>
              
              <div class="list-group-item"><b>Deleted At</b>: <?= $payments->deleted_at;  ?></div>
              <?php } ?>
              
                  <div class="list-group-item">
                    <b>Payments</b>: 
                    <a href="payments-<?=$payments->id_payments; ?>">#<?=$payments->id_payments; ?></a>
                  </div>
                  <div class="list-group-item">
                  
                    <b>Booking</b>: 

                    <a href="bookings-<?=$payments->bookings->id_bookings; ?>"><?=$payments->bookings->id_bookings; ?>
                    </a>

                    <input type="hidden" id="id_booking_<?=$payments->id_payments; ?>" value="<?=$payments->bookings->id_bookings; ?>">

                  </div>
                <div class="list-group-item">
                  <b>Amount</b>:
                  <span id="amount_<?=$payments->id_payments; ?>"><?= $payments->amount;  ?></span>
                </div>
                
                <div class="list-group-item">
                  <b>Gateway</b>:
                  <span id="gateway_<?=$payments->id_payments; ?>"><?= $payments->gateway;  ?></span>
                </div>
                
                <div class="list-group-item">
                  <b>Status</b>:
                  <span id="status_<?=$payments->id_payments; ?>"><?= $payments->status;  ?></span>
                </div>
                <?php if($_SESSION[variables::$prefix."allow_edit"]){ ?>
              <div class="list-group-item p-0">
                <div class="list-group list-group-horizontal text-center">
                  
                  <?php if(empty($payments->deleted_at)){ ?>

                  <!-- list buttons -->
                  <button type="button" onclick="payments_update_set(<?= $payments->id_payments; ?>)" class="list-group-item text-success list-group-item-action m-0"><i class="fa fa-pen"></i> Update</button>

                  <button type="button" onclick="payments_move_to_trash_set(<?= $payments->id_payments; ?>,'<?=$payments->id_payments; ?>')" class="list-group-item text-danger list-group-item-action" <?php if(!$_SESSION[variables::$prefix."allow_edit"]) echo "disabled"; ?>><i class="fa fa-times"></i> Delete</button>
                  
                  <?php }else{ ?>
                  
                  <!-- trash buttons -->
                  <button type="button" onclick="payments_restore_set(<?= $payments->id_payments; ?>,'<?=$payments->id_payments; ?>')" class="list-group-item text-success list-group-item-action m-0"><i class="fa fa-chevron-circle-up"></i> Restore</button>

                  <button type="button" onclick="payments_delete_set(<?= $payments->id_payments; ?>,'<?=$payments->id_payments; ?>')" class="list-group-item text-danger list-group-item-action"><i class="fa fa-times"></i> Delete</button>
                  
                  <?php } ?>

                </div>
              </div>
              <?php }//allow edit ?>

            </div>
          </div>