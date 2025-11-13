      <!-- Modal -->
      <div class="modal fade" id="CategoryTruncateModal" tabindex="-1" role="dialog" aria-labelledby="CategoryTruncateModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form class="modal-content" action="category-truncate" method="POST">
            <div class="modal-header">
              <h5 class="modal-title" id="CategoryTruncateModalLabel">Truncate Category</h5>
              <button type="button" class="close" onclick="category_truncate_dismiss();" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p><i class="far fa-lg fa-times-circle text-danger"></i> Are you Sure want to delete all Categorys?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" onclick="category_truncate_dismiss();">
                <i class="fa fa-times"></i> Close
              </button>
              <button type="button" class="btn btn-danger" onclick="category_truncate_submit();"><i class="fa fa-times"></i> Delete All</button>
            </div>
          </form>
        </div>
      </div>

      <script>
      //truncate
      function category_truncate_set(){
        //code
        $(".list-group-item").addClass("list-group-item-secondary");
        $("#CategoryTruncateModal").modal("show");
      }

      function category_truncate_submit(){
        $("#CategoryTruncateModal form").submit();
      }

      function category_truncate_dismiss(){
        $("#CategoryTruncateModal").modal("hide");
      }
      </script>
      