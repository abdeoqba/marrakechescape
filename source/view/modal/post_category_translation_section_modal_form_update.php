      <!-- Modal -->
      <div class="modal fade" id="PostCategoryTranslationUpdateModal" tabindex="-1" role="dialog" aria-labelledby="PostCategoryTranslationUpdateModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form class="modal-content" action="post_category_translation-update" method="POST">
            <div class="modal-header">
              <h5 class="modal-title" id="PostCategoryTranslationUpdateModalLabel">Update Post Category Translation</h5>
              <button type="button" class="close" onclick="post_category_translation_update_dismiss();" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body"><input type="hidden" name="id_post_category_translation" id="post_category_translation_update_id_post_category_translation" >
                <div class="form-group">
                  <label for="post_category_translation_update_id_post_category">Post Category</label>
                  <small></small>
                  
                      <?php 

                      echo '
                      <select name="id_post_category" id="post_category_translation_update_id_post_category" class="form-control">';

                      foreach ($post_category_->post_categorys as $key_post_category => $p_) {

                        echo '<option value="'.$p_->id_post_category.'">'.$p_->id_post_category.'</option>';
                      }
                      echo "</select>";

                    ?>
                    
                </div>
                <div class="form-group">
                  <label for="post_category_translation_update_language">Language</label>
                  <small></small>
                  <input type="text" class="form-control" id="post_category_translation_update_language" name="language" >
                </div>
                <div class="form-group">
                  <label for="post_category_translation_update_title">Title</label>
                  <small></small>
                  <input type="text" class="form-control" id="post_category_translation_update_title" name="title" >
                </div>
                <div class="form-group">
                  <label for="post_category_translation_update_description">Description</label>
                  <small></small>
                  <input type="text" class="form-control" id="post_category_translation_update_description" name="description" >
                </div>
            </div>
            <div class="modal-footer">
              
              <button type="button" class="btn btn-secondary" onclick="post_category_translation_update_dismiss();"><i class="fa fa-times"></i> Close</button>
              <button type="button" class="btn btn-success" onclick="post_category_translation_update_submit();"><i class="fa fa-pen"></i> Update Post Category Translation</button>
            </div>
          </form>
        </div>
      </div>

      <script>
        //update
        function post_category_translation_update_set(id_post_category_translation){
          //code
          
          $("#post_category_translation_update_id_post_category_translation").val(id_post_category_translation);
              
          let id_post_category = $("#id_post_category_"+id_post_category_translation).val();
          $("#post_category_translation_update_id_post_category").val(id_post_category);
              
          let language = $("#language_"+id_post_category_translation).text();
          $("#post_category_translation_update_language").val(language);
              
          let title = $("#title_"+id_post_category_translation).text();
          $("#post_category_translation_update_title").val(title);
              
          let description = $("#description_"+id_post_category_translation).text();
          $("#post_category_translation_update_description").val(description);
              $(".post_category_translation-"+id_post_category_translation+" .list-group-item").addClass(card_hover_class);

          $("#PostCategoryTranslationUpdateModal").modal("show");
        }

        function post_category_translation_update_submit(){
          $("#PostCategoryTranslationUpdateModal form").submit();
        }

        function post_category_translation_update_dismiss(){
          $("#PostCategoryTranslationUpdateModal").modal("hide");
        }
      </script>
      