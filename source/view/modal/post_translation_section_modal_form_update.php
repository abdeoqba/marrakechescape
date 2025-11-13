      <!-- Modal -->
      <div class="modal fade" id="PostTranslationUpdateModal" tabindex="-1" role="dialog" aria-labelledby="PostTranslationUpdateModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form class="modal-content" action="post_translation-update" method="POST">
            <div class="modal-header">
              <h5 class="modal-title" id="PostTranslationUpdateModalLabel">Update Post Translation</h5>
              <button type="button" class="close" onclick="post_translation_update_dismiss();" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body"><input type="hidden" name="id_post_translation" id="post_translation_update_id_post_translation" >
                <div class="form-group">
                  <label for="post_translation_update_id_post">Post</label>
                  <small></small>
                  
                      <?php 

                      echo '
                      <select name="id_post" id="post_translation_update_id_post" class="form-control">';

                      foreach ($post_->posts as $key_post => $p_) {

                        echo '<option value="'.$p_->id_post.'">'.$p_->id_post.'</option>';
                      }
                      echo "</select>";

                    ?>
                    
                </div>
                <div class="form-group">
                  <label for="post_translation_update_language">Language</label>
                  <small></small>
                  <input type="text" class="form-control" id="post_translation_update_language" name="language" >
                </div>
                <div class="form-group">
                  <label for="post_translation_update_title">Title</label>
                  <small></small>
                  <input type="text" class="form-control" id="post_translation_update_title" name="title" >
                </div>
                <div class="form-group">
                  <label for="post_translation_update_slug">Slug</label>
                  <small></small>
                  <input type="text" class="form-control" id="post_translation_update_slug" name="slug" >
                </div>
                <div class="form-group">
                  <label for="post_translation_update_content">Content</label>
                  <small></small>
                  
                        <textarea class="form-control" rows="5" name="content" id="post_translation_update_content"></textarea>
                      
                </div>
                <div class="form-group">
                  <label for="post_translation_update_meta_title">Meta Title</label>
                  <small></small>
                  <input type="text" class="form-control" id="post_translation_update_meta_title" name="meta_title" >
                </div>
                <div class="form-group">
                  <label for="post_translation_update_meta_description">Meta Description</label>
                  <small></small>
                  <input type="text" class="form-control" id="post_translation_update_meta_description" name="meta_description" >
                </div>
                <div class="form-group">
                  <label for="post_translation_update_excerpt">Excerpt</label>
                  <small></small>
                  <input type="text" class="form-control" id="post_translation_update_excerpt" name="excerpt" >
                </div>
            </div>
            <div class="modal-footer">
              
              <button type="button" class="btn btn-secondary" onclick="post_translation_update_dismiss();"><i class="fa fa-times"></i> Close</button>
              <button type="button" class="btn btn-success" onclick="post_translation_update_submit();"><i class="fa fa-pen"></i> Update Post Translation</button>
            </div>
          </form>
        </div>
      </div>

      <script>
        //update
        function post_translation_update_set(id_post_translation){
          //code
          
          $("#post_translation_update_id_post_translation").val(id_post_translation);
              
          let id_post = $("#id_post_"+id_post_translation).val();
          $("#post_translation_update_id_post").val(id_post);
              
          let language = $("#language_"+id_post_translation).text();
          $("#post_translation_update_language").val(language);
              
          let title = $("#title_"+id_post_translation).text();
          $("#post_translation_update_title").val(title);
              
          let slug = $("#slug_"+id_post_translation).text();
          $("#post_translation_update_slug").val(slug);
              
          let content = $("#content_"+id_post_translation).text();
          $("#post_translation_update_content").val(content);
              
          let meta_title = $("#meta_title_"+id_post_translation).text();
          $("#post_translation_update_meta_title").val(meta_title);
              
          let meta_description = $("#meta_description_"+id_post_translation).text();
          $("#post_translation_update_meta_description").val(meta_description);
              
          let excerpt = $("#excerpt_"+id_post_translation).text();
          $("#post_translation_update_excerpt").val(excerpt);
              $(".post_translation-"+id_post_translation+" .list-group-item").addClass(card_hover_class);

          $("#PostTranslationUpdateModal").modal("show");
        }

        function post_translation_update_submit(){
          $("#PostTranslationUpdateModal form").submit();
        }

        function post_translation_update_dismiss(){
          $("#PostTranslationUpdateModal").modal("hide");
        }
      </script>
      