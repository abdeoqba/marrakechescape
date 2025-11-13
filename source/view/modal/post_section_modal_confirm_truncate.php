      <!-- Modal -->
      <div class="modal fade" id="PostTruncateModal" tabindex="-1" role="dialog" aria-labelledby="PostTruncateModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form class="modal-content" action="post-truncate" method="POST">
            <div class="modal-header">
              <h5 class="modal-title" id="PostTruncateModalLabel">Truncate Post</h5>
              <button type="button" class="close" onclick="post_truncate_dismiss();" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p><i class="far fa-lg fa-times-circle text-danger"></i> Are you Sure want to delete all Posts?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" onclick="post_truncate_dismiss();">
                <i class="fa fa-times"></i> Close
              </button>
              <button type="button" class="btn btn-danger" onclick="post_truncate_submit();"><i class="fa fa-times"></i> Delete All</button>
            </div>
          </form>
        </div>
      </div>

      <script>
      //truncate
      function post_truncate_set(){
        //code
        $(".list-group-item").addClass("list-group-item-secondary");
        $("#PostTruncateModal").modal("show");
      }

      function post_truncate_submit(){
        $("#PostTruncateModal form").submit();
      }

      function post_truncate_dismiss(){
        $("#PostTruncateModal").modal("hide");
      }
      </script>
      