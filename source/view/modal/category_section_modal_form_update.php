      <!-- Modal -->
      <div class="modal fade" id="CategoryUpdateModal" tabindex="-1" role="dialog" aria-labelledby="CategoryUpdateModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form class="modal-content" action="category-update" method="POST">
            <div class="modal-header">
              <h5 class="modal-title" id="CategoryUpdateModalLabel">Update Category</h5>
              <button type="button" class="close" onclick="category_update_dismiss();" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body"><input type="hidden" name="id_category" id="category_update_id_category" >
                <div class="form-group">
                  <label for="category_update_parent_id">Parent Id</label>
                  <small></small>
                  
                      <?php 

                      echo '
                      <select name="parent_id" id="category_update_parent_id" class="form-control">';

                      foreach ($category_->categorys as $key_category => $c_) {

                        echo '<option value="'.$c_->id_category.'">'.$c_->id_category.'</option>';
                      }
                      echo "</select>";

                    ?>
                    
                </div>
                <div class="form-group">
                  <label for="category_update_id_image">Image</label>
                  <small></small>
                  
                      <?php 

                      echo '
                      <select name="id_image" id="category_update_id_image" class="form-control">';

                      foreach ($image_->images as $key_image => $i_) {

                        echo '<option value="'.$i_->id_image.'">'.$i_->alt_text.'</option>';
                      }
                      echo "</select>";

                    ?>
                    
                </div>
            </div>
            <div class="modal-footer">
              
              <button type="button" class="btn btn-secondary" onclick="category_update_dismiss();"><i class="fa fa-times"></i> Close</button>
              <button type="button" class="btn btn-success" onclick="category_update_submit();"><i class="fa fa-pen"></i> Update Category</button>
            </div>
          </form>
        </div>
      </div>

      <script>
        //update
        function category_update_set(id_category){
          //code
          
          $("#category_update_id_category").val(id_category);
              
          let parent_id = $("#parent_id_"+id_category).val();
          $("#category_update_parent_id").val(parent_id);
              
          let id_image = $("#id_image_"+id_category).val();
          $("#category_update_id_image").val(id_image);
              $(".category-"+id_category+" .list-group-item").addClass(card_hover_class);

          $("#CategoryUpdateModal").modal("show");
        }

        function category_update_submit(){
          $("#CategoryUpdateModal form").submit();
        }

        function category_update_dismiss(){
          $("#CategoryUpdateModal").modal("hide");
        }
      </script>
      