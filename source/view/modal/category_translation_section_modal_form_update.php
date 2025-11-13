      <!-- Modal -->
      <div class="modal fade" id="CategoryTranslationUpdateModal" tabindex="-1" role="dialog" aria-labelledby="CategoryTranslationUpdateModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form class="modal-content" action="category_translation-update" method="POST">
            <div class="modal-header">
              <h5 class="modal-title" id="CategoryTranslationUpdateModalLabel">Update Category Translation</h5>
              <button type="button" class="close" onclick="category_translation_update_dismiss();" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body"><input type="hidden" name="id_category_translation" id="category_translation_update_id_category_translation" >
                <div class="form-group">
                  <label for="category_translation_update_id_category">Category</label>
                  <small></small>
                  
                      <?php 

                      echo '
                      <select name="id_category" id="category_translation_update_id_category" class="form-control">';

                      foreach ($category_->categorys as $key_category => $c_) {

                        echo '<option value="'.$c_->id_category.'">'.$c_->id_category.'</option>';
                      }
                      echo "</select>";

                    ?>
                    
                </div>
                <div class="form-group">
                  <label for="category_translation_update_language">Language</label>
                  <small>en, fr, ar</small>
                  <input type="text" class="form-control" id="category_translation_update_language" name="language" >
                </div>
                <div class="form-group">
                  <label for="category_translation_update_title">Title</label>
                  <small></small>
                  <input type="text" class="form-control" id="category_translation_update_title" name="title" >
                </div>
                <div class="form-group">
                  <label for="category_translation_update_description">Description</label>
                  <small></small>
                  <input type="text" class="form-control" id="category_translation_update_description" name="description" >
                </div>
                <div class="form-group">
                  <label for="category_translation_update_content">Content</label>
                  <small></small>
                  
                        <textarea class="form-control" rows="5" name="content" id="category_translation_update_content"></textarea>
                      
                </div>
            </div>
            <div class="modal-footer">
              
              <button type="button" class="btn btn-secondary" onclick="category_translation_update_dismiss();"><i class="fa fa-times"></i> Close</button>
              <button type="button" class="btn btn-success" onclick="category_translation_update_submit();"><i class="fa fa-pen"></i> Update Category Translation</button>
            </div>
          </form>
        </div>
      </div>

      <script>
        //update
        function category_translation_update_set(id_category_translation){
          //code
          
          $("#category_translation_update_id_category_translation").val(id_category_translation);
              
          let id_category = $("#id_category_"+id_category_translation).val();
          $("#category_translation_update_id_category").val(id_category);
              
          let language = $("#language_"+id_category_translation).text();
          $("#category_translation_update_language").val(language);
              
          let title = $("#title_"+id_category_translation).text();
          $("#category_translation_update_title").val(title);
              
          let description = $("#description_"+id_category_translation).text();
          $("#category_translation_update_description").val(description);
              
          let content = $("#content_"+id_category_translation).text();
          $("#category_translation_update_content").val(content);
              $(".category_translation-"+id_category_translation+" .list-group-item").addClass(card_hover_class);

          $("#CategoryTranslationUpdateModal").modal("show");
        }

        function category_translation_update_submit(){
          $("#CategoryTranslationUpdateModal form").submit();
        }

        function category_translation_update_dismiss(){
          $("#CategoryTranslationUpdateModal").modal("hide");
        }
      </script>
      