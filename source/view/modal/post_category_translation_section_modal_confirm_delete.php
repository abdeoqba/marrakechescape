      <!-- Modal -->
      <div class="modal fade" id="PostCategoryTranslationDeleteModal" tabindex="-1" role="dialog" aria-labelledby="PostCategoryTranslationDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form class="modal-content" action="post_category_translation-delete" method="POST">
            <div class="modal-header">
              <h5 class="modal-title" id="PostCategoryTranslationDeleteModalLabel">Delete Post Category Translation</h5>
              <button type="button" class="close" onclick="post_category_translation_delete_dismiss();" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p><i class="far fa-lg fa-times-circle text-danger"></i> Are you Sure want to delete <b id="post_category_translation_delete_name"></b> ?</p>
              <input type="hidden" class="form-control" id="post_category_translation_delete_id_post_category_translation" name="id_post_category_translation">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" onclick="post_category_translation_delete_dismiss();"><i class="fa fa-times"></i> Close</button>
              <button type="button" class="btn btn-danger" onclick="post_category_translation_delete_submit();"><i class="fa fa-times"></i> Delete</button>
            </div>
          </form>
        </div>
      </div>