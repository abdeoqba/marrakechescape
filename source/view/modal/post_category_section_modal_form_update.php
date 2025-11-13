      <!-- Modal -->
      <div class="modal fade" id="PostCategoryUpdateModal" tabindex="-1" role="dialog" aria-labelledby="PostCategoryUpdateModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form class="modal-content" action="post_category-update" method="POST">
            <div class="modal-header">
              <h5 class="modal-title" id="PostCategoryUpdateModalLabel">Update Post Category</h5>
              <button type="button" class="close" onclick="post_category_update_dismiss();" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body"><input type="hidden" name="id_post_category" id="post_category_update_id_post_category" >
                <div class="form-group">
                  <label for="post_category_update_id_image">Image</label>
                  <small></small>
                  
                      <?php 

                      echo '
                      <select name="id_image" id="post_category_update_id_image" class="form-control">';

                      foreach ($image_->images as $key_image => $i_) {

                        echo '<option value="'.$i_->id_image.'">'.$i_->alt_text.'</option>';
                      }
                      echo "</select>";

                    ?>
                    
                </div>
            </div>
            <div class="modal-footer">
              
              <button type="button" class="btn btn-secondary" onclick="post_category_update_dismiss();"><i class="fa fa-times"></i> Close</button>
              <button type="button" class="btn btn-success" onclick="post_category_update_submit();"><i class="fa fa-pen"></i> Update Post Category</button>
            </div>
          </form>
        </div>
      </div>

      <script>
        //update
        function post_category_update_set(id_post_category){
          //code
          
          $("#post_category_update_id_post_category").val(id_post_category);
              
          let id_image = $("#id_image_"+id_post_category).val();
          $("#post_category_update_id_image").val(id_image);
              $(".post_category-"+id_post_category+" .list-group-item").addClass(card_hover_class);

          $("#PostCategoryUpdateModal").modal("show");
        }

        function post_category_update_submit(){
          $("#PostCategoryUpdateModal form").submit();
        }

        function post_category_update_dismiss(){
          $("#PostCategoryUpdateModal").modal("hide");
        }
      </script>
      