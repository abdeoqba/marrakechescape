      <!-- Modal -->
      <div class="modal fade" id="PaymentsRestoreAllModal" tabindex="-1" role="dialog" aria-labelledby="PaymentsRestoreAllModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form class="modal-content" action="payments-restore-all" method="POST">
            <div class="modal-header">
              <h5 class="modal-title" id="PaymentsRestoreAllModalLabel">Restore All Paymentss</h5>
              <button type="button" class="close" onclick="payments_restore_all_dismiss();" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p><i class="far fa-lg fa-chevron-circle-up text-success"></i> Are you Sure want to restore all Paymentss from the trash ?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" onclick="payments_restore_all_dismiss();"><i class="fa fa-times"></i> Close</button>
              <button type="button" class="btn btn-success" onclick="payments_restore_all_submit();"><i class="fa fa-chevron-circle-up"></i> Restore All</button>
            </div>
          </form>
        </div>
      </div>