      <!-- Modal -->
      <div class="modal fade" id="ProgramDayTranslationUpdateModal" tabindex="-1" role="dialog" aria-labelledby="ProgramDayTranslationUpdateModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form class="modal-content" action="program_day_translation-update" method="POST">
            <div class="modal-header">
              <h5 class="modal-title" id="ProgramDayTranslationUpdateModalLabel">Update Program Day Translation</h5>
              <button type="button" class="close" onclick="program_day_translation_update_dismiss();" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body"><input type="hidden" name="id_program_day_translation" id="program_day_translation_update_id_program_day_translation" >
                <div class="form-group">
                  <label for="program_day_translation_update_id_day">Day</label>
                  <small></small>
                  
                      <?php 

                      echo '
                      <select name="id_day" id="program_day_translation_update_id_day" class="form-control">';

                      foreach ($program_day_->program_days as $key_program_day => $p_) {

                        echo '<option value="'.$p_->id_program_day.'">'.$p_->day_order.'</option>';
                      }
                      echo "</select>";

                    ?>
                    
                </div>
                <div class="form-group">
                  <label for="program_day_translation_update_language">Language</label>
                  <small></small>
                  <input type="text" class="form-control" id="program_day_translation_update_language" name="language" >
                </div>
                <div class="form-group">
                  <label for="program_day_translation_update_title">Title</label>
                  <small></small>
                  <input type="text" class="form-control" id="program_day_translation_update_title" name="title" >
                </div>
                <div class="form-group">
                  <label for="program_day_translation_update_content">Content</label>
                  <small></small>
                  
                        <textarea class="form-control" rows="5" name="content" id="program_day_translation_update_content"></textarea>
                      
                </div>
            </div>
            <div class="modal-footer">
              
              <button type="button" class="btn btn-secondary" onclick="program_day_translation_update_dismiss();"><i class="fa fa-times"></i> Close</button>
              <button type="button" class="btn btn-success" onclick="program_day_translation_update_submit();"><i class="fa fa-pen"></i> Update Program Day Translation</button>
            </div>
          </form>
        </div>
      </div>

      <script>
        //update
        function program_day_translation_update_set(id_program_day_translation){
          //code
          
          $("#program_day_translation_update_id_program_day_translation").val(id_program_day_translation);
              
          let id_day = $("#id_day_"+id_program_day_translation).val();
          $("#program_day_translation_update_id_day").val(id_day);
              
          let language = $("#language_"+id_program_day_translation).text();
          $("#program_day_translation_update_language").val(language);
              
          let title = $("#title_"+id_program_day_translation).text();
          $("#program_day_translation_update_title").val(title);
              
          let content = $("#content_"+id_program_day_translation).text();
          $("#program_day_translation_update_content").val(content);
              $(".program_day_translation-"+id_program_day_translation+" .list-group-item").addClass(card_hover_class);

          $("#ProgramDayTranslationUpdateModal").modal("show");
        }

        function program_day_translation_update_submit(){
          $("#ProgramDayTranslationUpdateModal form").submit();
        }

        function program_day_translation_update_dismiss(){
          $("#ProgramDayTranslationUpdateModal").modal("hide");
        }
      </script>
      