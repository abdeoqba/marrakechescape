      <!-- Modal -->
      <div class="modal fade" id="ImageMoveToTrashModal" tabindex="-1" role="dialog" aria-labelledby="ImageMoveToTrashModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form class="modal-content" action="image-move-to-trash" method="POST">
            <div class="modal-header">
              <h5 class="modal-title" id="ImageMoveToTrashModalLabel">Delete Image</h5>
              <button type="button" class="close" onclick="image_move_to_trash_dismiss();" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p><i class="far fa-lg fa-times-circle text-danger"></i> Are you Sure want to delete <b id="image_move_to_trash_alt_text"></b> ?</p>
              <input type="hidden" class="form-control" id="image_move_to_trash_id_image" name="id_image">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" onclick="image_move_to_trash_dismiss();"><i class="fa fa-times"></i> Close</button>
              <button type="button" class="btn btn-danger" onclick="image_move_to_trash_submit();"><i class="fa fa-times"></i> Delete</button>
            </div>
          </form>
        </div>
      </div>

      <script>
      //delete = move to trash
      function image_move_to_trash_set(id_image,alt_text){
        $("#image_move_to_trash_alt_text").html(alt_text);
        $("#image_move_to_trash_id_image").val(id_image);

        $(".image-"+id_image+" .list-group-item").addClass(card_hover_class);

        $("#ImageMoveToTrashModal").modal("show");
      }

      function image_move_to_trash_submit(){
        $("#ImageMoveToTrashModal form").submit();
      }

      function image_move_to_trash_dismiss(){
        $("#ImageMoveToTrashModal").modal("hide");
      }
      </script>
      