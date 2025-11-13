      <!-- Modal -->
      <div class="modal fade" id="UserTruncateModal" tabindex="-1" role="dialog" aria-labelledby="UserTruncateModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form class="modal-content" action="cg_user-truncate" method="POST">
            <div class="modal-header">
              <h5 class="modal-title" id="UserTruncateModalLabel">Truncate User</h5>
              <button type="button" class="close" onclick="cg_user_truncate_dismiss();" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p><i class="far fa-lg fa-times-circle text-danger"></i> Are you Sure want to delete all Users?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" onclick="cg_user_truncate_dismiss();">
                <i class="fa fa-times"></i> Close
              </button>
              <button type="button" class="btn btn-danger" onclick="cg_user_truncate_submit();"><i class="fa fa-times"></i> Delete All</button>
            </div>
          </form>
        </div>
      </div>