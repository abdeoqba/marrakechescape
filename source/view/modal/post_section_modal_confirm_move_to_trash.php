      <!-- Modal -->
      <div class="modal fade" id="PostMoveToTrashModal" tabindex="-1" role="dialog" aria-labelledby="PostMoveToTrashModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form class="modal-content" action="post-move-to-trash" method="POST">
            <div class="modal-header">
              <h5 class="modal-title" id="PostMoveToTrashModalLabel">Delete Post</h5>
              <button type="button" class="close" onclick="post_move_to_trash_dismiss();" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p><i class="far fa-lg fa-times-circle text-danger"></i> Are you Sure want to delete <b id="post_move_to_trash_id_post"></b> ?</p>
              <input type="hidden" class="form-control" id="post_move_to_trash_id_post" name="id_post">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" onclick="post_move_to_trash_dismiss();"><i class="fa fa-times"></i> Close</button>
              <button type="button" class="btn btn-danger" onclick="post_move_to_trash_submit();"><i class="fa fa-times"></i> Delete</button>
            </div>
          </form>
        </div>
      </div>

      <script>
      //delete = move to trash
      function post_move_to_trash_set(id_post,id_post){
        $("#post_move_to_trash_id_post").html(id_post);
        $("#post_move_to_trash_id_post").val(id_post);

        $(".post-"+id_post+" .list-group-item").addClass(card_hover_class);

        $("#PostMoveToTrashModal").modal("show");
      }

      function post_move_to_trash_submit(){
        $("#PostMoveToTrashModal form").submit();
      }

      function post_move_to_trash_dismiss(){
        $("#PostMoveToTrashModal").modal("hide");
      }
      </script>
      