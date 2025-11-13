      <!-- Modal -->
      <div class="modal fade" id="ClientRestoreModal" tabindex="-1" role="dialog" aria-labelledby="ClientRestoreModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form class="modal-content" action="client-restore" method="POST">
            <div class="modal-header">
              <h5 class="modal-title" id="ClientRestoreModalLabel">Restore Client</h5>
              <button type="button" class="close" onclick="client_restore_dismiss();" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p><i class="far fa-lg fa-chevron-circle-up text-success"></i> Are you Sure want to restore <b id="client_restore_name"></b> ?</p>
              <input type="hidden" class="form-control" id="client_restore_id_client" name="id_client">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" onclick="client_restore_dismiss();"><i class="fa fa-times"></i> Close</button>
              <button type="button" class="btn btn-success" onclick="client_restore_submit();"><i class="fa fa-chevron-circle-up"></i> Restore</button>
            </div>
          </form>
        </div>
      </div>