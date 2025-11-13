      <!-- Modal -->
      <div class="modal fade" id="PostCategoryMoveToTrashModal" tabindex="-1" role="dialog" aria-labelledby="PostCategoryMoveToTrashModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form class="modal-content" action="post_category-move-to-trash" method="POST">
            <div class="modal-header">
              <h5 class="modal-title" id="PostCategoryMoveToTrashModalLabel">Delete Post Category</h5>
              <button type="button" class="close" onclick="post_category_move_to_trash_dismiss();" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p><i class="far fa-lg fa-times-circle text-danger"></i> Are you Sure want to delete <b id="post_category_move_to_trash_id_post_category"></b> ?</p>
              <input type="hidden" class="form-control" id="post_category_move_to_trash_id_post_category" name="id_post_category">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" onclick="post_category_move_to_trash_dismiss();"><i class="fa fa-times"></i> Close</button>
              <button type="button" class="btn btn-danger" onclick="post_category_move_to_trash_submit();"><i class="fa fa-times"></i> Delete</button>
            </div>
          </form>
        </div>
      </div>

      <script>
      //delete = move to trash
      function post_category_move_to_trash_set(id_post_category,id_post_category){
        $("#post_category_move_to_trash_id_post_category").html(id_post_category);
        $("#post_category_move_to_trash_id_post_category").val(id_post_category);

        $(".post_category-"+id_post_category+" .list-group-item").addClass(card_hover_class);

        $("#PostCategoryMoveToTrashModal").modal("show");
      }

      function post_category_move_to_trash_submit(){
        $("#PostCategoryMoveToTrashModal form").submit();
      }

      function post_category_move_to_trash_dismiss(){
        $("#PostCategoryMoveToTrashModal").modal("hide");
      }
      </script>
      