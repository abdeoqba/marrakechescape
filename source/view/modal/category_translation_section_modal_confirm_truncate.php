      <!-- Modal -->
      <div class="modal fade" id="CategoryTranslationTruncateModal" tabindex="-1" role="dialog" aria-labelledby="CategoryTranslationTruncateModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form class="modal-content" action="category_translation-truncate" method="POST">
            <div class="modal-header">
              <h5 class="modal-title" id="CategoryTranslationTruncateModalLabel">Truncate CategoryTranslation</h5>
              <button type="button" class="close" onclick="category_translation_truncate_dismiss();" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p><i class="far fa-lg fa-times-circle text-danger"></i> Are you Sure want to delete all Category Translations?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" onclick="category_translation_truncate_dismiss();">
                <i class="fa fa-times"></i> Close
              </button>
              <button type="button" class="btn btn-danger" onclick="category_translation_truncate_submit();"><i class="fa fa-times"></i> Delete All</button>
            </div>
          </form>
        </div>
      </div>

      <script>
      //truncate
      function category_translation_truncate_set(){
        //code
        $(".list-group-item").addClass("list-group-item-secondary");
        $("#CategoryTranslationTruncateModal").modal("show");
      }

      function category_translation_truncate_submit(){
        $("#CategoryTranslationTruncateModal form").submit();
      }

      function category_translation_truncate_dismiss(){
        $("#CategoryTranslationTruncateModal").modal("hide");
      }
      </script>
      