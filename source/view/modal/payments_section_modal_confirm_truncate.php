      <!-- Modal -->
      <div class="modal fade" id="PaymentsTruncateModal" tabindex="-1" role="dialog" aria-labelledby="PaymentsTruncateModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form class="modal-content" action="payments-truncate" method="POST">
            <div class="modal-header">
              <h5 class="modal-title" id="PaymentsTruncateModalLabel">Truncate Payments</h5>
              <button type="button" class="close" onclick="payments_truncate_dismiss();" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p><i class="far fa-lg fa-times-circle text-danger"></i> Are you Sure want to delete all Paymentss?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" onclick="payments_truncate_dismiss();">
                <i class="fa fa-times"></i> Close
              </button>
              <button type="button" class="btn btn-danger" onclick="payments_truncate_submit();"><i class="fa fa-times"></i> Delete All</button>
            </div>
          </form>
        </div>
      </div>

      <script>
      //truncate
      function payments_truncate_set(){
        //code
        $(".list-group-item").addClass("list-group-item-secondary");
        $("#PaymentsTruncateModal").modal("show");
      }

      function payments_truncate_submit(){
        $("#PaymentsTruncateModal form").submit();
      }

      function payments_truncate_dismiss(){
        $("#PaymentsTruncateModal").modal("hide");
      }
      </script>
      