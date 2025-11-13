      <!-- Modal -->
      <div class="modal fade" id="ProgramTranslationTruncateModal" tabindex="-1" role="dialog" aria-labelledby="ProgramTranslationTruncateModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form class="modal-content" action="program_translation-truncate" method="POST">
            <div class="modal-header">
              <h5 class="modal-title" id="ProgramTranslationTruncateModalLabel">Truncate ProgramTranslation</h5>
              <button type="button" class="close" onclick="program_translation_truncate_dismiss();" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p><i class="far fa-lg fa-times-circle text-danger"></i> Are you Sure want to delete all Program Translations?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" onclick="program_translation_truncate_dismiss();">
                <i class="fa fa-times"></i> Close
              </button>
              <button type="button" class="btn btn-danger" onclick="program_translation_truncate_submit();"><i class="fa fa-times"></i> Delete All</button>
            </div>
          </form>
        </div>
      </div>

      <script>
      //truncate
      function program_translation_truncate_set(){
        //code
        $(".list-group-item").addClass("list-group-item-secondary");
        $("#ProgramTranslationTruncateModal").modal("show");
      }

      function program_translation_truncate_submit(){
        $("#ProgramTranslationTruncateModal form").submit();
      }

      function program_translation_truncate_dismiss(){
        $("#ProgramTranslationTruncateModal").modal("hide");
      }
      </script>
      