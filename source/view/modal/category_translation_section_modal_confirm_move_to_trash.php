      <!-- Modal -->
      <div class="modal fade" id="CategoryTranslationMoveToTrashModal" tabindex="-1" role="dialog" aria-labelledby="CategoryTranslationMoveToTrashModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form class="modal-content" action="category_translation-move-to-trash" method="POST">
            <div class="modal-header">
              <h5 class="modal-title" id="CategoryTranslationMoveToTrashModalLabel">Delete Category Translation</h5>
              <button type="button" class="close" onclick="category_translation_move_to_trash_dismiss();" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p><i class="far fa-lg fa-times-circle text-danger"></i> Are you Sure want to delete <b id="category_translation_move_to_trash_title"></b> ?</p>
              <input type="hidden" class="form-control" id="category_translation_move_to_trash_id_category_translation" name="id_category_translation">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" onclick="category_translation_move_to_trash_dismiss();"><i class="fa fa-times"></i> Close</button>
              <button type="button" class="btn btn-danger" onclick="category_translation_move_to_trash_submit();"><i class="fa fa-times"></i> Delete</button>
            </div>
          </form>
        </div>
      </div>

      <script>
      //delete = move to trash
      function category_translation_move_to_trash_set(id_category_translation,title){
        $("#category_translation_move_to_trash_title").html(title);
        $("#category_translation_move_to_trash_id_category_translation").val(id_category_translation);

        $(".category_translation-"+id_category_translation+" .list-group-item").addClass(card_hover_class);

        $("#CategoryTranslationMoveToTrashModal").modal("show");
      }

      function category_translation_move_to_trash_submit(){
        $("#CategoryTranslationMoveToTrashModal form").submit();
      }

      function category_translation_move_to_trash_dismiss(){
        $("#CategoryTranslationMoveToTrashModal").modal("hide");
      }
      </script>
      