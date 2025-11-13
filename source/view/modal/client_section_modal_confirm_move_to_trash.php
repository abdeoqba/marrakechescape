      <!-- Modal -->
      <div class="modal fade" id="ClientMoveToTrashModal" tabindex="-1" role="dialog" aria-labelledby="ClientMoveToTrashModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form class="modal-content" action="client-move-to-trash" method="POST">
            <div class="modal-header">
              <h5 class="modal-title" id="ClientMoveToTrashModalLabel">Delete Client</h5>
              <button type="button" class="close" onclick="client_move_to_trash_dismiss();" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p><i class="far fa-lg fa-times-circle text-danger"></i> Are you Sure want to delete <b id="client_move_to_trash_first_name"></b> ?</p>
              <input type="hidden" class="form-control" id="client_move_to_trash_id_client" name="id_client">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" onclick="client_move_to_trash_dismiss();"><i class="fa fa-times"></i> Close</button>
              <button type="button" class="btn btn-danger" onclick="client_move_to_trash_submit();"><i class="fa fa-times"></i> Delete</button>
            </div>
          </form>
        </div>
      </div>

      <script>
      //delete = move to trash
      function client_move_to_trash_set(id_client,first_name){
        $("#client_move_to_trash_first_name").html(first_name);
        $("#client_move_to_trash_id_client").val(id_client);

        $(".client-"+id_client+" .list-group-item").addClass(card_hover_class);

        $("#ClientMoveToTrashModal").modal("show");
      }

      function client_move_to_trash_submit(){
        $("#ClientMoveToTrashModal form").submit();
      }

      function client_move_to_trash_dismiss(){
        $("#ClientMoveToTrashModal").modal("hide");
      }
      </script>
      