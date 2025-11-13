      <!-- Modal -->
      <div class="modal fade" id="ImageRestoreModal" tabindex="-1" role="dialog" aria-labelledby="ImageRestoreModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form class="modal-content" action="image-restore" method="POST">
            <div class="modal-header">
              <h5 class="modal-title" id="ImageRestoreModalLabel">Restore Image</h5>
              <button type="button" class="close" onclick="image_restore_dismiss();" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p><i class="far fa-lg fa-chevron-circle-up text-success"></i> Are you Sure want to restore <b id="image_restore_name"></b> ?</p>
              <input type="hidden" class="form-control" id="image_restore_id_image" name="id_image">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" onclick="image_restore_dismiss();"><i class="fa fa-times"></i> Close</button>
              <button type="button" class="btn btn-success" onclick="image_restore_submit();"><i class="fa fa-chevron-circle-up"></i> Restore</button>
            </div>
          </form>
        </div>
      </div>