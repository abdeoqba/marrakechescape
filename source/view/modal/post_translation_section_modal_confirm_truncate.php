      <!-- Modal -->
      <div class="modal fade" id="PostTranslationTruncateModal" tabindex="-1" role="dialog" aria-labelledby="PostTranslationTruncateModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form class="modal-content" action="post_translation-truncate" method="POST">
            <div class="modal-header">
              <h5 class="modal-title" id="PostTranslationTruncateModalLabel">Truncate PostTranslation</h5>
              <button type="button" class="close" onclick="post_translation_truncate_dismiss();" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p><i class="far fa-lg fa-times-circle text-danger"></i> Are you Sure want to delete all Post Translations?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" onclick="post_translation_truncate_dismiss();">
                <i class="fa fa-times"></i> Close
              </button>
              <button type="button" class="btn btn-danger" onclick="post_translation_truncate_submit();"><i class="fa fa-times"></i> Delete All</button>
            </div>
          </form>
        </div>
      </div>

      <script>
      //truncate
      function post_translation_truncate_set(){
        //code
        $(".list-group-item").addClass("list-group-item-secondary");
        $("#PostTranslationTruncateModal").modal("show");
      }

      function post_translation_truncate_submit(){
        $("#PostTranslationTruncateModal form").submit();
      }

      function post_translation_truncate_dismiss(){
        $("#PostTranslationTruncateModal").modal("hide");
      }
      </script>
      