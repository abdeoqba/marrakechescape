      <!-- Modal -->
      <div class="modal fade" id="PostUpdateModal" tabindex="-1" role="dialog" aria-labelledby="PostUpdateModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form class="modal-content" action="post-update" method="POST">
            <div class="modal-header">
              <h5 class="modal-title" id="PostUpdateModalLabel">Update Post</h5>
              <button type="button" class="close" onclick="post_update_dismiss();" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body"><input type="hidden" name="id_post" id="post_update_id_post" >
                <div class="form-group">
                  <label for="post_update_id_post_category">Post Category</label>
                  <small></small>
                  
                      <?php 

                      echo '
                      <select name="id_post_category" id="post_update_id_post_category" class="form-control">';

                      foreach ($post_category_->post_categorys as $key_post_category => $p_) {

                        echo '<option value="'.$p_->id_post_category.'">'.$p_->id_post_category.'</option>';
                      }
                      echo "</select>";

                    ?>
                    
                </div>
                <div class="form-group">
                  <label for="post_update_id_image">Image</label>
                  <small></small>
                  
                      <?php 

                      echo '
                      <select name="id_image" id="post_update_id_image" class="form-control">';

                      foreach ($image_->images as $key_image => $i_) {

                        echo '<option value="'.$i_->id_image.'">'.$i_->alt_text.'</option>';
                      }
                      echo "</select>";

                    ?>
                    
                </div>
                <div class="form-group">
                  <label for="post_update_published_at">Published At</label>
                  <small></small>
                  <input type="datetime-local" class="form-control" id="post_update_published_at" name="published_at" >
                </div>
                <div class="form-group">
                  <label for="post_update_status">Status</label>
                  <small>draft, published</small>
                  <input type="text" class="form-control" id="post_update_status" name="status" >
                </div>
            </div>
            <div class="modal-footer">
              
              <button type="button" class="btn btn-secondary" onclick="post_update_dismiss();"><i class="fa fa-times"></i> Close</button>
              <button type="button" class="btn btn-success" onclick="post_update_submit();"><i class="fa fa-pen"></i> Update Post</button>
            </div>
          </form>
        </div>
      </div>

      <script>
        //update
        function post_update_set(id_post){
          //code
          
          $("#post_update_id_post").val(id_post);
              
          let id_post_category = $("#id_post_category_"+id_post).val();
          $("#post_update_id_post_category").val(id_post_category);
              
          let id_image = $("#id_image_"+id_post).val();
          $("#post_update_id_image").val(id_image);
              
          let published_at = $("#published_at_"+id_post).text();
          $("#post_update_published_at").val(published_at.replace(" ", "T"));
              
          let status = $("#status_"+id_post).text();
          $("#post_update_status").val(status);
              $(".post-"+id_post+" .list-group-item").addClass(card_hover_class);

          $("#PostUpdateModal").modal("show");
        }

        function post_update_submit(){
          $("#PostUpdateModal form").submit();
        }

        function post_update_dismiss(){
          $("#PostUpdateModal").modal("hide");
        }
      </script>
      