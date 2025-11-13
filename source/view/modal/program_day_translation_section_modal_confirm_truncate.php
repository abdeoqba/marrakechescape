      <!-- Modal -->
      <div class="modal fade" id="ProgramDayTranslationTruncateModal" tabindex="-1" role="dialog" aria-labelledby="ProgramDayTranslationTruncateModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form class="modal-content" action="program_day_translation-truncate" method="POST">
            <div class="modal-header">
              <h5 class="modal-title" id="ProgramDayTranslationTruncateModalLabel">Truncate ProgramDayTranslation</h5>
              <button type="button" class="close" onclick="program_day_translation_truncate_dismiss();" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p><i class="far fa-lg fa-times-circle text-danger"></i> Are you Sure want to delete all Program Day Translations?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" onclick="program_day_translation_truncate_dismiss();">
                <i class="fa fa-times"></i> Close
              </button>
              <button type="button" class="btn btn-danger" onclick="program_day_translation_truncate_submit();"><i class="fa fa-times"></i> Delete All</button>
            </div>
          </form>
        </div>
      </div>

      <script>
      //truncate
      function program_day_translation_truncate_set(){
        //code
        $(".list-group-item").addClass("list-group-item-secondary");
        $("#ProgramDayTranslationTruncateModal").modal("show");
      }

      function program_day_translation_truncate_submit(){
        $("#ProgramDayTranslationTruncateModal form").submit();
      }

      function program_day_translation_truncate_dismiss(){
        $("#ProgramDayTranslationTruncateModal").modal("hide");
      }
      </script>
      