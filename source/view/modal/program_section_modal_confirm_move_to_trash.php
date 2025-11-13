      <!-- Modal -->
      <div class="modal fade" id="ProgramMoveToTrashModal" tabindex="-1" role="dialog" aria-labelledby="ProgramMoveToTrashModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form class="modal-content" action="program-move-to-trash" method="POST">
            <div class="modal-header">
              <h5 class="modal-title" id="ProgramMoveToTrashModalLabel">Delete Program</h5>
              <button type="button" class="close" onclick="program_move_to_trash_dismiss();" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p><i class="far fa-lg fa-times-circle text-danger"></i> Are you Sure want to delete <b id="program_move_to_trash_id_program"></b> ?</p>
              <input type="hidden" class="form-control" id="program_move_to_trash_id_program" name="id_program">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" onclick="program_move_to_trash_dismiss();"><i class="fa fa-times"></i> Close</button>
              <button type="button" class="btn btn-danger" onclick="program_move_to_trash_submit();"><i class="fa fa-times"></i> Delete</button>
            </div>
          </form>
        </div>
      </div>

      <script>
      //delete = move to trash
      function program_move_to_trash_set(id_program,id_program){
        $("#program_move_to_trash_id_program").html(id_program);
        $("#program_move_to_trash_id_program").val(id_program);

        $(".program-"+id_program+" .list-group-item").addClass(card_hover_class);

        $("#ProgramMoveToTrashModal").modal("show");
      }

      function program_move_to_trash_submit(){
        $("#ProgramMoveToTrashModal form").submit();
      }

      function program_move_to_trash_dismiss(){
        $("#ProgramMoveToTrashModal").modal("hide");
      }
      </script>
      