      <!-- Modal -->
      <div class="modal fade" id="ProgramRestoreModal" tabindex="-1" role="dialog" aria-labelledby="ProgramRestoreModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form class="modal-content" action="program-restore" method="POST">
            <div class="modal-header">
              <h5 class="modal-title" id="ProgramRestoreModalLabel">Restore Program</h5>
              <button type="button" class="close" onclick="program_restore_dismiss();" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p><i class="far fa-lg fa-chevron-circle-up text-success"></i> Are you Sure want to restore <b id="program_restore_name"></b> ?</p>
              <input type="hidden" class="form-control" id="program_restore_id_program" name="id_program">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" onclick="program_restore_dismiss();"><i class="fa fa-times"></i> Close</button>
              <button type="button" class="btn btn-success" onclick="program_restore_submit();"><i class="fa fa-chevron-circle-up"></i> Restore</button>
            </div>
          </form>
        </div>
      </div>