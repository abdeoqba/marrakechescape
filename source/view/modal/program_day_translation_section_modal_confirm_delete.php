      <!-- Modal -->
      <div class="modal fade" id="ProgramDayTranslationDeleteModal" tabindex="-1" role="dialog" aria-labelledby="ProgramDayTranslationDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form class="modal-content" action="program_day_translation-delete" method="POST">
            <div class="modal-header">
              <h5 class="modal-title" id="ProgramDayTranslationDeleteModalLabel">Delete Program Day Translation</h5>
              <button type="button" class="close" onclick="program_day_translation_delete_dismiss();" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p><i class="far fa-lg fa-times-circle text-danger"></i> Are you Sure want to delete <b id="program_day_translation_delete_name"></b> ?</p>
              <input type="hidden" class="form-control" id="program_day_translation_delete_id_program_day_translation" name="id_program_day_translation">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" onclick="program_day_translation_delete_dismiss();"><i class="fa fa-times"></i> Close</button>
              <button type="button" class="btn btn-danger" onclick="program_day_translation_delete_submit();"><i class="fa fa-times"></i> Delete</button>
            </div>
          </form>
        </div>
      </div>