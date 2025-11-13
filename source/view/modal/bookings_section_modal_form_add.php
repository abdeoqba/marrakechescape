      <!-- Modal -->
      <div class="modal fade" id="BookingsAddModal" tabindex="-1" role="dialog" aria-labelledby="BookingsAddModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form class="modal-content" action="bookings-add" method="POST"  >
            
            <div class="modal-header">
              <h5 class="modal-title" id="BookingsAddModalLabel">New Bookings</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php $fk_missing = false; ?>
            <?php if($nbr_clients==0){ ?>
            <?php $fk_missing = true; ?>
            <div class="modal-body <?php if($nbr_clients==0) echo 'p-0'; ?>">
                <div class="card rounded-0 border-0 text-light bg-danger">
                  <div class="card-body">
                    <h5 class="card-title"></h5>
                    <h6 class="card-subtitle mb-2">Something is missing</h6>
                    <p class="card-text">To add a Bookings there must be existing Clients, But there are no Clients now. To add a new pen go to the list of Clients</p>
                    <a href="clients" class="btn btn-outline-light"><i class="fa fa-list"></i> Clients list</a>
                    <a href="clients" class="btn btn-outline-light"><i class="fa fa-plus"></i> Add new Client</a>
                  </div>
                </div>
              </div>
              <?php }?>
                    
                      
            <?php if($nbr_programs==0){ ?>
            <?php $fk_missing = true; ?>
            <div class="modal-body <?php if($nbr_programs==0) echo 'p-0'; ?>">
                <div class="card rounded-0 border-0 text-light bg-danger">
                  <div class="card-body">
                    <h5 class="card-title"></h5>
                    <h6 class="card-subtitle mb-2">Something is missing</h6>
                    <p class="card-text">To add a Bookings there must be existing Programs, But there are no Programs now. To add a new pen go to the list of Programs</p>
                    <a href="programs" class="btn btn-outline-light"><i class="fa fa-list"></i> Programs list</a>
                    <a href="programs" class="btn btn-outline-light"><i class="fa fa-plus"></i> Add new Program</a>
                  </div>
                </div>
              </div>
              <?php }?>
                    
                      
              <div class="modal-body <?php if($fk_missing) echo 'd-none'; ?>">
                    
                <div class="form-group">
                  <label for="id_client">Client</label>
                  <small></small>
                    <?php 

                    echo '
                    <select name="id_client" id="id_client" class="form-control">';

                    foreach ($client_->clients as $key_client => $c) {

                      echo '<option value="'.$c->id_client.'">'.$c->first_name.'</option>';
                    }
                    echo "
                    </select>";

                  ?>
                </div>
                        
                    
                <div class="form-group">
                  <label for="id_program">Program</label>
                  <small></small>
                    <?php 

                    echo '
                    <select name="id_program" id="id_program" class="form-control">';

                    foreach ($program_->programs as $key_program => $p) {

                      echo '<option value="'.$p->id_program.'">'.$p->id_program.'</option>';
                    }
                    echo "
                    </select>";

                  ?>
                </div>
                        
                <div class="form-group">
                  <label for="persons">Number Persons</label>
                  <small></small>
                
                      <input type="text" class="form-control" id="persons" name="persons"  >
                    
              </div>
                    
                <div class="form-group">
                  <label for="travel_date">Travel Date</label>
                  <small></small>
                
                      <input type="date" class="form-control" id="travel_date" name="travel_date" value="<?=date(variables::$date_format); ?>"  >
                    
              </div>
                    
                <div class="form-group">
                  <label for="status">Status</label>
                  <small>pending, confirmed, cancelled</small>
                
                      <input type="text" class="form-control" id="status" name="status"  >
                    
              </div>
                    
                <div class="form-group">
                  <label for="total_amount">Total Amount</label>
                  <small></small>
                
                      <input type="text" class="form-control" id="total_amount" name="total_amount"  >
                    
              </div>
                    
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
              <button type="submit" class="btn btn-primary" <?php if($fk_missing) echo 'disabled'; ?>><i class="fa fa-plus"></i> Add Bookings</button>
            </div>
          </form>
        </div>
      </div>
      
      <script>
      //add onclick="bookings_add_submit();"
      // function bookings_add_submit(){
      //   $("#BookingsAddModal form").submit();
      // }
      </script>
      