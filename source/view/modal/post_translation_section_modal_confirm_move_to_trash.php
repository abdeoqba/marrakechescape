      <!-- Modal -->
      <div class="modal fade" id="PostTranslationMoveToTrashModal" tabindex="-1" role="dialog" aria-labelledby="PostTranslationMoveToTrashModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form class="modal-content" action="post_translation-move-to-trash" method="POST">
            <div class="modal-header">
              <h5 class="modal-title" id="PostTranslationMoveToTrashModalLabel">Delete Post Translation</h5>
              <button type="button" class="close" onclick="post_translation_move_to_trash_dismiss();" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p><i class="far fa-lg fa-times-circle text-danger"></i> Are you Sure want to delete <b id="post_translation_move_to_trash_title"></b> ?</p>
              <input type="hidden" class="form-control" id="post_translation_move_to_trash_id_post_translation" name="id_post_translation">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" onclick="post_translation_move_to_trash_dismiss();"><i class="fa fa-times"></i> Close</button>
              <button type="button" class="btn btn-danger" onclick="post_translation_move_to_trash_submit();"><i class="fa fa-times"></i> Delete</button>
            </div>
          </form>
        </div>
      </div>

      <script>
      //delete = move to trash
      function post_translation_move_to_trash_set(id_post_translation,title){
        $("#post_translation_move_to_trash_title").html(title);
        $("#post_translation_move_to_trash_id_post_translation").val(id_post_translation);

        $(".post_translation-"+id_post_translation+" .list-group-item").addClass(card_hover_class);

        $("#PostTranslationMoveToTrashModal").modal("show");
      }

      function post_translation_move_to_trash_submit(){
        $("#PostTranslationMoveToTrashModal form").submit();
      }

      function post_translation_move_to_trash_dismiss(){
        $("#PostTranslationMoveToTrashModal").modal("hide");
      }
      </script>
      