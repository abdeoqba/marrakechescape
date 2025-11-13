      <!-- Modal -->
      <div class="modal fade" id="CategoryMoveToTrashModal" tabindex="-1" role="dialog" aria-labelledby="CategoryMoveToTrashModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form class="modal-content" action="category-move-to-trash" method="POST">
            <div class="modal-header">
              <h5 class="modal-title" id="CategoryMoveToTrashModalLabel">Delete Category</h5>
              <button type="button" class="close" onclick="category_move_to_trash_dismiss();" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p><i class="far fa-lg fa-times-circle text-danger"></i> Are you Sure want to delete <b id="category_move_to_trash_id_category"></b> ?</p>
              <input type="hidden" class="form-control" id="category_move_to_trash_id_category" name="id_category">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" onclick="category_move_to_trash_dismiss();"><i class="fa fa-times"></i> Close</button>
              <button type="button" class="btn btn-danger" onclick="category_move_to_trash_submit();"><i class="fa fa-times"></i> Delete</button>
            </div>
          </form>
        </div>
      </div>

      <script>
      //delete = move to trash
      function category_move_to_trash_set(id_category,id_category){
        $("#category_move_to_trash_id_category").html(id_category);
        $("#category_move_to_trash_id_category").val(id_category);

        $(".category-"+id_category+" .list-group-item").addClass(card_hover_class);

        $("#CategoryMoveToTrashModal").modal("show");
      }

      function category_move_to_trash_submit(){
        $("#CategoryMoveToTrashModal form").submit();
      }

      function category_move_to_trash_dismiss(){
        $("#CategoryMoveToTrashModal").modal("hide");
      }
      </script>
      