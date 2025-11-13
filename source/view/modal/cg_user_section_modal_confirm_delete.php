      <!-- Modal -->
      <div class="modal fade" id="UserDeleteModal" tabindex="-1" role="dialog" aria-labelledby="UserDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form class="modal-content" action="cg_user-delete" method="POST">
            <div class="modal-header">
              <h5 class="modal-title" id="UserDeleteModalLabel">Delete User</h5>
              <button type="button" class="close" onclick="cg_user_delete_dismiss();" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p><i class="far fa-lg fa-times-circle text-danger"></i> Are you Sure want to delete <b id="cg_user_delete_name"></b> ?</p>
              <input type="hidden" class="form-control" id="cg_user_delete_id_user" name="id_user">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" onclick="cg_user_delete_dismiss();"><i class="fa fa-times"></i> Close</button>
              <button type="button" class="btn btn-danger" onclick="cg_user_delete_submit();"><i class="fa fa-times"></i> Delete</button>
            </div>
          </form>
        </div>
      </div>