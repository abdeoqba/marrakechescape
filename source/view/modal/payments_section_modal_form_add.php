      <!-- Modal -->
      <div class="modal fade" id="PaymentsAddModal" tabindex="-1" role="dialog" aria-labelledby="PaymentsAddModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form class="modal-content" action="payments-add" method="POST"  >
            
            <div class="modal-header">
              <h5 class="modal-title" id="PaymentsAddModalLabel">New Payments</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php $fk_missing = false; ?>
            <?php if($nbr_bookingss==0){ ?>
            <?php $fk_missing = true; ?>
            <div class="modal-body <?php if($nbr_bookingss==0) echo 'p-0'; ?>">
                <div class="card rounded-0 border-0 text-light bg-danger">
                  <div class="card-body">
                    <h5 class="card-title"></h5>
                    <h6 class="card-subtitle mb-2">Something is missing</h6>
                    <p class="card-text">To add a Payments there must be existing Bookingss, But there are no Bookingss now. To add a new pen go to the list of Bookingss</p>
                    <a href="bookingss" class="btn btn-outline-light"><i class="fa fa-list"></i> Bookingss list</a>
                    <a href="bookingss" class="btn btn-outline-light"><i class="fa fa-plus"></i> Add new Bookings</a>
                  </div>
                </div>
              </div>
              <?php }?>
                    
                      
              <div class="modal-body <?php if($fk_missing) echo 'd-none'; ?>">
                    
                <div class="form-group">
                  <label for="id_booking">Booking</label>
                  <small></small>
                    <?php 

                    echo '
                    <select name="id_booking" id="id_booking" class="form-control">';

                    foreach ($bookings_->bookingss as $key_bookings => $b) {

                      echo '<option value="'.$b->id_bookings.'">'.$b->id_bookings.'</option>';
                    }
                    echo "
                    </select>";

                  ?>
                </div>
                        
                <div class="form-group">
                  <label for="amount">Amount</label>
                  <small></small>
                
                      <input type="text" class="form-control" id="amount" name="amount"  >
                    
              </div>
                    
                <div class="form-group">
                  <label for="gateway">Gateway</label>
                  <small>paypal, stripe, cmi, cash</small>
                
                      <input type="text" class="form-control" id="gateway" name="gateway"  >
                    
              </div>
                    
                <div class="form-group">
                  <label for="status">Status</label>
                  <small>pending, paid, failed, refunded</small>
                
                      <input type="text" class="form-control" id="status" name="status"  >
                    
              </div>
                    
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
              <button type="submit" class="btn btn-primary" <?php if($fk_missing) echo 'disabled'; ?>><i class="fa fa-plus"></i> Add Payments</button>
            </div>
          </form>
        </div>
      </div>
      
      <script>
      //add onclick="payments_add_submit();"
      // function payments_add_submit(){
      //   $("#PaymentsAddModal form").submit();
      // }
      </script>
      