      <!-- Modal -->
      <div class="modal fade" id="ClientUpdateModal" tabindex="-1" role="dialog" aria-labelledby="ClientUpdateModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form class="modal-content" action="client-update" method="POST">
            <div class="modal-header">
              <h5 class="modal-title" id="ClientUpdateModalLabel">Update Client</h5>
              <button type="button" class="close" onclick="client_update_dismiss();" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body"><input type="hidden" name="id_client" id="client_update_id_client" >
                <div class="form-group">
                  <label for="client_update_first_name">First Name</label>
                  <small></small>
                  <input type="text" class="form-control" id="client_update_first_name" name="first_name" >
                </div>
                <div class="form-group">
                  <label for="client_update_last_name">Last Name</label>
                  <small></small>
                  <input type="text" class="form-control" id="client_update_last_name" name="last_name" >
                </div>
                <div class="form-group">
                  <label for="client_update_email">Email</label>
                  <small></small>
                  <input type="text" class="form-control" id="client_update_email" name="email" >
                </div>
                <div class="form-group">
                  <label for="client_update_phone">Phone</label>
                  <small></small>
                  <input type="text" class="form-control" id="client_update_phone" name="phone" >
                </div>
            </div>
            <div class="modal-footer">
              
              <button type="button" class="btn btn-secondary" onclick="client_update_dismiss();"><i class="fa fa-times"></i> Close</button>
              <button type="button" class="btn btn-success" onclick="client_update_submit();"><i class="fa fa-pen"></i> Update Client</button>
            </div>
          </form>
        </div>
      </div>

      <script>
        //update
        function client_update_set(id_client){
          //code
          
          $("#client_update_id_client").val(id_client);
              
          let first_name = $("#first_name_"+id_client).text();
          $("#client_update_first_name").val(first_name);
              
          let last_name = $("#last_name_"+id_client).text();
          $("#client_update_last_name").val(last_name);
              
          let email = $("#email_"+id_client).text();
          $("#client_update_email").val(email);
              
          let phone = $("#phone_"+id_client).text();
          $("#client_update_phone").val(phone);
              $(".client-"+id_client+" .list-group-item").addClass(card_hover_class);

          $("#ClientUpdateModal").modal("show");
        }

        function client_update_submit(){
          $("#ClientUpdateModal form").submit();
        }

        function client_update_dismiss(){
          $("#ClientUpdateModal").modal("hide");
        }
      </script>
      