      <!-- Modal -->
      <div class="modal fade" id="BookingsUpdateModal" tabindex="-1" role="dialog" aria-labelledby="BookingsUpdateModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form class="modal-content" action="bookings-update" method="POST">
            <div class="modal-header">
              <h5 class="modal-title" id="BookingsUpdateModalLabel">Update Bookings</h5>
              <button type="button" class="close" onclick="bookings_update_dismiss();" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body"><input type="hidden" name="id_bookings" id="bookings_update_id_bookings" >
                <div class="form-group">
                  <label for="bookings_update_id_client">Client</label>
                  <small></small>
                  
                      <?php 

                      echo '
                      <select name="id_client" id="bookings_update_id_client" class="form-control">';

                      foreach ($client_->clients as $key_client => $c_) {

                        echo '<option value="'.$c_->id_client.'">'.$c_->first_name.'</option>';
                      }
                      echo "</select>";

                    ?>
                    
                </div>
                <div class="form-group">
                  <label for="bookings_update_id_program">Program</label>
                  <small></small>
                  
                      <?php 

                      echo '
                      <select name="id_program" id="bookings_update_id_program" class="form-control">';

                      foreach ($program_->programs as $key_program => $p_) {

                        echo '<option value="'.$p_->id_program.'">'.$p_->id_program.'</option>';
                      }
                      echo "</select>";

                    ?>
                    
                </div>
                <div class="form-group">
                  <label for="bookings_update_persons">Number Persons</label>
                  <small></small>
                  <input type="text" class="form-control" id="bookings_update_persons" name="persons" >
                </div>
                <div class="form-group">
                  <label for="bookings_update_travel_date">Travel Date</label>
                  <small></small>
                  <input type="date" class="form-control" id="bookings_update_travel_date" name="travel_date" >
                </div>
                <div class="form-group">
                  <label for="bookings_update_status">Status</label>
                  <small>pending, confirmed, cancelled</small>
                  <input type="text" class="form-control" id="bookings_update_status" name="status" >
                </div>
                <div class="form-group">
                  <label for="bookings_update_total_amount">Total Amount</label>
                  <small></small>
                  <input type="text" class="form-control" id="bookings_update_total_amount" name="total_amount" >
                </div>
            </div>
            <div class="modal-footer">
              
              <button type="button" class="btn btn-secondary" onclick="bookings_update_dismiss();"><i class="fa fa-times"></i> Close</button>
              <button type="button" class="btn btn-success" onclick="bookings_update_submit();"><i class="fa fa-pen"></i> Update Bookings</button>
            </div>
          </form>
        </div>
      </div>

      <script>
        //update
        function bookings_update_set(id_bookings){
          //code
          
          $("#bookings_update_id_bookings").val(id_bookings);
              
          let id_client = $("#id_client_"+id_bookings).val();
          $("#bookings_update_id_client").val(id_client);
              
          let id_program = $("#id_program_"+id_bookings).val();
          $("#bookings_update_id_program").val(id_program);
              
          let persons = $("#persons_"+id_bookings).text();
          $("#bookings_update_persons").val(persons);
              
          let travel_date = $("#travel_date_"+id_bookings).text();
          $("#bookings_update_travel_date").val(travel_date);
              
          let status = $("#status_"+id_bookings).text();
          $("#bookings_update_status").val(status);
              
          let total_amount = $("#total_amount_"+id_bookings).text();
          $("#bookings_update_total_amount").val(total_amount);
              $(".bookings-"+id_bookings+" .list-group-item").addClass(card_hover_class);

          $("#BookingsUpdateModal").modal("show");
        }

        function bookings_update_submit(){
          $("#BookingsUpdateModal form").submit();
        }

        function bookings_update_dismiss(){
          $("#BookingsUpdateModal").modal("hide");
        }
      </script>
      