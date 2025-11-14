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
                  <label for="client_update_full_name">Full Name</label>
                  <small></small>
                  <input type="text" class="form-control" id="client_update_full_name" name="full_name" >
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
                <div class="form-group">
                  <label for="client_update_country">Country</label>
                  <small></small>
                  <input type="text" class="form-control" id="client_update_country" name="country" >
                </div>
                <div class="form-group">
                  <label for="client_update_program">Program</label>
                  <small></small>
                  <input type="text" class="form-control" id="client_update_program" name="program" >
                </div>
                <div class="form-group">
                  <label for="client_update_id_program">Program</label>
                  <small></small>
                  <input type="text" class="form-control" id="client_update_id_program" name="id_program" >
                </div>
                <div class="form-group">
                  <label for="client_update_message">Message</label>
                  <small></small>
                  
                        <textarea class="form-control" rows="5" name="message" id="client_update_message"></textarea>
                      
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
              
          let full_name = $("#full_name_"+id_client).text();
          $("#client_update_full_name").val(full_name);
              
          let email = $("#email_"+id_client).text();
          $("#client_update_email").val(email);
              
          let phone = $("#phone_"+id_client).text();
          $("#client_update_phone").val(phone);
              
          let country = $("#country_"+id_client).text();
          $("#client_update_country").val(country);
              
          let program = $("#program_"+id_client).text();
          $("#client_update_program").val(program);
              
          let id_program = $("#id_program_"+id_client).text();
          $("#client_update_id_program").val(id_program);
              
          let message = $("#message_"+id_client).text();
          $("#client_update_message").val(message);
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
      