      <!-- Modal -->
      <div class="modal fade" id="ClientAddModal" tabindex="-1" role="dialog" aria-labelledby="ClientAddModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form class="modal-content" action="client-add" method="POST"  >
            
            <div class="modal-header">
              <h5 class="modal-title" id="ClientAddModalLabel">New Client</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php $fk_missing = false; ?>
              <div class="modal-body <?php if($fk_missing) echo 'd-none'; ?>">
                <div class="form-group">
                  <label for="first_name">First Name</label>
                  <small></small>
                
                      <input type="text" class="form-control" id="first_name" name="first_name"  >
                    
              </div>
                    
                <div class="form-group">
                  <label for="last_name">Last Name</label>
                  <small></small>
                
                      <input type="text" class="form-control" id="last_name" name="last_name"  >
                    
              </div>
                    
                <div class="form-group">
                  <label for="email">Email</label>
                  <small></small>
                
                      <input type="text" class="form-control" id="email" name="email"  >
                    
              </div>
                    
                <div class="form-group">
                  <label for="phone">Phone</label>
                  <small></small>
                
                      <input type="text" class="form-control" id="phone" name="phone"  >
                    
              </div>
                    
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
              <button type="submit" class="btn btn-primary" <?php if($fk_missing) echo 'disabled'; ?>><i class="fa fa-plus"></i> Add Client</button>
            </div>
          </form>
        </div>
      </div>
      
      <script>
      //add onclick="client_add_submit();"
      // function client_add_submit(){
      //   $("#ClientAddModal form").submit();
      // }
      </script>
      