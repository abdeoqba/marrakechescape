      <!-- Modal -->
      <div class="modal fade" id="ClientTruncateModal" tabindex="-1" role="dialog" aria-labelledby="ClientTruncateModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form class="modal-content" action="client-truncate" method="POST">
            <div class="modal-header">
              <h5 class="modal-title" id="ClientTruncateModalLabel">Truncate Client</h5>
              <button type="button" class="close" onclick="client_truncate_dismiss();" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p><i class="far fa-lg fa-times-circle text-danger"></i> Are you Sure want to delete all Clients?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" onclick="client_truncate_dismiss();">
                <i class="fa fa-times"></i> Close
              </button>
              <button type="button" class="btn btn-danger" onclick="client_truncate_submit();"><i class="fa fa-times"></i> Delete All</button>
            </div>
          </form>
        </div>
      </div>

      <script>
      //truncate
      function client_truncate_set(){
        //code
        $(".list-group-item").addClass("list-group-item-secondary");
        $("#ClientTruncateModal").modal("show");
      }

      function client_truncate_submit(){
        $("#ClientTruncateModal form").submit();
      }

      function client_truncate_dismiss(){
        $("#ClientTruncateModal").modal("hide");
      }
      </script>
      