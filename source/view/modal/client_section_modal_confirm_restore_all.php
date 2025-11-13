      <!-- Modal -->
      <div class="modal fade" id="ClientRestoreAllModal" tabindex="-1" role="dialog" aria-labelledby="ClientRestoreAllModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form class="modal-content" action="client-restore-all" method="POST">
            <div class="modal-header">
              <h5 class="modal-title" id="ClientRestoreAllModalLabel">Restore All Clients</h5>
              <button type="button" class="close" onclick="client_restore_all_dismiss();" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p><i class="far fa-lg fa-chevron-circle-up text-success"></i> Are you Sure want to restore all Clients from the trash ?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" onclick="client_restore_all_dismiss();"><i class="fa fa-times"></i> Close</button>
              <button type="button" class="btn btn-success" onclick="client_restore_all_submit();"><i class="fa fa-chevron-circle-up"></i> Restore All</button>
            </div>
          </form>
        </div>
      </div>