      <!-- Modal -->
      <div class="modal fade" id="PaymentsUpdateModal" tabindex="-1" role="dialog" aria-labelledby="PaymentsUpdateModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form class="modal-content" action="payments-update" method="POST">
            <div class="modal-header">
              <h5 class="modal-title" id="PaymentsUpdateModalLabel">Update Payments</h5>
              <button type="button" class="close" onclick="payments_update_dismiss();" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body"><input type="hidden" name="id_payments" id="payments_update_id_payments" >
                <div class="form-group">
                  <label for="payments_update_id_booking">Booking</label>
                  <small></small>
                  
                      <?php 

                      echo '
                      <select name="id_booking" id="payments_update_id_booking" class="form-control">';

                      foreach ($bookings_->bookingss as $key_bookings => $b_) {

                        echo '<option value="'.$b_->id_bookings.'">'.$b_->id_bookings.'</option>';
                      }
                      echo "</select>";

                    ?>
                    
                </div>
                <div class="form-group">
                  <label for="payments_update_amount">Amount</label>
                  <small></small>
                  <input type="text" class="form-control" id="payments_update_amount" name="amount" >
                </div>
                <div class="form-group">
                  <label for="payments_update_gateway">Gateway</label>
                  <small>paypal, stripe, cmi, cash</small>
                  <input type="text" class="form-control" id="payments_update_gateway" name="gateway" >
                </div>
                <div class="form-group">
                  <label for="payments_update_status">Status</label>
                  <small>pending, paid, failed, refunded</small>
                  <input type="text" class="form-control" id="payments_update_status" name="status" >
                </div>
            </div>
            <div class="modal-footer">
              
              <button type="button" class="btn btn-secondary" onclick="payments_update_dismiss();"><i class="fa fa-times"></i> Close</button>
              <button type="button" class="btn btn-success" onclick="payments_update_submit();"><i class="fa fa-pen"></i> Update Payments</button>
            </div>
          </form>
        </div>
      </div>

      <script>
        //update
        function payments_update_set(id_payments){
          //code
          
          $("#payments_update_id_payments").val(id_payments);
              
          let id_booking = $("#id_booking_"+id_payments).val();
          $("#payments_update_id_booking").val(id_booking);
              
          let amount = $("#amount_"+id_payments).text();
          $("#payments_update_amount").val(amount);
              
          let gateway = $("#gateway_"+id_payments).text();
          $("#payments_update_gateway").val(gateway);
              
          let status = $("#status_"+id_payments).text();
          $("#payments_update_status").val(status);
              $(".payments-"+id_payments+" .list-group-item").addClass(card_hover_class);

          $("#PaymentsUpdateModal").modal("show");
        }

        function payments_update_submit(){
          $("#PaymentsUpdateModal form").submit();
        }

        function payments_update_dismiss(){
          $("#PaymentsUpdateModal").modal("hide");
        }
      </script>
      