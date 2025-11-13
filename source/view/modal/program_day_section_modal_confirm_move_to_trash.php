      <!-- Modal -->
      <div class="modal fade" id="ProgramDayMoveToTrashModal" tabindex="-1" role="dialog" aria-labelledby="ProgramDayMoveToTrashModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form class="modal-content" action="program_day-move-to-trash" method="POST">
            <div class="modal-header">
              <h5 class="modal-title" id="ProgramDayMoveToTrashModalLabel">Delete Program Day</h5>
              <button type="button" class="close" onclick="program_day_move_to_trash_dismiss();" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p><i class="far fa-lg fa-times-circle text-danger"></i> Are you Sure want to delete <b id="program_day_move_to_trash_day_order"></b> ?</p>
              <input type="hidden" class="form-control" id="program_day_move_to_trash_id_program_day" name="id_program_day">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" onclick="program_day_move_to_trash_dismiss();"><i class="fa fa-times"></i> Close</button>
              <button type="button" class="btn btn-danger" onclick="program_day_move_to_trash_submit();"><i class="fa fa-times"></i> Delete</button>
            </div>
          </form>
        </div>
      </div>

      <script>
      //delete = move to trash
      function program_day_move_to_trash_set(id_program_day,day_order){
        $("#program_day_move_to_trash_day_order").html(day_order);
        $("#program_day_move_to_trash_id_program_day").val(id_program_day);

        $(".program_day-"+id_program_day+" .list-group-item").addClass(card_hover_class);

        $("#ProgramDayMoveToTrashModal").modal("show");
      }

      function program_day_move_to_trash_submit(){
        $("#ProgramDayMoveToTrashModal form").submit();
      }

      function program_day_move_to_trash_dismiss(){
        $("#ProgramDayMoveToTrashModal").modal("hide");
      }
      </script>
      