      <!-- Modal -->
      <div class="modal fade" id="ImageUpdateModal" tabindex="-1" role="dialog" aria-labelledby="ImageUpdateModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form class="modal-content" action="image-update" method="POST">
            <div class="modal-header">
              <h5 class="modal-title" id="ImageUpdateModalLabel">Update Image</h5>
              <button type="button" class="close" onclick="image_update_dismiss();" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body"><input type="hidden" name="id_image" id="image_update_id_image" ><input type="hidden" name="photo_file" id="image_update_photo_file" >
                <div class="form-group">
                  <label for="image_update_alt_text">Alt Text</label>
                  <small></small>
                  <input type="text" class="form-control" id="image_update_alt_text" name="alt_text" >
                </div>
            </div>
            <div class="modal-footer">
              
              <button type="button" class="btn btn-secondary" onclick="image_update_dismiss();"><i class="fa fa-times"></i> Close</button>
              <button type="button" class="btn btn-success" onclick="image_update_submit();"><i class="fa fa-pen"></i> Update Image</button>
            </div>
          </form>
        </div>
      </div>

      <script>
        //update
        function image_update_set(id_image){
          //code
          
          $("#image_update_id_image").val(id_image);
              
          let photo_file = $("#photo_file_"+id_image).val();
          $("#image_update_photo_file").val(photo_file);
              
          let alt_text = $("#alt_text_"+id_image).text();
          $("#image_update_alt_text").val(alt_text);
              $(".image-"+id_image+" .list-group-item").addClass(card_hover_class);

          $("#ImageUpdateModal").modal("show");
        }

        function image_update_submit(){
          $("#ImageUpdateModal form").submit();
        }

        function image_update_dismiss(){
          $("#ImageUpdateModal").modal("hide");
        }
      </script>
      