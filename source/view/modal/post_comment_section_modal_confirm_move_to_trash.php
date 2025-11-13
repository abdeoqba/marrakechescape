      <!-- Modal -->
      <div class="modal fade" id="PostCommentMoveToTrashModal" tabindex="-1" role="dialog" aria-labelledby="PostCommentMoveToTrashModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form class="modal-content" action="post_comment-move-to-trash" method="POST">
            <div class="modal-header">
              <h5 class="modal-title" id="PostCommentMoveToTrashModalLabel">Delete Post Comment</h5>
              <button type="button" class="close" onclick="post_comment_move_to_trash_dismiss();" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p><i class="far fa-lg fa-times-circle text-danger"></i> Are you Sure want to delete <b id="post_comment_move_to_trash_name"></b> ?</p>
              <input type="hidden" class="form-control" id="post_comment_move_to_trash_id_post_comment" name="id_post_comment">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" onclick="post_comment_move_to_trash_dismiss();"><i class="fa fa-times"></i> Close</button>
              <button type="button" class="btn btn-danger" onclick="post_comment_move_to_trash_submit();"><i class="fa fa-times"></i> Delete</button>
            </div>
          </form>
        </div>
      </div>

      <script>
      //delete = move to trash
      function post_comment_move_to_trash_set(id_post_comment,name){
        $("#post_comment_move_to_trash_name").html(name);
        $("#post_comment_move_to_trash_id_post_comment").val(id_post_comment);

        $(".post_comment-"+id_post_comment+" .list-group-item").addClass(card_hover_class);

        $("#PostCommentMoveToTrashModal").modal("show");
      }

      function post_comment_move_to_trash_submit(){
        $("#PostCommentMoveToTrashModal form").submit();
      }

      function post_comment_move_to_trash_dismiss(){
        $("#PostCommentMoveToTrashModal").modal("hide");
      }
      </script>
      