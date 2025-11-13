      <!-- Modal -->
      <div class="modal fade" id="PostDeleteModal" tabindex="-1" role="dialog" aria-labelledby="PostDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form class="modal-content" action="post-delete" method="POST">
            <div class="modal-header">
              <h5 class="modal-title" id="PostDeleteModalLabel">Delete Post</h5>
              <button type="button" class="close" onclick="post_delete_dismiss();" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p><i class="far fa-lg fa-times-circle text-danger"></i> Are you Sure want to delete <b id="post_delete_name"></b> ?</p>
              <input type="hidden" class="form-control" id="post_delete_id_post" name="id_post">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" onclick="post_delete_dismiss();"><i class="fa fa-times"></i> Close</button>
              <button type="button" class="btn btn-danger" onclick="post_delete_submit();"><i class="fa fa-times"></i> Delete</button>
            </div>
          </form>
        </div>
      </div>