      <!-- Modal -->
      <div class="modal fade" id="ProgramTranslationUpdateModal" tabindex="-1" role="dialog" aria-labelledby="ProgramTranslationUpdateModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form class="modal-content" action="program_translation-update" method="POST">
            <div class="modal-header">
              <h5 class="modal-title" id="ProgramTranslationUpdateModalLabel">Update Program Translation</h5>
              <button type="button" class="close" onclick="program_translation_update_dismiss();" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body"><input type="hidden" name="id_program_translation" id="program_translation_update_id_program_translation" >
                <div class="form-group">
                  <label for="program_translation_update_id_program">Program</label>
                  <small></small>
                  
                      <?php 

                      echo '
                      <select name="id_program" id="program_translation_update_id_program" class="form-control">';

                      foreach ($program_->programs as $key_program => $p_) {

                        echo '<option value="'.$p_->id_program.'">'.$p_->id_program.'</option>';
                      }
                      echo "</select>";

                    ?>
                    
                </div>
                <div class="form-group">
                  <label for="program_translation_update_language">Language</label>
                  <small>en, fr, ar</small>
                  <input type="text" class="form-control" id="program_translation_update_language" name="language" >
                </div>
                <div class="form-group">
                  <label for="program_translation_update_title">Title</label>
                  <small></small>
                  <input type="text" class="form-control" id="program_translation_update_title" name="title" >
                </div>
                <div class="form-group">
                  <label for="program_translation_update_description">Description</label>
                  <small></small>
                  <input type="text" class="form-control" id="program_translation_update_description" name="description" >
                </div>
                <div class="form-group">
                  <label for="program_translation_update_content">Content</label>
                  <small></small>
                  
                        <textarea class="form-control" rows="5" name="content" id="program_translation_update_content"></textarea>
                      
                </div>
                <div class="form-group">
                  <label for="program_translation_update_includes">Includes</label>
                  <small></small>
                  
                        <textarea class="form-control" rows="5" name="includes" id="program_translation_update_includes"></textarea>
                      
                </div>
                <div class="form-group">
                  <label for="program_translation_update_excludes">Excludes</label>
                  <small></small>
                  
                        <textarea class="form-control" rows="5" name="excludes" id="program_translation_update_excludes"></textarea>
                      
                </div>
                <div class="form-group">
                  <label for="program_translation_update_highlights">Highlights</label>
                  <small></small>
                  
                        <textarea class="form-control" rows="5" name="highlights" id="program_translation_update_highlights"></textarea>
                      
                </div>
            </div>
            <div class="modal-footer">
              
              <button type="button" class="btn btn-secondary" onclick="program_translation_update_dismiss();"><i class="fa fa-times"></i> Close</button>
              <button type="button" class="btn btn-success" onclick="program_translation_update_submit();"><i class="fa fa-pen"></i> Update Program Translation</button>
            </div>
          </form>
        </div>
      </div>

      <script>
        //update
        function program_translation_update_set(id_program_translation){
          //code
          
          $("#program_translation_update_id_program_translation").val(id_program_translation);
              
          let id_program = $("#id_program_"+id_program_translation).val();
          $("#program_translation_update_id_program").val(id_program);
              
          let language = $("#language_"+id_program_translation).text();
          $("#program_translation_update_language").val(language);
              
          let title = $("#title_"+id_program_translation).text();
          $("#program_translation_update_title").val(title);
              
          let description = $("#description_"+id_program_translation).text();
          $("#program_translation_update_description").val(description);
              
          let content = $("#content_"+id_program_translation).text();
          $("#program_translation_update_content").val(content);
              
          let includes = $("#includes_"+id_program_translation).text();
          $("#program_translation_update_includes").val(includes);
              
          let excludes = $("#excludes_"+id_program_translation).text();
          $("#program_translation_update_excludes").val(excludes);
              
          let highlights = $("#highlights_"+id_program_translation).text();
          $("#program_translation_update_highlights").val(highlights);
              $(".program_translation-"+id_program_translation+" .list-group-item").addClass(card_hover_class);

          $("#ProgramTranslationUpdateModal").modal("show");
        }

        function program_translation_update_submit(){
          $("#ProgramTranslationUpdateModal form").submit();
        }

        function program_translation_update_dismiss(){
          $("#ProgramTranslationUpdateModal").modal("hide");
        }
      </script>
      