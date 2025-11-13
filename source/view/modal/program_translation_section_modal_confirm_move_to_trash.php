      <!-- Modal -->
      <div class="modal fade" id="ProgramTranslationMoveToTrashModal" tabindex="-1" role="dialog" aria-labelledby="ProgramTranslationMoveToTrashModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form class="modal-content" action="program_translation-move-to-trash" method="POST">
            <div class="modal-header">
              <h5 class="modal-title" id="ProgramTranslationMoveToTrashModalLabel">Delete Program Translation</h5>
              <button type="button" class="close" onclick="program_translation_move_to_trash_dismiss();" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p><i class="far fa-lg fa-times-circle text-danger"></i> Are you Sure want to delete <b id="program_translation_move_to_trash_title"></b> ?</p>
              <input type="hidden" class="form-control" id="program_translation_move_to_trash_id_program_translation" name="id_program_translation">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" onclick="program_translation_move_to_trash_dismiss();"><i class="fa fa-times"></i> Close</button>
              <button type="button" class="btn btn-danger" onclick="program_translation_move_to_trash_submit();"><i class="fa fa-times"></i> Delete</button>
            </div>
          </form>
        </div>
      </div>

      <script>
      //delete = move to trash
      function program_translation_move_to_trash_set(id_program_translation,title){
        $("#program_translation_move_to_trash_title").html(title);
        $("#program_translation_move_to_trash_id_program_translation").val(id_program_translation);

        $(".program_translation-"+id_program_translation+" .list-group-item").addClass(card_hover_class);

        $("#ProgramTranslationMoveToTrashModal").modal("show");
      }

      function program_translation_move_to_trash_submit(){
        $("#ProgramTranslationMoveToTrashModal form").submit();
      }

      function program_translation_move_to_trash_dismiss(){
        $("#ProgramTranslationMoveToTrashModal").modal("hide");
      }
      </script>
      