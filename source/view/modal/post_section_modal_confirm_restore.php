      <!-- Modal -->
      <div class="modal fade" id="PostRestoreModal" tabindex="-1" role="dialog" aria-labelledby="PostRestoreModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form class="modal-content" action="post-restore" method="POST">
            <div class="modal-header">
              <h5 class="modal-title" id="PostRestoreModalLabel">Restore Post</h5>
              <button type="button" class="close" onclick="post_restore_dismiss();" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p><i class="far fa-lg fa-chevron-circle-up text-success"></i> Are you Sure want to restore <b id="post_restore_name"></b> ?</p>
              <input type="hidden" class="form-control" id="post_restore_id_post" name="id_post">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" onclick="post_restore_dismiss();"><i class="fa fa-times"></i> Close</button>
              <button type="button" class="btn btn-success" onclick="post_restore_submit();"><i class="fa fa-chevron-circle-up"></i> Restore</button>
            </div>
          </form>
        </div>
      </div>